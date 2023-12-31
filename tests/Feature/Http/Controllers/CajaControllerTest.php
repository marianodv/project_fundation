<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Caja;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CajaController
 */
class CajaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $cajas = Caja::factory()->count(3)->create();

        $response = $this->get(route('caja.index'));

        $response->assertOk();
        $response->assertViewIs('caja.index');
        $response->assertViewHas('cajas');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('caja.create'));

        $response->assertOk();
        $response->assertViewIs('caja.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CajaController::class,
            'store',
            \App\Http\Requests\CajaStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nombre = $this->faker->word;
        $identificador = $this->faker->word;
        $descripcion = $this->faker->word;

        $response = $this->post(route('caja.store'), [
            'nombre' => $nombre,
            'identificador' => $identificador,
            'descripcion' => $descripcion,
        ]);

        $cajas = Caja::query()
            ->where('nombre', $nombre)
            ->where('identificador', $identificador)
            ->where('descripcion', $descripcion)
            ->get();
        $this->assertCount(1, $cajas);
        $caja = $cajas->first();

        $response->assertRedirect(route('caja.index'));
        $response->assertSessionHas('caja.id', $caja->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $caja = Caja::factory()->create();

        $response = $this->get(route('caja.show', $caja));

        $response->assertOk();
        $response->assertViewIs('caja.show');
        $response->assertViewHas('caja');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $caja = Caja::factory()->create();

        $response = $this->get(route('caja.edit', $caja));

        $response->assertOk();
        $response->assertViewIs('caja.edit');
        $response->assertViewHas('caja');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CajaController::class,
            'update',
            \App\Http\Requests\CajaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $caja = Caja::factory()->create();
        $nombre = $this->faker->word;
        $identificador = $this->faker->word;
        $descripcion = $this->faker->word;

        $response = $this->put(route('caja.update', $caja), [
            'nombre' => $nombre,
            'identificador' => $identificador,
            'descripcion' => $descripcion,
        ]);

        $caja->refresh();

        $response->assertRedirect(route('caja.index'));
        $response->assertSessionHas('caja.id', $caja->id);

        $this->assertEquals($nombre, $caja->nombre);
        $this->assertEquals($identificador, $caja->identificador);
        $this->assertEquals($descripcion, $caja->descripcion);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $caja = Caja::factory()->create();

        $response = $this->delete(route('caja.destroy', $caja));

        $response->assertRedirect(route('caja.index'));

        $this->assertModelMissing($caja);
    }
}
