@extends('base')

@section('title', $article->title . ' - Know')

@section('content')
<!-- Le fond bg-white correspond à votre beige défini dans tailwind.config -->
<div class="min-h-screen w-full bg-white flex flex-col relative items-center">

    <!-- Bouton Retour (Flèche) - Position absolute pour ne pas gêner le flux -->
    <div class="fixed top-6 left-6 z-50">
        <a href="{{ route('home', ['theme_id' => $article->theme_id]) }}" class="flex items-center justify-center w-12 h-12 bg-black text-white rounded-full hover:opacity-80 transition-opacity shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
    </div>

    <!-- Conteneur Principal scrollable -->
    <div class="w-full max-w-2xl mx-auto pt-24 px-6 pb-32 flex flex-col items-center">
        
        <!-- LA CARTE JAUNE (Contient tout l'article) -->
        <div class="bg-yellow w-full rounded-[2.5rem] p-8 shadow-sm text-black relative z-10">
            
            <!-- En-tête -->
            <div class="mb-6">
                <!-- Titre -->
                <h1 class="text-3xl md:text-4xl font-bold leading-tight mb-4">
                    {{ $article->title }}
                </h1>
                
                <!-- Date (Optionnel selon maquette, je le laisse discret) -->
                <p class="text-black/70 font-bold text-sm">
                    Publié le {{ $article->published_at ? $article->published_at->format('d/m/Y') : 'Récemment' }}
                </p>
            </div>

            <!-- Contenu de l'article -->
            <div class="space-y-6">
                
                <!-- Chapo (en gras) -->
                @if($article->chapo)
                <p class="text-xl font-bold leading-snug">
                    {{ $article->chapo }}
                </p>
                @endif

                <!-- Corps du texte -->
                <div class="text-lg leading-relaxed font-medium">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>

        </div>

    </div>

    <!-- BARRE D'ACTIONS (Fixe en bas, fond transparent pour voir le beige) -->
    <div class="fixed bottom-0 left-0 w-full p-6 flex justify-center z-40 bg-gradient-to-t from-white via-white to-transparent">
        <div class="flex gap-4 w-full max-w-md">
            <!-- Bouton Partager -->
            <button class="flex-1 py-4 px-6 rounded-full border-2 border-black font-bold text-black bg-transparent hover:bg-black/5 transition-colors flex items-center justify-center gap-2 shadow-sm bg-white">
                Partager
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            </button>
            
            <!-- Bouton Enregistrer -->
            <button class="flex-1 py-4 px-6 rounded-full border-2 border-black font-bold text-black bg-transparent hover:bg-black/5 transition-colors flex items-center justify-center gap-2 shadow-sm bg-white">
                Enregistrer
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
            </button>
        </div>
    </div>

</div>
@endsection