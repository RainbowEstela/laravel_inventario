<x-layout-principal>
    <x-slot name="header">
        Localizacion del producto
    </x-slot>

    @if (isset($location))
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
            </x-table.tr>
        </x-slot>
    </x-table.table>
    @endif
</x-layout-principal>