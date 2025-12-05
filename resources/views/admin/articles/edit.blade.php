@extends('base')

@section('title', 'Modifier l\'Article')

@section('content')
<div class="w-full max-w-3xl mx-auto px-6 py-12">

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold tracking-tighter">Modifier l'Article</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold underline">Retour</a>
    </div>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" class="space-y-6" id="form-edit">
        @csrf
        @method('PUT') <!-- Important pour la mise à jour -->

        <!-- Titre -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Titre de l'article</label>
            <input type="text" name="title" required value="{{ old('title', $article->title) }}"
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-full focus:ring-0 focus:border-black text-lg">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Choix du Thème -->
            <div class="space-y-2">
                <label class="font-bold ml-2">Thème associé</label>
                <div class="relative">
                    <select name="theme_id" required
                        class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-full focus:ring-0 focus:border-black text-lg appearance-none cursor-pointer">
                        @foreach($themes as $theme)
                        <option value="{{ $theme->id }}" {{ $article->theme_id == $theme->id ? 'selected' : '' }}>
                            {{ $theme->name }}
                        </option>
                        @endforeach
                    </select>
                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none">▼</div>
                </div>
            </div>

            <!-- Date de visibilité -->
            <div class="space-y-2">
                <label class="font-bold ml-2">Date de visibilité</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at', $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}"
                    class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-full focus:ring-0 focus:border-black text-lg placeholder-black/50">
            </div>
        </div>

        <!-- Chapo -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Chapo (Introduction)</label>
            <textarea name="chapo" rows="3"
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-[2rem] focus:ring-0 focus:border-black text-lg">{{ old('chapo', $article->chapo) }}</textarea>
        </div>

        <!-- Contenu -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Contenu</label>
            <textarea name="content" rows="12" required
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-[2rem] focus:ring-0 focus:border-black text-lg">{{ old('content', $article->content) }}</textarea>
        </div>

        <button type="submit" class="w-full py-4 bg-black text-white font-bold text-xl rounded-full hover:opacity-90 transition-opacity" form="form-edit">
            Mettre à jour l'Article
        </button>
    </form>

        <form action="{{ route('admin.articles.destroy', $article) }}" method="post" class="space-y-6" id="form-delete">
        @csrf
        @method('DELETE') <!-- Important pour la mise à jour -->

        <button type="submit" form="form-delete" class="w-full py-4 border border-black text-black font-bold text-xl rounded-full hover:opacity-90 transition-opacity">
            Supprimer l'article
        </button>
    </form>
</div>
@endsection