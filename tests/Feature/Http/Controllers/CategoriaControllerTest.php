<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CategoriaController
 */
class CategoriaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $categoria = Categoria::factory()->count(3)->create();

        $response = $this->get(route('categoria.index'));

        $response->assertOk();
        $response->assertViewIs('categoria.index');
        $response->assertViewHas('categoria');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('categoria.create'));

        $response->assertOk();
        $response->assertViewIs('categoria.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CategoriaController::class,
            'store',
            \App\Http\Requests\CategoriaStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nombre = $this->faker->word;

        $response = $this->post(route('categoria.store'), [
            'nombre' => $nombre,
        ]);

        $categoria = Categoria::query()
            ->where('nombre', $nombre)
            ->get();
        $this->assertCount(1, $categoria);
        $categoria = $categoria->first();

        $response->assertRedirect(route('categoria.index'));
        $response->assertSessionHas('categoria.id', $categoria->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->get(route('categoria.show', $categoria));

        $response->assertOk();
        $response->assertViewIs('categoria.show');
        $response->assertViewHas('categoria');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->get(route('categoria.edit', $categoria));

        $response->assertOk();
        $response->assertViewIs('categoria.edit');
        $response->assertViewHas('categoria');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CategoriaController::class,
            'update',
            \App\Http\Requests\CategoriaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $categoria = Categoria::factory()->create();
        $nombre = $this->faker->word;

        $response = $this->put(route('categoria.update', $categoria), [
            'nombre' => $nombre,
        ]);

        $categoria->refresh();

        $response->assertRedirect(route('categoria.index'));
        $response->assertSessionHas('categoria.id', $categoria->id);

        $this->assertEquals($nombre, $categoria->nombre);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $categoria = Categoria::factory()->create();
        $categoria = Categoria::factory()->create();

        $response = $this->delete(route('categoria.destroy', $categoria));

        $response->assertRedirect(route('categoria.index'));

        $this->assertModelMissing($categoria);
    }
}
