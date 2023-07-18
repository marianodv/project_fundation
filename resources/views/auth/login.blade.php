<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <!-- Logo -->
            <div class="shrink-0   flex flex-row align-middle items-center">
                <img src="{{ asset('img/logo.png' )}}" alt="logo fundae" class="block min-h-max w-auto"/>
                <p class="text-xl text-white font-bold justify-center">Bienvenido</p>
            </div>
        </x-slot>

        <x-slot name="conector">
            <div class="shrink-0   flex flex-row align-middle items-center">
                <p class="text-xl text-white font-bold justify-center">A</p>
            </div>
        </x-slot>

        <x-slot name="economi">
            <!-- Logo -->
            <div class="shrink-0   flex flex-row justify-center align-middle items-center">
                <img src="{{ asset('img/economicSymbol.png' )}}"  class="block min-h-max w-auto"/>
                <p class="text-xl text-white font-bold justify-center">Administración de movimientos!</p>
                </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo') }}" class="text-slate-200 font-bold" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" class="text-slate-200 font-bold" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center ">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-black">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-black hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Olvidaste la contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Entrar') }}
                </x-jet-button>
            </div>
        </form>
        <x-slot  name="pets" class="flex items-right  group inline-block align-bottom  min-h-max w-auto">
            <img src="{{ asset('img/pets.png' )}}"  alt="logo GNU/Linux" class="block min-h-max w-min"/>
        </x-slot>
    </x-jet-authentication-card>
</x-guest-layout>
