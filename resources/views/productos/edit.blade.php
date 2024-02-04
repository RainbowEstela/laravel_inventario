<x-layout-principal>
    <x-slot name="header">
        Crear producto
    </x-slot>

    @if(isset($producto))
    <form method="POST" action="{{ route('productos.update',['id' => $producto->id]) }}" enctype="multipart/form-data" class="max-w-lg mx-auto">
        @csrf

        <!-- codigo -->
        <div>
            <x-input-label for="codigo" :value="__('Código')" />
            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" value="{{$producto->codigo}}" required autofocus autocomplete="codigo" />
            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
        </div>

        <!-- modelo -->
        <div>
            <x-input-label for="modelo" :value="__('Modelo')" />
            <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" value="{{$producto->modelo}}" required autofocus autocomplete="modelo" />
            <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
        </div>

        <!-- fabricante -->
        <div>
            <x-input-label for="fabricante" :value="__('Fabricante')" />
            <x-text-input id="fabricante" class="block mt-1 w-full" type="text" name="fabricante" value="{{$producto->fabricante}}" required autofocus autocomplete="fabricante" />
            <x-input-error :messages="$errors->get('fabricante')" class="mt-2" />
        </div>

        <!-- Descripcion -->
        <div>
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" value="{{$producto->descripcion}}" required autofocus autocomplete="descripcion" />
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>

        <!-- stock -->
        <div>
            <x-input-label for="stock" :value="__('Stock')" />
            <x-text-input id="stock" class="block mt-1 w-full" type="number" min="0" max="1000000" name="stock" value="{{$producto->stock}}" required autofocus autocomplete="stock" />
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>

        <!-- estado -->
        <div>
            <x-input-label for="estado" :value="__('Estado')" />
            <x-select-input id="estado" class="block mt-1 w-full" type="select" name="estado" required autofocus autocomplete="estado">
                @if(strcmp($producto->estado,"activo") == 0)
                <option value="activo" selected>activo</option>
                @else
                <option value="activo">activo</option>
                @endif

                @if(strcmp($producto->estado,"roto") == 0)
                <option value="roto" selected>roto</option>
                @else
                <option value="roto">roto</option>
                @endif

                @if(strcmp($producto->estado,"desaparecido") == 0)
                <option value="desaparecido" selected>desaparecido</option>
                @else
                <option value="desaparecido">desaparecido</option>
                @endif

            </x-select-input>
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>

        <!-- estado -->
        @if (isset($categorias))
        <div>
            <x-input-label for="categoria" :value="__('Categoria')" />
            <x-select-input id="categoria" class="block mt-1 w-full" type="select" name="categoria" required autofocus autocomplete="categoria">

                @foreach($categorias as $categoria)
                @if($categoria->id == $producto->categoria_id)
                <option value="{{$categoria->id}}" selected>{{$categoria->nombre}}</option>
                @else
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endif
                @endforeach

            </x-select-input>
            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
        </div>
        @endif

        <!-- Imagen -->
        <div class="mt-4">
            <x-input-label for="imagen" :value="__('Imagen')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" :value="old('imagen')" />
            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('modificar') }}
            </x-primary-button>
        </div>
    </form>
    @else
    error cargando información
    @endif

</x-layout-principal>