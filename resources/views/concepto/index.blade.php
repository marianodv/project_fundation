
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">Conceptos</h2>
    </x-slot>
    <div class="md:col-span-2 ms:mt-0 w-4/5 mx-auto mt-8">
    <div class="flex flex-col bg-white px-4 py-5 sm:p-6">
        <div class="flex space-x-2 justify-end">
            <a href="{{route('concepto.create')}}"><button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Agregar</button></a>
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
                      Nombre
                    </th>
                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                      Descripcion
                    </th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($conceptos as $concepto)
                      <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{$concepto->id}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$concepto->nombre}}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{$concepto->descripcion}}
                        </td>
                        <td>
                            <a href="{{route('concepto.show', $concepto->id)}}">
                                <button type="button" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                                    <i class="fas fa-search"></i>
                                </button>
                            </a>
                        </td>
                        <td><a href="{{route('concepto.edit',$concepto->id)}}">
                            <button type="button" class="inline-block px-6 py-2.5 bg-yellow-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-600 hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        </a></td>
                        <td><form action="{{route('concepto.destroy',$concepto->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form></td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
