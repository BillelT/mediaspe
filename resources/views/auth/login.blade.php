@extends("base")

@section('title', 'Know - Connexion')

@section('content')
<div class="w-full max-w-md mx-auto px-6 py-12 flex flex-col items-center justify-center">

    <!-- Logo -->
    <div class="mb-16 text-center">
        <h1 class="text-7xl font-bold tracking-tighter text-black">know</h1>
    </div>

    <!-- Formulaire -->
    <form method="POST" action="{{ route('login') }}" class="w-full gap-y-[8px] flex flex-col">
        @csrf

        <!-- Email / Nom d'utilisateur -->
        <div class="relative">
            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                class="w-full px-6 py-3.5 bg-[#C5B8A5] border-none border-transparent rounded-full text-black placeholder-black text-lg outline-none focus:ring-0"
                placeholder="Nom d'utilisateur, adresse e-mail">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-center font-medium" />
        </div>

        <div class="relative">
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full px-6 py-3.5 bg-[#C5B8A5] border-none border-transparent rounded-full text-black placeholder-black text-lg outline-none focus:ring-0"
                placeholder="Mot de passe">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-center font-medium" />
        </div>

        <button type="submit" class="w-full py-3.5 bg-black text-white font-bold text-lg rounded-full border-2 border-black hover:opacity-90 transition-opacity mt-2">
            Se connecter
        </button>

        <div class="text-center pt-2 pb-4">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm font-medium text-black hover:underline">
                Mot de passe oublié ?
            </a>
            @endif
        </div>
    </form>

    <!-- Boutons Sociaux -->
    <div class="w-full space-y-3">
        <!-- Google -->
        <a href="#" class="flex items-center justify-center w-full py-3 bg-transparent border-2 border-black rounded-full font-bold text-black hover:bg-black/5 transition-colors relative">
            <span class="absolute left-6">
                <!-- Icône Google SVG -->
                <svg class="w-5 h-5" viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg">
                    <g transform="matrix(1, 0, 0, 1, 27.009001, -39.238998)">
                        <path fill="#4285F4" d="M -3.264 51.509 C -3.264 50.719 -3.334 49.969 -3.454 49.239 L -14.754 49.239 L -14.754 53.749 L -8.284 53.749 C -8.574 55.229 -9.424 56.479 -10.684 57.329 L -10.684 60.329 L -6.824 60.329 C -4.564 58.239 -3.264 55.159 -3.264 51.509 Z" />
                        <path fill="#34A853" d="M -14.754 63.239 C -11.514 63.239 -8.804 62.159 -6.824 60.329 L -10.684 57.329 C -11.764 58.049 -13.134 58.489 -14.754 58.489 C -17.884 58.489 -20.534 56.379 -21.484 53.529 L -25.464 53.529 L -25.464 56.619 C -23.494 60.539 -19.444 63.239 -14.754 63.239 Z" />
                        <path fill="#FBBC05" d="M -21.484 53.529 C -21.734 52.809 -21.864 52.039 -21.864 51.239 C -21.864 50.439 -21.734 49.669 -21.484 48.949 L -21.484 45.859 L -25.464 45.859 C -26.284 47.479 -26.754 49.299 -26.754 51.239 C -26.754 53.179 -26.284 54.999 -25.464 56.619 L -21.484 53.529 Z" />
                        <path fill="#EA4335" d="M -14.754 43.989 C -12.984 43.989 -11.404 44.599 -10.154 45.789 L -6.734 42.369 C -8.804 40.429 -11.514 39.239 -14.754 39.239 C -19.444 39.239 -23.494 41.939 -25.464 45.859 L -21.484 48.949 C -20.534 46.099 -17.884 43.989 -14.754 43.989 Z" />
                    </g>
                </svg>
            </span>
            Continuer avec Google
        </a>
    </div>

    <!-- Inscription -->
    <div class="mt-12 w-full text-center space-y-2">
        <p class="font-medium text-black">Nouveau sur Know ?</p>
        <a href="{{ route('register') }}" class="flex items-center justify-center w-full py-3 bg-white text-black font-bold border-2 border-black rounded-full hover:bg-black hover:text-white transition-colors">
            S'inscrire
        </a>
    </div>
</div>
@endsection