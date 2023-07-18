{{--
    @extends('layouts.app')

    @section('content')
        alumno.index template
    @endsection
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">Alumnos</h2>
    </x-slot>
    <div class="md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8">
    <div class="flex flex-col bg-white px-4 py-5 sm:p-6">

        @if($deletes)
        <div class="flex space-x-2 justify-start">
            <a href="{{route('alumno.index')}}"><button type="button" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Activos</button></a>
        </div>
        @else
        <div class="flex space-x-2 justify-start">
            <a href="{{route('alumno.index',['deletes' => 'true'])}}"><button type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-500 hover:shadow-lg focus:bg-yellow-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Suspendidos</button></a>
        </div>
        @endif
        <div class="flex space-x-2 justify-end">
            <a href="{{route('alumno.create')}}"><button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Agregar</button></a>
          </div>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 flex flex-col " >
          <div class="py-2 inline-block max-w-full sm:px-6 lg:px-5 ">

              <form action="{{route('alumno.index')}}" method="GET">
            @csrf

                <label for="nombre" class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                <input type="text"  name="nombre" id="nombre" autocomplete="nombre" value="{{$nombre}}"
                class="w-32 m-3 form-control inline-block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />

                <label for="apellido" class="form-label inline-block mb-2 text-gray-700">Apellido</label>
                <input type="text" name="apellido" id="apellido" autocomplete="apellido" value="{{$apellido}}"
                class="w-32 m-3 form-control inline-block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

                <label for="dni" class="form-label inline-block mb-2 text-gray-700">DNI</label>
                <input type="text" name="dni" id="dni" autocomplete="dni" value="{{$dni}}"
                class="w-32 m-3 form-control inline-block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

                <label for="mail" class="form-label inline-block mb-2 text-gray-700">Mail</label>
                <input type="text" name="mail" id="mail" autocomplete="mail" value="{{$mail}}"
                class="w-32 m-3 form-control inline-block px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

                @if($deletes)
                <input type="hidden" name="deletes" id="deletes" autocomplete="deletes" value=true>
                @endif

                <button class="relative z-[2] w-32 inline-block items-right rounded-r bg-green-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-amber-600 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                    type="submit" data-te-ripple-init data-te-ripple-color="light">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-6   inline-block">
                        <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd inline-block" />
                    </svg>
                </button>
            </form>
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-b">
                  <tr>
                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 m-4 text-left">
                        ID
                    </th>
                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 m-4 text-left">
                        Apellido
                    </th>
                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 m-4 text-left">
                        Nombre
                    </th>
                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 m-4 text-left">
                        DNI
                    </th>
                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 m-4 text-left">
                        Correo
                    </th>
                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 m-4 text-left">
                        Telefono
                    </th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                      <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{$alumno->id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$alumno->apellido}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$alumno->nombre}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$alumno->dni}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$alumno->mail}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$alumno->telefono}}
                        </td>
                        <td>
                            <a href="{{route('alumno.report', ['id' => $alumno->id])}}" target="_blank">
                                <button type="button" class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                                <i class="fa fa-file" aria-hidden="true"></i>

                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{route('alumno.edit',$alumno->id)}}">
                                <button type="button" class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                        @if($deletes)
                            <a href="{{route('alumno.restore', ['alumno' => $alumno])}}">
                            <button type="submit" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:text-black hover:border-black hover:bg-white hover:shadow-lg focus:bg-white focus:shadow-lg focus:outline-none focus:ring-0 active:bg-white active:shadow-lg transition duration-150 ease-in-out">
                                <i class="fa fa-recycle" aria-hidden="true"></i>
                            </button>
                        @else
                            <form action="{{route('alumno.destroy',$alumno->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            {{$alumnos->links('pagination::tailwind')}}
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
