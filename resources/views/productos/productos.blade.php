<x-layout-principal>
    <x-slot name="header">
        Productos
    </x-slot>
    <x-slot name="nuevo">
        {{ route('productos.create')}}
    </x-slot>

    @if (isset($productos))
    <x-table.table>

        <x-slot name="thprincipal">
            <x-table.th-principal>
                Codigo
            </x-table.th-principal>
            <x-table.th-principal>
                Modelo
            </x-table.th-principal>
            <x-table.th-principal>
                Fabricante
            </x-table.th-principal>
            <x-table.th-principal>
                Descripcion
            </x-table.th-principal>
            <x-table.th-principal>
                Imagen
            </x-table.th-principal>
            <x-table.th-principal>
                Stock
            </x-table.th-principal>
            <x-table.th-principal>
                Estado
            </x-table.th-principal>
            <x-table.th-principal>
                Categoria
            </x-table.th-principal>
            <x-table.th-principal>
                Localizacion
            </x-table.th-principal>
            <x-table.th-principal>
                Acciones
            </x-table.th-principal>
        </x-slot>


        <x-slot name="tabletr">
            @foreach($productos as $producto)
            <x-table.tr>
                <x-table.td>
                    {{$producto->codigo}}
                </x-table.td>
                <x-table.td>
                    {{$producto->modelo}}
                </x-table.td>
                <x-table.td>
                    {{$producto->fabricante}}
                </x-table.td>
                <x-table.td>
                    {{$producto->descripcion}}
                </x-table.td>
                <x-table.td>

                    <img src="{{asset( 'storage/' . $producto->imagen) }}" alt="error cargando imagen" width="100px">
                </x-table.td>
                <x-table.td>
                    {{$producto->stock}}
                </x-table.td>
                <x-table.td>
                    {{$producto->estado}}
                </x-table.td>
                <x-table.td>
                    @if (isset($producto->categoria->nombre))
                    {{$producto->categoria->nombre}}
                    @else
                    sin categoria
                    @endif
                </x-table.td>
                <x-table.td>
                    @if (isset($producto->location->id))
                    <x-enlace.principal>
                        <x-slot name="link">
                            {{ route('localizaciones.show',['id' => $producto->location->id])}}
                        </x-slot>

                        <x-slot name="texto">
                            Ver
                        </x-slot>
                    </x-enlace.principal>

                    <x-enlace.principal>
                        <x-slot name="link">
                            {{route('localizaciones.assing',['id' => $producto->id])}}
                        </x-slot>

                        <x-slot name="texto">
                            Reasignar
                        </x-slot>
                    </x-enlace.principal>
                    @else
                    <x-enlace.principal>
                        <x-slot name="link">
                            {{route('localizaciones.assing',['id' => $producto->id])}}
                        </x-slot>

                        <x-slot name="texto">
                            Asignar
                        </x-slot>
                    </x-enlace.principal>
                    @endif
                </x-table.td>

                <x-table.td>
                    <x-enlace.principal>
                        <x-slot name="link">
                            {{ route('productos.destroy',["id"=>$producto->id])}}
                        </x-slot>

                        <x-slot name="texto">
                            Borrar
                        </x-slot>
                    </x-enlace.principal>
                    <x-enlace.principal>
                        <x-slot name="link">
                            {{ route('productos.edit',["id"=>$producto->id])}}
                        </x-slot>

                        <x-slot name="texto">
                            Modificar
                        </x-slot>
                    </x-enlace.principal>
                </x-table.td>
            </x-table.tr>
            @endforeach
        </x-slot>
        <x-slot name="tlinks">
            {{$productos->links()}}
        </x-slot>
    </x-table.table>
    @endif
</x-layout-principal>