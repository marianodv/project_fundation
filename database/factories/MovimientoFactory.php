<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Movimiento;

class MovimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'monto' => $this->faker->randomFloat(2, 0, 100),
            'descripcion' => $this->faker->randomElement(["Con descripción","Sin descripción"]),
            'alumno_id' => $this->faker->randomElement(["1","2","3","4","5"]),
            'actividad_id' => $this->faker->randomElement(["1","2","3","4","5"]),
            'caja_id' => $this->faker->randomElement(["1","2","3","4","5"]),
            'concepto_id' => $this->faker->randomElement(["1","2","3","4","5"]),
        ];
    }
}
