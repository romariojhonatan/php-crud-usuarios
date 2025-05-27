<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anexo;
use Illuminate\Support\Facades\Storage;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Auth::user()->tarefas()->latest()->get();
        return view('tarefa.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Auth::user()->tarefas()->create($request->only('titulo', 'descricao'));

        return redirect()->route('tarefa.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function anexar(Request $request, $id)
    {
        $tarefa = Auth::user()->tarefas()->findOrFail($id);

        $request->validate([
            'arquivo' => 'required|file|max:2048',
        ]);

        $arquivo = $request->file('arquivo');
        $caminho = $arquivo->store('anexos', 'public');

        $tarefa->anexos()->create([
            'nome_arquivo' => $arquivo->getClientOriginalName(),
            'caminho' => $caminho,
        ]);

        return redirect()->route('tarefa.index')->with('success', 'Arquivo anexado com sucesso!');
    }

    public function destroy($id)
    {
        $tarefa = Auth::user()->tarefas()->findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefa.index')->with('success', 'Tarefa excluída com sucesso!');
    }

    public function removerAnexo($id)
    {
        $anexo = Anexo::findOrFail($id);
        $tarefa = $anexo->tarefa;

        if ($tarefa->usuario_id !== Auth::id()) {
            abort(403);
        }

        // Remove arquivo físico
        \Storage::disk('public')->delete($anexo->caminho);
        $anexo->delete();

        return redirect()->route('tarefa.index')->with('success', 'Anexo removido com sucesso!');
    }

}

