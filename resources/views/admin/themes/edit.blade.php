@extends('base')

@section('title', 'Modifier le thème $theme->name')

@section('content')
<div class="w-full max-w-3xl mx-auto px-6 py-12">

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-4xl font-bold tracking-tighter">Modifier le thème</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold underline">Retour</a>
    </div>

    <form action="{{ route('admin.themes.update', $theme) }}" method="POST" class="space-y-6" id="form-edit">
        @csrf
        @method('PUT') <!-- Important pour la mise à jour -->

        <!-- Titre -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Titre du thème</label>
            <input type="text" name="name" required value="{{ old('name', $theme->name) }}"
                class="w-full px-6 py-4 bg-transparent border-2 border-black rounded-full focus:ring-0 focus:border-black text-lg">
        </div>

        <!-- Chapo -->
        <div class="space-y-2">
            <label class="font-bold ml-2">Couleur</label>
            <input name="color" type="color" value="{{ old('color', $theme->color) }}"
                class="">{{ old('color', $theme->color) }}</textarea>
        </div>

        <button type="submit" form="form-edit" class="w-full py-4 bg-black text-white font-bold text-xl rounded-full hover:opacity-90 transition-opacity">
            Mettre à jour le thème
        </button>
    </form>

    <form action="{{ route('admin.themes.destroy', $theme) }}" method="post" class="space-y-6" id="form-delete">
        @csrf
        @method('DELETE') <!-- Important pour la mise à jour -->

        <button type="submit" form="form-delete" class="w-full py-4 border border-black text-black font-bold text-xl rounded-full hover:opacity-90 transition-opacity">
            Supprimer le thème
        </button>
    </form>
    
</div>
@endsection