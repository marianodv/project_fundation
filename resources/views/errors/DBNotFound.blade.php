<header>
    <style>
        body{
            background-color: whitesmoke;
        }
    </style>

</header>

<x-guest-layout>
<!-- component -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
    theme: {
        extend: {
            animation: {
                'spin-slow': 'spin 10s linear infinite',
            },
        },
    },
    plugins: [],
}
</script>
<body>


<div class="flex h-screen items-center">
  <div class="group relative mx-auto w-96 overflow-hidden rounded-[16px] hover:bg-gray-300 p-[1px] transition-all duration-1000 ease-in-out bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
    <div class="animate-spin-slow visible absolute -top-40 -bottom-40 left-10 right-10 bg-gradient-to-r from-transparent via-white/90 to-transparent group-hover:invisible"></div>
    <div class="relative rounded-[15px] bg-white p-6 m-2">
      <div class="space-y-4">
        <img src="{{ asset('img/emptyBox.png' )}}" alt="" />
        <p class="text-lg font-semibold text-slate-800">Lo siento!</p>
        <p class="font-md text-slate-500">Al parecer lo que buscas no lo pudimos encontrar. Por favor, verifica que los datos que enviaste sean los correctos. </p>

        <div class="flex items-center min-w-fit">

            <a href="{{ url()->previous() }}">
            <button class="bg-gradient-to-r from-green-500 to-green-400  hover:text-black text-white font-semibold px-3 py-3 rounded-md mr-6">
                Repetir
            </button>
            </a>
            <a href="{{ url('/') }}">
                <button class="bg-gradient-to-r from-blue-500 to-blue-400  hover:text-black text-white font-semibold px-3 py-3 rounded-md mr-6">
                Inicio
                </button>
            </a>
            <a href="mailto:info@fundaetucuman.org.ar">
                <button class="bg-gradient-to-r  from-red-500 to-red-400  hover:text-black text-white font-semibold px-3 py-3 rounded-md mr-6">
                Atención
                </button>
            </a>
        </div>
    </div>
    </div>
  </div>
</div>
</body>
</x-guest-layout>
