<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{

    // Lista todos os usuários do banco
    public function index(): JsonResponse {
        $users = User::all(); // SELECT * FROM users
        return response()->json($users);
    }

    // Busca um usuario pelo id
    public function show(int $id): JsonResponse {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['mensagem' => 'Usuário não encontrado'], 404);
        }
        return response()->json($user);
    }

    // Cria um novo usuario
    public function store(Request $request): JsonResponse {
        $user = User::create($request->only(['nome', 'email']));
        return response()->json($user, 201);
    }

    // Altera um usuario
    public function update(Request $request, int $id): JsonResponse {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['mensagem' => 'Usuário inexistente'], 404);
        }
        $user->update($request->only(['nome', 'email']));
        return response()->json($user);
    }

    // Delta um usuario
    public function destroy(int $id): JsonResponse {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['mensagem' => 'Usuário inexistente'], 404);
        }
        $user->delete();
        return response()->json(['mensagem' => 'Usuario deletado com sucesso']);
    }
}
