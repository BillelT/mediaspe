@extends('base')

@section('title', 'Accueil - Know')

@section('content')

<div class="relative w-full h-screen overflow-hidden flex flex-col items-center">
    <div class="absolute inset-0 -z-10 flex flex-col items-center justify-center opacity-100 pointer-events-none select-none overflow-hidden">
        <div class="text-[5.65rem] leading-[1] font-bold tracking-tighter text-black flex flex-col items-center">
            <span>know</span>
            <span>know</span>
            <span>know</span>
            <span>know</span>
            <span>know</span>
            <span>know</span>
            <span>know</span>
            <span>know</span>
        </div>
    </div>

    <div class="z-10 w-full h-full flex flex-col">

        <div class="w-full py-[16px] px-5 overflow-x-auto" style="scrollbar-width: none;">
            <div class="flex items-center gap-x-[8px] w-fit min-w-max">
                <a href="{{ route('home') }}"
                    class="flex-shrink-0 px-4 py-2 rounded-full border-2 border-black font-bold text-sm uppercase transition-colors {{ !request('theme_id') ? 'bg-black text-white' : 'bg-transparent text-black hover:bg-black/5' }}">
                    HOME
                </a>

                @foreach($themes as $theme)
                <a href="{{ route('home', ['theme_id' => $theme->id]) }}"
                    class="flex-shrink-0 px-4 py-2 rounded-full border-2 border-black font-bold text-sm uppercase transition-colors {{ request('theme_id') == $theme->id ? 'bg-black text-white' : 'bg-transparent text-black hover:bg-black/5' }}">

                    {{ $theme->name }}
                </a>
                @endforeach
            </div>
        </div>

        <div class="flex-grow flex items-center justify-center px-5">

            @if(!$currentThemeId)
            <div class="flex flex-col gap-y-[32px] w-full">

                <div class="w-full max-w-sm aspect-square bg-green rounded-3xl p-8 flex flex-col items-center justify-center text-center shadow-xl relative z-20">
                    <div class="text-[8rem] font-bold text-black leading-[0.75]">K.</div>
                    <p class="text-xl font-bold text-black tracking-tight">Maintenant tu sais.</p>
                </div>
                
                <a href="/dashboard" class="flex-1 py-3 px-4 rounded-full font-bold text-white bg-black hover:bg-black/90 transition-colors flex items-center justify-center gap-2">
                    Profil
                </a>
            </div>
                
            @elseif($article)
            <div class="w-full max-w-sm rounded-3xl p-6 relative z-20 flex flex-col gap-y-[16px]" style="background-color: {{ $article->theme->color }}; ">

                <h2 class="text-2xl font-bold text-black">
                    {{ $article->title }}
                </h2>

                <div class="text-black font-medium text-medium overflow-y-auto max-h-[40vh]">
                    {{ $article->chapo ?? Str::limit($article->content, 150) }}
                </div>

                <div class="flex gap-3">
                    <button class="flex-1 py-3 px-4 rounded-full border-2 border-black font-bold text-black bg-transparent hover:bg-black/5 transition-colors flex items-center justify-center gap-2">
                        Partager
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                    </button>
                    <button class="flex-1 py-3 px-4 rounded-full border-2 border-black font-bold text-black bg-transparent hover:bg-black/5 transition-colors flex items-center justify-center gap-2">
                        Enregistrer
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                    </button>
                </div>

                <a href="{{ route('articles.show', $article) }}" class="w-full py-4 rounded-full bg-black text-white font-bold text-center hover:bg-gray-900 transition-colors">
                    Lire l'article en entier
                </a>
            </div>

            @else
            <!-- SCÉNARIO 3 : THEME VIDE -->
            <div class="p-6 bg-white border-2 border-black rounded-xl text-center">
                <p class="font-bold">Aucun article disponible pour ce thème aujourd'hui.</p>
                <a href="{{ route('home') }}" class="block mt-4 underline">Retour à l'accueil</a>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection