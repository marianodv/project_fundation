<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Actividad;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ActividadController
 */
class ActividadControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $actividads = Actividad::factory()->count(3)->create();

        $response = $this->get(route('actividad.index'));

        $response->assertOk();
        $response->assertViewIs('actividad.index');
        $response->assertViewHas('actividads');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('actividad.create'));

        $response->assertOk();
        $response->assertViewIs('actividad.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ActividadController::class,
            'store',
            \App\Http\Requests\ActividadStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nombre = $this->faker->word;
        $descripcion = $this->faker->word;
        $fecha = $this->faker->date();
        $estado = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('actividad.store'), [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'fecha' => $fecha,
            'estado' => $estado,
        ]);

        $actividads = Actividad::query()
            ->where('nombre', $nombre)
            ->where('descripcion', $descripcion)
            ->where('fecha', $fecha)
            ->where('estado', $estado)
            ->get();
        $this->assertCount(1, $actividads);
        $actividad = $actividads->first();

        $response->assertRedirect(route('actividad.index'));
        $response->assertSessionHas('actividad.id', $actividad->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $actividad = Actividad::factory()->create();

        $response = $this->get(route('actividad.show', $actividad));

        $response->assertOk();
        $response->assertViewIs('actividad.show');
        $response->assertViewHas('actividad');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $actividad = Actividad::factory()->create();

        $response = $this->get(route('actividad.edit', $actividad));

        $response->assertOk();
        $response->assertViewIs('actividad.edit');
        $response->assertViewHas('actividad');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ActividadController::class,
            'update',
            \App\Http\Requests\ActividadUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $actividad = Actividad::factory()->create();
        $nombre = $this->faker->word;
        $descripcion = $this->faker->word;
        $fecha = $this->faker->date();
        $estado = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('actividad.update', $actividad), [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'fecha' => $fecha,
            'estado' => $estado,
        ]);

        $actividad->refresh();

        $response->assertRedirect(route('actividad.index'));
        $response->assertSessionHas('actividad.id', $actividad->id);

        $this->assertEquals($nombre, $actividad->nombre);
        $this->assertEquals($descripcion, $actividad->descripcion);
        $this->assertEquals(Carbon::parse($fecha), $actividad->fecha);
        $this->assertEquals($estado, $actividad->estado);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $actividad = Actividad::factory()->create();

        $response = $this->delete(route('actividad.destroy', $actividad));

        $response->assertRedirect(route('actividad.index'));

        $this->assertModelMissing($actividad);
    }
}
