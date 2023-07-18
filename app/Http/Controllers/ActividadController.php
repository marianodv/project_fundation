<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActividadStoreRequest;
use App\Http\Requests\ActividadUpdateRequest;
use App\Models\Actividad;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $actividads = Actividad::all();

        return view('actividad.index', compact('actividads'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categorias = Categoria::all();

        return view('actividad.create', compact('categorias'));
    }

    /**
     * @param \App\Http\Requests\ActividadStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadStoreRequest $request)
    {
        $actividad = Actividad::create($request->validated());
        
        $request->session()->flash('actividad.id', $actividad->id);

        return redirect()->route('actividad.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Actividad $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Actividad $actividad)
    {
        return view('actividad.show', compact('actividad'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Actividad $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Actividad $actividad)
    {
        $categorias = Categoria::all();
        return view('actividad.edit', compact('actividad','categorias'));
    }

    /**
     * @param \App\Http\Requests\ActividadUpdateRequest $request
     * @param \App\Models\Actividad $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(ActividadUpdateRequest $request, Actividad $actividad)
    {
        $actividad->update($request->validated());

        $request->session()->flash('actividad.id', $actividad->id);

        return redirect()->route('actividad.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Actividad $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Actividad $actividad)
    {
        $actividad->delete();

        return redirect()->route('actividad.index');
    }
}
