@extends('base')

@section('title', 'Accueil du Blog')

@section('content')

<h1 class="text-4xl font-bold text-red-900 font-thin">Tailwind v3 fonctionne !</h1>

@foreach($articles as $article)
<article>
    <h2 class="font-[800]">
        {{$article->title}}
    </h2>
    <p class="font-black">
        {{$article->content}}
    </p>
</article>
@endforeach

{{$articles->links()}}

@endsection