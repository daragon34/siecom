<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $n_producto = $this->faker->unique()->words($nb=2,$asText=true);
        $slug = Str::slug($n_producto);
        return [
            //
            'nombre' => $n_producto,
            'slug' => $slug,
            'descripcion_corta' => $this->faker->text(250),
            'descripcion' => $this->faker->text(500),
            'precio_compra' => $this->faker->numberBetween(2000, 990000),
            'disponibilidad' => 'disponible',
            'sku' => $this->faker->numberBetween(1, 5000),
            'cantidad' => $this->faker->numberBetween(1, 200),
            'imagen' => 'digital_'.$this->faker->unique()->numberBetween(1, 22).'.jpg',
            'categoria_id' =>$this->faker->numberBetween(1, 5),
        ];
    }
}
