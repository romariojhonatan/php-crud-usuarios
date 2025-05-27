<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Criar Tarefa
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('tarefa.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <x-input-label for="titulo" :value="'Título'" />
                    <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="descricao" :value="'Descrição'" />
                    <textarea name="descricao" id="descricao" rows="4" class="block w-full rounded">{{ old('descricao') }}</textarea>
                    <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                </div>

                <x-primary-button>Criar</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
