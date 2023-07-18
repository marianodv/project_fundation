<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Concepto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ConceptoController
 */
class ConceptoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $conceptos = Concepto::factory()->count(3)->create();

        $response = $this->get(route('concepto.index'));

        $response->assertOk();
        $response->assertViewIs('concepto.index');
        $response->assertViewHas('conceptos');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('concepto.create'));

        $response->assertOk();
        $response->assertViewIs('concepto.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConceptoController::class,
            'store',
            \App\Http\Requests\ConceptoStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nombre = $this->faker->word;
        $descripcion = $this->faker->word;

        $response = $this->post(route('concepto.store'), [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        ]);

        $conceptos = Concepto::query()
            ->where('nombre', $nombre)
            ->where('descripcion', $descripcion)
            ->get();
        $this->assertCount(1, $conceptos);
        $concepto = $conceptos->first();

        $response->assertRedirect(route('concepto.index'));
        $response->assertSessionHas('concepto.id', $concepto->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $concepto = Concepto::factory()->create();

        $response = $this->get(route('concepto.show', $concepto));

        $response->assertOk();
        $response->assertViewIs('concepto.show');
        $response->assertViewHas('concepto');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $concepto = Concepto::factory()->create();

        $response = $this->get(route('concepto.edit', $concepto));

        $response->assertOk();
        $response->assertViewIs('concepto.edit');
        $response->assertViewHas('concepto');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConceptoController::class,
            'update',
            \App\Http\Requests\ConceptoUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $concepto = Concepto::factory()->create();
        $nombre = $this->faker->word;
        $descripcion = $this->faker->word;

        $response = $this->put(route('concepto.update', $concepto), [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        ]);

        $concepto->refresh();

        $response->assertRedirect(route('concepto.index'));
        $response->assertSessionHas('concepto.id', $concepto->id);

        $this->assertEquals($nombre, $concepto->nombre);
        $this->assertEquals($descripcion, $concepto->descripcion);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $concepto = Concepto::factory()->create();

        $response = $this->delete(route('concepto.destroy', $concepto));

        $response->assertRedirect(route('concepto.index'));

        $this->assertModelMissing($concepto);
    }
}
