<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article as Article;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{


    public function index(): View
    {

        $articles = new Article();
        $articles = $articles::paginate(1);


        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function show(string $slug, string $id): RedirectResponse | Article
    {
        $article = new Article();
        $article = $article::findOrFail($id);

        if ($article->slug == ! $slug) {
            return to_route('articles.show', ['slug' => $article->slug, 'id' => $article->id]);
        }

        return $article;
    }
}
