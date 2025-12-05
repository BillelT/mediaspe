@extends('base')

@section('title', 'Dashboard Admin')

@section('content')
<div class="w-full max-w-4xl mx-auto px-6 py-12 flex flex-col gap-8">

    <!-- En-tête -->
    <div class="mb-12 text-center">
        <h1 class="text-5xl font-bold tracking-tighter text-black mb-4">Dashboard</h1>
        <p class="text-xl text-black/70">Gérez vos contenus et thématiques</p>
    </div>

    <!-- Messages de succès -->
    @if(session('success'))
    <div class="mb-8 p-4 bg-green text-black border-2 border-black rounded-xl text-center font-bold">
        {{ session('success') }}
    </div>
    @endif

    <!-- Actions Rapides -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('admin.themes.create') }}" class="group block p-8 bg-transparent border-2 border-black rounded-[2rem] hover:bg-black hover:text-white transition-all duration-300">
            <h3 class="text-2xl font-bold mb-2">Nouveau Thème</h3>
            <p class="opacity-70 group-hover:opacity-100">Ajouter une catégorie</p>
            <div class="mt-4 text-4xl group-hover:translate-x-2 transition-transform">→</div>
        </a>

        <a href="{{ route('admin.articles.create') }}" class="group block p-8 bg-transparent border-2 border-black rounded-[2rem] hover:bg-black hover:text-white transition-all duration-300">
            <h3 class="text-2xl font-bold mb-2">Nouvel Article</h3>
            <p class="opacity-70 group-hover:opacity-100">Rédiger un contenu</p>
            <div class="mt-4 text-4xl group-hover:translate-x-2 transition-transform">→</div>
        </a>
    </div>

    <div class="bg-white/50 border-2 border-black rounded-[2rem] p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Listes des thèmes</h2>
        </div>

        <div class="space-y-6">
            @forelse($themes as $theme)
            <div class="flex items-center justify-between p-4 bg-white transition-colors">
                <div>
                    <h4 class="font-bold text-lg">{{ $theme->title }}</h4>
                    <span class="text-xs font-bold uppercase tracking-wider text-black/60">
                        {{ $theme->name ?? 'Sans thème' }}
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-black/50 hidden sm:inline">
                        {{ $theme->created_at->format('d/m/Y') }}
                    </span>
                    <!-- Bouton Modifier -->
                    <a href="{{ route('admin.themes.edit', $theme) }}"
                        class="px-4 py-2 bg-black text-white text-sm font-bold rounded-full hover:bg-gray-800 transition-colors">
                        Modifier
                    </a>
                </div>
            </div>
            @empty
            <p class="text-center text-black/50 py-4">Aucun article pour le moment.</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white/50 border-2 border-black rounded-[2rem] p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Derniers Articles</h2>
            <div class="text-sm font-bold bg-black text-white px-4 py-1 rounded-full">
                Total: {{ $articlesCount }}
            </div>
        </div>

        <div class="space-y-6">
            @forelse($recentArticles as $article)
            <div class="flex items-center justify-between p-4 bg-white transition-colors">
                <div>
                    <h4 class="font-bold text-lg">{{ $article->title }}</h4>
                    <span class="text-xs font-bold uppercase tracking-wider text-black/60">
                        {{ $article->theme->name ?? 'Sans thème' }}
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-black/50 hidden sm:inline">
                        {{ $article->created_at->format('d/m/Y') }}
                    </span>
                    <!-- Bouton Modifier -->
                    <a href="{{ route('admin.articles.edit', $article) }}"
                        class="px-4 py-2 bg-black text-white text-sm font-bold rounded-full hover:bg-gray-800 transition-colors">
                        Modifier
                    </a>
                </div>
            </div>
            @empty
            <p class="text-center text-black/50 py-4">Aucun article pour le moment.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection