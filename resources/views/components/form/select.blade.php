<form method="POST" action="{{ $ruta }}" class="max-w-lg mx-auto">
    @csrf

    <div>
        <label for="{{ $dato }}" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ $dato }}</label>
        <x-select-input id="{{ $dato }}" class="block mt-1 w-full" type="select" name="{{ $dato }}" required autofocus autocomplete="{{ $dato }}">

            {{$slot}}

        </x-select-input>
    </div>

    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ms-4">
            {{ __('Buscar') }}
        </x-primary-button>
    </div>
</form>