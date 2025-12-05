<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Theme;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Récupère les thèmes avec articles du jour
        $themes = Theme::whereHas('articles', function ($query) {
            $query->whereDate('published_at', Carbon::today());
        })->get();

        $currentThemeId = $request->query('theme_id');
        $article = null;

        if ($currentThemeId) {
            $article = Article::where('theme_id', $currentThemeId)
                ->whereDate('published_at', Carbon::today())
                ->latest('published_at')
                ->first();
        }

        return view('welcome', compact('themes', 'article', 'currentThemeId'));
    }

    // NOUVELLE MÉTHODE : Afficher un article complet
    public function show(Article $article)
    {
        return view('article', compact('article'));
    }
}