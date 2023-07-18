<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fundae - Consulta</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
    <div class="max-w-5xl w-4/5 lg:w-3/5 bg-transparent rounded-lg shadow-2xl duration-1000 ease-in-out transition transform -translate-y-16 fade-in my-12 lg:my-0"
      data-aos="fade-up"
      data-aos-duration="1000"
      data-aos-delay="100">
      <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2">
          <img class="w-full h-64 lg:h-full object-cover rounded-t-lg lg:rounded-none lg:rounded-l-lg" src="https://images.unsplash.com/photo-1642095902135-f48745dd3df5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1032&q=80" alt="Delicious Cupcake" />
        </div>
        <div class="w-full lg:w-1/2 py-4 sm:py-12 lg:py-0 px-4 sm:px-12 bg-blue-400 rounded-b-lg lg:rounded-none lg:rounded-r-lg flex items-center">
            @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <<script>window.location.href = '/dashboard';</script>
                            <!-- !-- <button class="uppercase mx-auto shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded"><a href="{{ url('/dashboard') }}">Inicio</a></button> --> -->
                        @else
                            <button class="uppercase mx-auto shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded"><a href="{{ route('login') }}">Entrar</a></button>
                        @endauth
                    </div>
                @endif
          <div>
            <h1 class="mt-4 text-4xl font-extrabold text-white sm:text-5xl md:text-6xl leading-none">
              Fundae
            </h1>
            <h2 class="text-lg tracking-wide text-gray-100 sm:text-xl md:text-lg mt-4">
            Organización sin fines de lucro que tiene como objeto el fortalecimiento de las Artes Escénicas en Tucumán y el Noroeste Argentino
            </h2>
            <form action="{{url('consulta')}}" method="GET">
            @csrf
              <input type="text" placeholder="Identificación" name="dni" id="dni" autocomplete="dni"
                class="text-white placeholder-gray-100  bg-blue-500 text-sm sm:text-lg border-2 border-transparent focus:border-gray-200 py-3 px-4 mt-6 block w-full rounded focus:outline-none" />
                @error('dni')
                    <span class="text-black font-semibold ">{{ $message }} </span>
                @enderror
              <button type="submit"
                class="w-full inline-flex items-center justify-center px-6 py-3 mt-6 text-sm sm:text-lg leading-6 font-bold rounded-md text-black bg-white focus:outline-none transition ease-in-out duration-150">
                Consultar
              </button>
            </form>
            <div class="text-right flex flex-row-reverse text-black mt-6 justify-start pb-4">
                <a href="https://www.facebook.com/fundaetucuman" target="_blank">
                  <svg class="h-7 w-10 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                  </svg>
                </a>
                <a href="mailto:info@fundaetucuman.org.ar" target="_blank">
                    <svg class="h-7 w-10 mr-2" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </a>
                <a href="https://www.instagram.com/fundaetucuman/" target="_blank">
                <svg class="h-7 w-10 mr-2 " xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
                </a>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({once: true});
  </script>
</body>

</html>
