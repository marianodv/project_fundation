{{--
    @extends('layouts.app')

    @section('content')
        actividad.edit template
    @endsection
--}}

<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar</h2>
  </x-slot>
  <div class="md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8">
      <form action="{{route('actividad.update',$actividad->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="bg-white px-4 py-5 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                <input type="text" value="{{$actividad->nombre}}" name="nombre" id="nombre" autocomplete="nombre" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="descripcion" class="form-label inline-block mb-2 text-gray-700">Descripcion</label>
                <input type="text" value="{{$actividad->descripcion}}" name="descripcion" id="descripcion" autocomplete="descripcion" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
              </div>
              <div class="col-span-6 sm:col-span-2">
                <div class="datepicker" data-mdb-toggle-button="false">
                    <label for="fecha" class="form-label inline-block mb-2 text-gray-700">Fecha</label>
                    <input type="text" value="{{$actividad->fecha}}" data-mdb-toggle="datepicker" placeholder="Selecciona una fecha" name="fecha" 
                    id="fecha" autocomplete="fecha" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
              </div>
              <div class="col-span-6 sm:col-span-4">
                <div>
                  <label for="estado" class="form-label inline-block mb-2 text-gray-700">Estado</label>
                  <select name="estado" id="estado" class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      {{-- <option selected>Selecciona un estado</option> --}}
                      <option>Seleccionar Estado</option>
                      <option value="activa">Activa</option>
                      <option value="suspendida">Suspendida</option>
                      <option value="inactiva">Inactiva</option>
                  </select>
                </div>
              </div>
              <div class="col-span-6 sm:col-span-6">
                <div>
                  <label for="categoria" class="form-label inline-block mb-2 text-gray-700">Categoria</label>
                  <select name="categoria_id" id="categoria_id" class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      {{-- <option selected>Selecciona un estado</option> --}}
                      @foreach ($categorias as $categoria)
                          <option value="{{$categoria->id}}"
                            @if ($categoria->id==$actividad->categoria_id)
                                @selected(true)
                            @endif
                            >
                            {{$categoria->nombre}}
                          </option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Confirmar</button>
          </div>
        </div>
      </form>
    </div>
</x-app-layout>