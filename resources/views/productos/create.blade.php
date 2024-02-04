<x-layout-principal>
    <x-slot name="header">
        Crear producto
    </x-slot>

    <x-slot name="nuevo">
        {{ route('productos.create')}}
    </x-slot>

    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data" class="max-w-lg mx-auto">
        @csrf

        <!-- codigo -->
        <div>
            <x-input-label for="codigo" :value="__('Código')" />
            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required autofocus autocomplete="codigo" />
            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
        </div>

        <!-- modelo -->
        <div>
            <x-input-label for="modelo" :value="__('Modelo')" />
            <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo')" required autofocus autocomplete="modelo" />
            <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
        </div>

        <!-- fabricante -->
        <div>
            <x-input-label for="fabricante" :value="__('Fabricante')" />
            <x-text-input id="fabricante" class="block mt-1 w-full" type="text" name="fabricante" :value="old('fabricante')" required autofocus autocomplete="fabricante" />
            <x-input-error :messages="$errors->get('fabricante')" class="mt-2" />
        </div>

        <!-- Descripcion -->
        <div>
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required autofocus autocomplete="descripcion" />
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <!-- stock -->
        <div>
            <x-input-label for="stock" :value="__('Stock')" />
            <x-text-input id="stock" class="block mt-1 w-full" type="number" min="0" max="1000000" name="stock" :value="old('stock')" required autofocus autocomplete="stock" />
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>

        <!-- estado -->
        <div>
            <x-input-label for="estado" :value="__('Estado')" />
            <x-select-input id="estado" class="block mt-1 w-full" type="select" name="estado" :value="old('estado')" required autofocus autocomplete="estado">
                <option value="activo">activo</option>
                <option value="roto">roto</option>
                <option value="desaparecido">desaparecido</option>
            </x-select-input>
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>

        <!-- estado -->
        @if (isset($categorias))
        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <x-select-input id="categoria" class="block mt-1 w-full" type="select" name="categoria" :value="old('categoria')" required autofocus autocomplete="categoria">

                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach

            </x-select-input>
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>
        @endif

        <!-- Imagen -->
        <div class="mt-4">
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" :value="old('imagen')" required />
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('crear') }}
            </x-primary-button>
        </div>
    </form>

</x-layout-principal>