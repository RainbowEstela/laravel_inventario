<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "codigo" => $this->faker->uuid(),
            "modelo" => $this->faker->randomElement(["oppo 134", "ndivia gtx", "perfume caro", "oso de peluche", "pantalla led", "ventilador super frio", "botella de cristal"]),
            "fabricante" => $this->faker->company(),
            "descripcion" => $this->faker->paragraph(1),
            "imagen" => "imagen_1.png",
            "stock" => $this->faker->numberBetween(0, 200),
            "estado" => "activo",
            "location_id" => $this->faker->numberBetween(1, 10),
            "categoria_id" => $this->faker->numberBetween(1, 10),
        ];
    }
}
