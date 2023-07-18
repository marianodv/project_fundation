{{--
    @extends('layouts.guest')

    @section('content')
        alumno.preview template
    @endsection
--}}

<x-guest-layout>


<body class=" flex flex-col  items-center justify-center min-h-screen from-red-100 via-red-300 to-blue-500 bg-gradient-to-br">
<!-- component -->
<div class="flex flex-col items-left max-w-max inline-block">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight ">Hola {{$alumno->apellido}}, {{$alumno->nombre}}</h2>
</div>
<div class="flex  flex-col items-center">
	<div class="px-12 py-5 my-4 items-center   min-w-max rounded-xl group sm:flex  space-x-6 bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
        <table class="min-w-max leading-normal border-separate border-spacing-100 opacity-90 rounded-2xl " >
            @if(count($preview)== 0)
                <h3>No tenemos movimientos registrados de tu parte</h3>
            @else
            <thead >
                <tr class="rounded-2xl" >
                    <th
                        class="px-5 py-3 border border-slate-500 border-b-1  bg-white text-left text-xs m-4  text-black uppercase tracking-wider">
                        Monto
                    </th>
                    <th
                        class="px-5 py-3 border border-slate-500 border-b-1  bg-white text-left text-xs m-4  text-black uppercase tracking-wider">
                        Fecha
                    </th>
                    <th
                        class="px-5 py-3 border border-slate-500 border-b-1  bg-white text-left text-xs m-4  text-black uppercase tracking-wider">
                        Actividad
                    </th>
                    <th
                        class="px-5 py-3 border border-slate-500 border-b-1  bg-white text-left text-xs m-4  text-black uppercase tracking-wider">
                        Concepto
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($preview as $movimiento)
                <tr>
                    <td class="border-b  bg-white border-slate-1000 text-lg text-center m-4">
                        <div class="flex items-center">
                            <div class="ml-3">
                            <span class="relative inline-block px-1 py-1 font-semibold text-black leading-tight">
                                <span aria-hidden class="absolute inset-0  opacity-50 rounded-full"></span>
                                <span class="relative"><p> ${{$movimiento->monto}} </p> </span>
                            </span>
                            </div>
                        </div>
                    </td>
                    <td class="border-b  bg-white border-slate-1000 text-lg text-center m-4">
                        <p class="text-black-900 whitespace-no-wrap">{{$movimiento->created_at->format('d/m/Y')}}</p>
                    </td>
                    <td class="border-b  bg-white border-slate-1000 text-lg text-center m-4">
                        <p class="text-black-900 whitespace-no-wrap">
                        {{$movimiento->actividad->nombre}}
                        </p>
                    </td>
                    <td class="border-b  bg-white border-slate-1000 text-lg text-center m-4">
                        <p class="text-black-900 whitespace-no-wrap">
                        {{$movimiento->concepto->nombre}}
                        </p>
                    </td>
                </tr>
            </tbody>
            @endforeach
                @endif
        </table>
    </div>
    <div class="flex flex-row items-center ">
        <div class= "m-auto">
            <a href="{{ url('/') }}">
                <button class="bg-gradient-to-r from-blue-500 to-blue-400 m-auto hover:text-black text-white font-semibold px-6 py-3 rounded-md mr-6">
                    Inicio
                </button>
            </a>
            <a href="{{ route('alumno.report', ['id' => $alumno->id]) }}" target="_blank">
                <button class="uppercase m-auto shadow bg-indigo-800 hover:bg-indigo-700 hover:text-black focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Extendido</button>
            </a>
        </div>
    </div>
</div>

</body>
</x-guest-layout>
