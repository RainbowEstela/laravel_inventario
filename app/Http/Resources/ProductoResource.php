<?php

namespace App\Http\Resources;

use App\Models\Categoria;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            'modelo' => $this->modelo,
            'fabricante' => $this->fabricante,
            'descripcion' => $this->descripcion,
            'imagen' => $this->imagen,
            'stock' => $this->stock,
            'estado' => $this->estado,
            'categoria' => new CategoriaResource(Categoria::where('id', intval($this->categoria_id))->first()),
            'localizacion' => new LocationResource(Location::where('id', intval($this->location_id))->first()),
        ];
    }
}
