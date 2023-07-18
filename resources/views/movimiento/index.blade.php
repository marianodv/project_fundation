{{--
    @extends('layouts.app')

    @section('content')
        movimiento.index template
    @endsection
--}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">Movimientos</h2>
    </x-slot>
    <div class="md:col-span-2 ms:mt-0 container mx-auto mx-auto mt-8">
    <div class="flex flex-col bg-white px-4 py-5 sm:p-6 ">
        <div class="flex space-x-2 justify-end">
            <a href="{{route('movimiento.create')}}"><button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Agregar</button></a>
          </div>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-b">
                    <tr>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        ID
                      </th>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        Monto
                      </th>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        Descripcion
                      </th>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        Alumno
                      </th>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        Actividad
                      </th>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        Categoria
                      </th>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        Caja
                      </th>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        Concepto
                      </th>
                      <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                        Creado
                      </th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <thead class="border-b">
                    <tr>
                        <form id="filter-form" action="{{ route('movimiento.index') }}" method="get">
                        @csrf
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="number" value="{{ $fid }}" name="fid" id="fid" placeholder="id" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="number" value="{{ $fmontoMin }}" name="fmontoMin" id="fmontoMin" placeholder="min" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <input type="number" value="{{ $fmontoMax }}" name="fmontoMax" id="fmontoMax" placeholder="max" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="text" value="{{ $fdescripcion }}" name="fdescripcion" id="fdescripcion" placeholder="descripcion" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="text" value="{{ $falumno }}" name="falumno" id="falumno" placeholder="alumno" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="text" value="{{ $factividad }}" name="factividad" id="factividad" placeholder="actividad" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="text" value="{{ $factCategoria }}" name="factCategoria" id="factCategoria" placeholder="actividad" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="text" value="{{ $fcaja }}" name="fcaja" id="fcaja" placeholder="caja" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="text" value="{{ $fconcepto }}" name="fconcepto" id="fconcepto" placeholder="concepto" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td scope="col" class="text-sm font-bold text-gray-900 pl-4 py-4 text-left">
                        <input type="date" value="{{ $fcreadoMin }}" name="fcreadoMin" id="fcreadoMin" placeholder="desde" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <input type="date" value="{{ $fcreadoMax }}" name="fcreadoMax" id="fcreadoMax" placeholder="hasta" class="filter-table form-control w-10 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </td>
                      <td>
                        <button type="submit" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                            <i class="fas fa-search"></i>
                        </button>
                      </td>
                      <td>
                        <button type="button" onclick="clearFilter()" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                            <i class="fas fa-eraser"></i>
                        </button>
                      </td>

                    </form>
                    </tr>
                  </thead>
                <tbody>
                    @foreach ($movimientos as $movimiento)
                      <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{$movimiento->id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$movimiento->monto}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$movimiento->descripcion}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{$movimiento->alumno?->nombre}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{$movimiento->actividad->nombre}} {{$movimiento->actividad->categoria->nombre}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                           {{$movimiento->actividad->categoria->nombre}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{$movimiento->caja->nombre}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{$movimiento->concepto->nombre}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{$movimiento->created_at->format('d-m-Y')}}
                        </td>
                        <td  >
                            <a href="{{route('movimiento.edit',$movimiento->id)}}">
                            <button type="button" class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                            <i class="fa-solid fa-pencil"></i>
                            </button>
                        </a></td>
                        <td><form action="{{route('movimiento.destroy',$movimiento->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            </form>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <div class="p-5">
                {{$movimientos->links('pagination::tailwind')}}
            </div>

        </div>
    </div>

</div>
</div>
    <script>
        window.addEventListener("load", (event) => {
            const filtros = document.getElementsByClassName('filter-table');
            const form = document.getElementById('filter-form');
            let timer;

            for (const filtro of filtros) {
                filtro.addEventListener('input', () => {
                    let debounceTimer = null
                    clearTimeout(debounceTimer)
                    debounceTimer = setTimeout(() => form.submit(), 1200)
                })
            }
        });

        const clearFilter = () => {
                for (const filtro of filtros) {
                    filtro.value = ''
                }
                form.submit()
            }
    </script>
</x-app-layout>
