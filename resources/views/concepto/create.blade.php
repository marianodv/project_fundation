{{--
    @extends('layouts.app')

    @section('content')
        concepto.create template
    @endsection
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear concepto</h2>
    </x-slot>
    <div class="md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8">
        <form action="{{route('concepto.store')}}" method="POST">
          @csrf
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                  <input type="text" value="{{old("nombre")}}" name="nombre" id="nombre" autocomplete="nombre" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label for="descripcion" class="form-label inline-block mb-2 text-gray-700">Descripcion</label>
                  <input type="text" value="{{old("descripcion")}}" name="descripcion" id="descripcion" autocomplete="descripcion" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                <button type="submit" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Agregar</button>
            </div>
          </div>
        </form>
      </div>
</x-app-layout>
