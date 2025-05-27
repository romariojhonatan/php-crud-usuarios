<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white leading-tight">
            Minhas Tarefas
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto px-4">
        @if(session('success'))
            <div class="mb-4 text-white font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6">
            <a href="{{ route('tarefa.create') }}"
               class="inline-flex items-center gap-2 bg-indigo-600 text-white px-5 py-2.5 rounded-md text-sm font-medium shadow hover:bg-indigo-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Nova Tarefa
            </a>
        </div>

        @forelse($tarefas as $tarefa)
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 mb-6 border border-gray-600">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-bold text-white">{{ $tarefa->titulo }}</h3>
                        <p class="text-sm text-gray-300">{{ $tarefa->descricao }}</p>
                    </div>

                    <form action="{{ route('tarefa.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta tarefa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Excluir tarefa"
                                class="text-white transition text-sm ml-4">✕</button>
                    </form>
                </div>

                @if($tarefa->anexos->count())
                    <div class="mt-3">
                        <p class="text-sm font-medium text-white mb-1">Anexos:</p>
                        <ul class="list-disc pl-5 text-sm text-blue-300">
                            @foreach($tarefa->anexos as $anexo)
                                <li class="flex items-center justify-between">
                                    <a href="{{ asset('storage/' . $anexo->caminho) }}" target="_blank" class="truncate text-white">
                                        {{ $anexo->nome_arquivo }}
                                    </a>
                                    <form action="{{ route('tarefa.anexo.destroy', $anexo->id) }}" method="POST" onsubmit="return confirm('Remover este anexo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Remover"
                                                class="text-white hover:text-red-600 text-xs ml-2">✕</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tarefa.anexar', $tarefa->id) }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-4 mt-4">
                    @csrf
                    <input type="file" name="arquivo"
                           class="block w-full text-sm text-white border border-gray-300 rounded-lg cursor-pointer bg-gray-700 placeholder-gray-400" />
                    <button type="submit"
                            class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded text-sm font-semibold transition">
                        Anexar
                    </button>
                </form>
            </div>
        @empty
            <div class="text-gray-400 text-center">
                Nenhuma tarefa cadastrada ainda.
            </div>
        @endforelse
    </div>
</x-app-layout>
