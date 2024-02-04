<x-layout-principal>
    <x-slot name="header">
        Crear categoría
    </x-slot>

    <x-slot name="nuevo">
        {{ route('categoria.create')}}
    </x-slot>

    <form method="POST" action="{{ route('categoria.store') }}" class="max-w-lg mx-auto">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nombre" :value="__('nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('crear') }}
            </x-primary-button>
        </div>
    </form>

</x-layout-principal>