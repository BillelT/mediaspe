@extends('base')

@section('title', 'Nouvel Article')

@section('content')
<div class="w-full max-w-3xl mx-auto px-6 py-12">
    
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold tracking-tighter">Nouvel Article</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold underline">Retour</a>
    </div>

    <form action="{{ route('admin.articles.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Titre -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Titre de l'article</label>
            <input type="text" name="title" required
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-full focus:ring-0 focus:border-black text-lg"
                placeholder="Un titre accrocheur">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Choix du Thème -->
            <div class="space-y-2">
                <label class="font-bold ml-2">Thème associé</label>
                <div class="relative">
                    <select name="theme_id" required
                        class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-full focus:ring-0 focus:border-black text-lg appearance-none cursor-pointer">
                        <option value="" disabled selected>Choisir un thème...</option>
                        @foreach($themes as $theme)
                            <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none">▼</div>
                </div>
            </div>

            <!-- Date de visibilité -->
            <div class="space-y-2">
                <label class="font-bold ml-2">Date de visibilité</label>
                <input type="datetime-local" name="published_at"
                    class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-full focus:ring-0 focus:border-black text-lg placeholder-black/50">
            </div>
        </div>

        <!-- Chapo -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Chapo (Introduction)</label>
            <textarea name="chapo" rows="3"
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-[2rem] focus:ring-0 focus:border-black text-lg"
                placeholder="Un court résumé pour accrocher le lecteur..."></textarea>
        </div>

        <!-- Contenu -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Contenu</label>
            <textarea name="content" rows="12" required
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-[2rem] focus:ring-0 focus:border-black text-lg"
                placeholder="Écrivez votre article ici..."></textarea>
        </div>

        <button type="submit" class="w-full py-4 bg-black text-white font-bold text-xl rounded-full hover:opacity-90 transition-opacity">
            Publier l'Article
        </button>
    </form>
</div>
@endsection