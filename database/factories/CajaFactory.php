<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Caja;

class CajaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Caja::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(["Banco X","Fisica","Virtual","Prestamos","Deudas"]),
            'identificador' => $this->faker->regexify('[A-Za-z0-9]{3}'),
            'descripcion' => $this->faker->randomElement(["Con descripción","Sin descripción"]),
        ];
    }
}
