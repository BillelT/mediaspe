@extends('base')

@section('title', 'Nouveau Thème')

@section('content')
<div class="w-full max-w-2xl mx-auto px-6 py-12">

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold tracking-tighter">Créer un Thème</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold underline">Retour</a>
    </div>

    <form action="{{ route('admin.themes.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Nom du thème -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Nom du thème</label>
            <input type="text" name="name" required
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-full focus:ring-0 focus:border-black text-lg"
                placeholder="Ex: Politique Internationale">
        </div>

        <!-- Description -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Description (Optionnel)</label>
            <textarea name="description" rows="4"
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-3xl focus:ring-0 focus:border-black text-lg"
                placeholder="Courte description de ce que contient ce thème..."></textarea>
        </div>

        <!-- Color -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Color</label>
            <input name="color" type="color">
        </div>

        <button type="submit" class="w-full py-4 bg-black text-white font-bold text-xl rounded-full hover:opacity-90 transition-opacity">
            Enregistrer le Thème
        </button>
    </form>
</div>
@endsection