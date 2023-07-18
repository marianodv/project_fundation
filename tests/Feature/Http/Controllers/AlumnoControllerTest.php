<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Alumno;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AlumnoController
 */
class AlumnoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $alumnos = Alumno::factory()->count(3)->create();

        $response = $this->get(route('alumno.index'));

        $response->assertOk();
        $response->assertViewIs('alumno.index');
        $response->assertViewHas('alumnos');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('alumno.create'));

        $response->assertOk();
        $response->assertViewIs('alumno.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AlumnoController::class,
            'store',
            \App\Http\Requests\AlumnoStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nombre = $this->faker->word;
        $apellido = $this->faker->word;
        $nacimiento = $this->faker->date();
        $mail = $this->faker->word;
        $dni = $this->faker->word;
        $telefono = $this->faker->word;

        $response = $this->post(route('alumno.store'), [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'nacimiento' => $nacimiento,
            'mail' => $mail,
            'dni' => $dni,
            'telefono' => $telefono,
        ]);

        $alumnos = Alumno::query()
            ->where('nombre', $nombre)
            ->where('apellido', $apellido)
            ->where('nacimiento', $nacimiento)
            ->where('mail', $mail)
            ->where('dni', $dni)
            ->where('telefono', $telefono)
            ->get();
        $this->assertCount(1, $alumnos);
        $alumno = $alumnos->first();

        $response->assertRedirect(route('alumno.index'));
        $response->assertSessionHas('alumno.id', $alumno->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get(route('alumno.show', $alumno));

        $response->assertOk();
        $response->assertViewIs('alumno.show');
        $response->assertViewHas('alumno');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get(route('alumno.edit', $alumno));

        $response->assertOk();
        $response->assertViewIs('alumno.edit');
        $response->assertViewHas('alumno');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AlumnoController::class,
            'update',
            \App\Http\Requests\AlumnoUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $alumno = Alumno::factory()->create();
        $nombre = $this->faker->word;
        $apellido = $this->faker->word;
        $nacimiento = $this->faker->date();
        $mail = $this->faker->word;
        $dni = $this->faker->word;
        $telefono = $this->faker->word;

        $response = $this->put(route('alumno.update', $alumno), [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'nacimiento' => $nacimiento,
            'mail' => $mail,
            'dni' => $dni,
            'telefono' => $telefono,
        ]);

        $alumno->refresh();

        $response->assertRedirect(route('alumno.index'));
        $response->assertSessionHas('alumno.id', $alumno->id);

        $this->assertEquals($nombre, $alumno->nombre);
        $this->assertEquals($apellido, $alumno->apellido);
        $this->assertEquals(Carbon::parse($nacimiento), $alumno->nacimiento);
        $this->assertEquals($mail, $alumno->mail);
        $this->assertEquals($dni, $alumno->dni);
        $this->assertEquals($telefono, $alumno->telefono);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->delete(route('alumno.destroy', $alumno));

        $response->assertRedirect(route('alumno.index'));

        $this->assertModelMissing($alumno);
    }
}
