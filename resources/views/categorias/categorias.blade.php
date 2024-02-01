<x-layout-principal>
    <x-slot name="header">
        Categorias
    </x-slot>
    <x-slot name="nuevo">
        {{ route('categoria.create')}}
    </x-slot>

    @if (isset($categorias))
    <x-table.table>

        <x-slot name="thprincipal">
            <x-table.th-principal>
                Nombre
            </x-table.th-principal>
            <x-table.th-principal>
                Acciones
            </x-table.th-principal>
        </x-slot>


        <x-slot name="tabletr">
            @foreach($categorias as $categoria)
            <x-table.tr>
                <x-table.th-body>
                    {{$categoria->nombre}}
                </x-table.th-body>
                <x-table.td>
                    <x-enlace.principal>
                        <x-slot name="link">
                            {{ route('categoria.destroy',["id" => $categoria->id])}}
                        </x-slot>

                        <x-slot name="texto">
                            borrar
                        </x-slot>
                    </x-enlace.principal>
                </x-table.td>
            </x-table.tr>
            @endforeach
        </x-slot>
        <x-slot name="tlinks">
            {{$categorias->links()}}
        </x-slot>
    </x-table.table>
    @endif
</x-layout-principal>