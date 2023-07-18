{{--
    @extends('layouts.app')

    @section('content')
        alumno.edit template
    @endsection
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar</h2>
    </x-slot>
    <div class="md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8">
        <form action="{{route('alumno.update',$alumno->id)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="overflow-hidden shadow sm:rounded-md">
            <div class="bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                    <input type="text" value="{{$alumno->nombre}}" name="nombre" id="nombre" autocomplete="nombre" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="apellido" class="form-label inline-block mb-2 text-gray-700">Apellido</label>
                    <input type="text" value="{{$alumno->apellido}}" name="apellido" id="apellido" autocomplete="apellido" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <div class="datepicker" data-mdb-toggle-button="false">
                        <label for="nacimiento" class="form-label inline-block mb-2 text-gray-700">Fecha de Nacimiento</label>
                        <input type="text" value="{{$alumno->nacimiento}}" data-mdb-toggle="datepicker" placeholder="Selecciona una fecha" name="nacimiento" 
                        id="nacimiento" autocomplete="nacimiento" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <label for="mail" class="form-label inline-block mb-2 text-gray-700">Correo Electronico</label>
                    <input type="text" value="{{$alumno->mail}}" name="mail" id="mail" autocomplete="mail" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="dni" class="form-label inline-block mb-2 text-gray-700">DNI</label>
                    <input type="text" value="{{$alumno->dni}}" name="dni" id="dni" autocomplete="dni" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="telefono" class="form-label inline-block mb-2 text-gray-700">Telefono</label>
                    <input type="text" value="{{$alumno->telefono}}" name="telefono" id="telefono" autocomplete="telefono" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
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