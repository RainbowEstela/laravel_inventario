<x-layout-principal>
    <x-slot name="header">
        Crear localización
    </x-slot>

    <x-slot name="nuevo">
        {{ route('localizaciones.create')}}
    </x-slot>

    <form method="POST" action="{{ route('localizaciones.store') }}">
        @csrf

        <!-- ciudad -->
        <div>
            <x-input-label for="ciudad" :value="__('Ciudad')" />
            <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" required autofocus autocomplete="ciudad" />
            <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
        </div>


        <!-- edificio -->
        <div>
            <x-input-label for="edificio" :value="__('Edificio')" />
            <x-text-input id="edificio" class="block mt-1 w-full" type="text" name="edificio" :value="old('edificio')" required autofocus autocomplete="edificio" />
            <x-input-error :messages="$errors->get('edificio')" class="mt-2" />
        </div>


        <!-- direccion -->
        <div>
            <x-input-label for="direccion" :value="__('Direccion')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- sala -->
        <div class="mt-4">
            <x-input-label for="sala" :value="__('Sala')" />
            <x-text-input id="sala" class="block mt-1 w-full" type="number" name="sala" :value="old('sala')" required autocomplete="sala" min="1" max="999" />
            <x-input-error :messages="$errors->get('sala')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('crear') }}
            </x-primary-button>
        </div>
    </form>

</x-layout-principal>