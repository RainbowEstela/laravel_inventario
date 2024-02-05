<form method="POST" action="{{ $ruta }}" class="max-w-lg mx-auto">
    @csrf

    <div>
        <label for="{{ $dato }}" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ $dato }}</label>
        <x-text-input id="{{ $dato }}" class="block mt-1 w-full" type="text" name="{{ $dato }}" placeholder="{{ $dato }}" required autofocus autocomplete="{{ $dato }}" />

    </div>

    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ms-4">
            {{ __('Buscar') }}
        </x-primary-button>
    </div>
</form>