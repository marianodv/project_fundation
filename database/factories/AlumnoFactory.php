<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Alumno;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(["Carlos","Agustin","Luis"]),
            'apellido' => $this->faker->randomElement(["Lazo","Fernandez","Delgado valdez"]),
            'nacimiento' => $this->faker->date(),
            'mail' => $this->faker->randomElement(["alm@gmail.com","alm@protonmail.com"]),
            'dni' => $this->faker->regexify('[0-9]{5}'),
            'telefono' => $this->faker->regexify('[0-9]{5}'),
        ];
    }
}
