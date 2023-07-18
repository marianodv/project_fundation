<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Concepto <span class="font-bold text-amber-500 leading-tight">  {{ $concepto->nombre }} </span> </h2>
  </x-slot>
  <div class="md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8">
    <div class="overflow-hidden shadow sm:rounded-md">
      <div class="bg-white px-4 py-5 sm:p-6">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-12 sm:col-span-6">
            <p class="mb-4 mt-0 text-base font-light leading-relaxed">
              {{ $concepto->descripcion }}
            </p>

          </div>
          <div class="col-span-12 flex flex-col  sm:col-span-3">
            <h3 class="p-2 my-2 font-semibold text-l text-gray-800 leading-tight">Movimientos</h3>
            <form class="flex  max-w-max" action="{{ route('concepto.show', $concepto->id) }}" method="GET">
              @csrf
              <div class="py-3 justify-end flex flex-row items-center max-w-max bg-gray-100 ">
                <label for="fcreadoMin" class="form-label flex inline-block  m-2  text-gray-700">Inicio</label>
                <input type="date" value="{{ $fcreadoMin }}" name="fcreadoMin" id="fcreadoMin" placeholder="desde"
                  class="filter-table form-control  inline-block mr-6 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                <label for="fcreadoMax" class="form-label inline-block  m-2  text-gray-700">Fin</label>
                <input type="date" value="{{ $fcreadoMax }}" name="fcreadoMax" id="fcreadoMax" placeholder="hasta"
                  class="filter-table form-control  inline-block mr-6 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

                <button
                  class="relative z-[2]  inline-block items-right rounded-r bg-green-600 px-4 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-amber-600 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                  type="submit" data-te-ripple-init data-te-ripple-color="light">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-6   inline-block">
                    <path fill-rule="evenodd"
                      d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                      clip-rule="evenodd inline-block" />
                  </svg>
                </button>

              </div>

            </form>
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
                    Caja
                  </th>
                  <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                    Concepto
                  </th>
                  <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                    Creado
                  </th>
                  <th></th>
                  <th>
                        <a href="{{ route('concepto.report', ['name' => $concepto->nombre]) }}" target="_blank">
                            <button type="button" class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                            <i class="fa fa-file" aria-hidden="true"></i>

                            </button>
                        </a>
                    </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($movimientos as $movimiento)
                  <tr class="border-b hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{ $movimiento->id }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $movimiento->monto }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $movimiento->descripcion }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $movimiento->alumno?->nombre }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $movimiento->actividad->nombre }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $movimiento->caja->nombre }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $movimiento->concepto->nombre }}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{ $movimiento->created_at->format('d-m-Y') }}
                    </td>
                    <td><a href="{{ route('movimiento.edit', $movimiento->id) }}">
                        <button type="button"
                          class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                          <i class="fa-solid fa-pencil"></i>
                        </button>
                      </a></td>
                    <td>
                      <form action="{{ route('movimiento.destroy', $movimiento->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"
                          class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                <tr class="border-b hover:bg-gray-100">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">Total</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $movimientos->sum('monto') }}</td>
                  <td colspan="7"></td>
                  <td>
                        <a href="{{route('concepto.report', ['name' => $concepto->nombre])}}" target="_blank">
                            <button type="button" class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                            <i class="fa fa-file" aria-hidden="true"></i>

                            </button>
                        </a>
                    </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
    <div class="p-5">
      {{ $movimientos->links('pagination::tailwind') }}
    </div>

  </div>
</x-app-layout>
