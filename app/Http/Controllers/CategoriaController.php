<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaStoreRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = Categoria::all();

        return view('categoria.index', compact('categorias'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('categoria.create');
    }

    /**
     * @param \App\Http\Requests\CategoriaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaStoreRequest $request)
    {
        $categoria = Categoria::create($request->validated());

        $request->session()->flash('categoria.id', $categoria->id);

        return redirect()->route('categoria.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Categoria $categoria)
    {
        return view('categoria.show', compact('categoria'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Categoria $categoria)
    {
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * @param \App\Http\Requests\CategoriaUpdateRequest $request
     * @param \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        $categoria->update($request->validated());

        $request->session()->flash('categoria.id', $categoria->id);

        return redirect()->route('categoria.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categoria.index');
    }
}
