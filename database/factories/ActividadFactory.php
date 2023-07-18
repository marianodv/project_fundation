<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Actividad;

class ActividadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Actividad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(["Taller","Obra","Curso"]),
            'descripcion' => $this->faker->randomElement(["Con descripcion","Sin descripcion"]),
            'fecha' => $this->faker->date(),
            'estado' => $this->faker->randomElement(["Activa","Suspendida","Inactiva"]),
            'categoria_id' => $this->faker->randomElement(["1","2","3","4","5"]),
        ];
    }
}
