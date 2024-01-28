<x-layout-principal>
    <x-slot name="header">
        Localizaciones
    </x-slot>
    <x-slot name="nuevo">
        {{ route('localizaciones.create')}}
    </x-slot>

    @if (isset($locations))
    <x-table.table>

        <x-slot name="thprincipal">
            <x-table.th-principal>
                Ciudad
            </x-table.th-principal>
            <x-table.th-principal>
                Edificio
            </x-table.th-principal>
            <x-table.th-principal>
                Direccion
            </x-table.th-principal>
            <x-table.th-principal>
                Sala
            </x-table.th-principal>
        </x-slot>


        <x-slot name="tabletr">
            @foreach($locations as $location)
            <x-table.tr>
                <x-table.td>
                    {{$location->ciudad}}
                </x-table.td>
                <x-table.td>
                    {{$location->edificio}}
                </x-table.td>
                <x-table.td>
                    {{$location->direccion}}
                </x-table.td>
                <x-table.td>
                    {{$location->sala}}
                </x-table.td>
                <x-table.td>
                    <x-enlace.principal>
                        <x-slot name="link">
                            {{ route('localizaciones.destroy')}}
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
            {{$locations->links()}}
        </x-slot>
    </x-table.table>
    @endif
</x-layout-principal>