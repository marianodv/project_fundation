<div class="min-h-screen m-15  flex flex-row sm:justify-center  justify-center items-center pt-6 sm:pt-0">
    <div class="flex flex-col m-20 w-auto  justify-center sm:justify-center items-center">
        <div class="w-full  m-5 sm:max-w-md  px-6 py-4  shadow-md overflow-hidden sm:rounded-lg bg-gradient-to-r from-sky-500 to-indigo-500">
            {{ $logo }}
        </div>

        <div class="w-min  m-5 sm:max-w-md  px-6 py-4  shadow-md overflow-hidden sm:rounded-lg bg-gradient-to-r from-purple-500 to-pink-500">
            {{ $conector }}
        </div>

        <div class="w-full  m-5 sm:max-w-md  px-6 py-4  shadow-md overflow-hidden sm:rounded-lg bg-gradient-to-r from-indigo-500 to-sky-500">
            {{ $economi }}
        </div>
    </div>
    <div class="w-full sm:max-w-md  font-bold  px-6 py-4  shadow-md overflow-hidden sm:rounded-lg  bg-gradient-to-r from-purple-500 to-pink-500">
        {{ $slot }}
    </div>

    <div class="w-full  sm:max-w-md overflow-hidden sm:rounded-lg">
            {{ $pets }}
    </div>
</div>
