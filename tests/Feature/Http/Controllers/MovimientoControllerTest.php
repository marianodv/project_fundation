<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Movimiento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MovimientoController
 */
class MovimientoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $movimientos = Movimiento::factory()->count(3)->create();

        $response = $this->get(route('movimiento.index'));

        $response->assertOk();
        $response->assertViewIs('movimiento.index');
        $response->assertViewHas('movimientos');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('movimiento.create'));

        $response->assertOk();
        $response->assertViewIs('movimiento.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MovimientoController::class,
            'store',
            \App\Http\Requests\MovimientoStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $monto = $this->faker->randomFloat(/** decimal_attributes **/);
        $descripcion = $this->faker->word;

        $response = $this->post(route('movimiento.store'), [
            'monto' => $monto,
            'descripcion' => $descripcion,
        ]);

        $movimientos = Movimiento::query()
            ->where('monto', $monto)
            ->where('descripcion', $descripcion)
            ->get();
        $this->assertCount(1, $movimientos);
        $movimiento = $movimientos->first();

        $response->assertRedirect(route('movimiento.index'));
        $response->assertSessionHas('movimiento.id', $movimiento->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->get(route('movimiento.show', $movimiento));

        $response->assertOk();
        $response->assertViewIs('movimiento.show');
        $response->assertViewHas('movimiento');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->get(route('movimiento.edit', $movimiento));

        $response->assertOk();
        $response->assertViewIs('movimiento.edit');
        $response->assertViewHas('movimiento');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MovimientoController::class,
            'update',
            \App\Http\Requests\MovimientoUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $movimiento = Movimiento::factory()->create();
        $monto = $this->faker->randomFloat(/** decimal_attributes **/);
        $descripcion = $this->faker->word;

        $response = $this->put(route('movimiento.update', $movimiento), [
            'monto' => $monto,
            'descripcion' => $descripcion,
        ]);

        $movimiento->refresh();

        $response->assertRedirect(route('movimiento.index'));
        $response->assertSessionHas('movimiento.id', $movimiento->id);

        $this->assertEquals($monto, $movimiento->monto);
        $this->assertEquals($descripcion, $movimiento->descripcion);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $movimiento = Movimiento::factory()->create();

        $response = $this->delete(route('movimiento.destroy', $movimiento));

        $response->assertRedirect(route('movimiento.index'));

        $this->assertModelMissing($movimiento);
    }
}
