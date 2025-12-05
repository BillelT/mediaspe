<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // ... (méthodes index et theme inchangées) ...
    public function index()
    {
        $themes = Theme::all();
        $themesCount = Theme::count();
        $articlesCount = Article::count();
        $recentArticles = Article::with('theme')->latest()->take(5)->get();

        return view('admin.dashboard', compact('themes', 'themesCount', 'articlesCount', 'recentArticles'));
    }

    public function createTheme()
    {
        return view('admin.themes.create');
    }

    public function editTheme(Theme $theme)
    {
        return view('admin.themes.edit', compact('theme'));
    }

    public function updateTheme(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'color' => 'required|string',
        ]);

        $theme->update([
            'name' => $request->name,
            'color' => $request->color,
            'slug' => Str::slug($request->name), // Mise à jour du slug si le titre change
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Thème mis à jour avec succès !');
    }

    public function storeTheme(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Theme::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Thème créé avec succès !');
    }

    public function deleteTheme(Theme $theme)
    {
        $theme->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Thème supprimé avec succès !');
    }

    // --- GESTION DES ARTICLES ---

    public function createArticle()
    {
        $themes = Theme::all();
        return view('admin.articles.create', compact('themes'));
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'theme_id' => 'required|exists:themes,id',
            'chapo' => 'nullable|string|max:500',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'chapo' => $request->chapo,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'theme_id' => $request->theme_id,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Article publié avec succès !');
    }

    // --- ÉDITION DES ARTICLES ---

    public function editArticle(Article $article)
    {
        $themes = Theme::all();
        return view('admin.articles.edit', compact('article', 'themes'));
    }

    public function updateArticle(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'theme_id' => 'required|exists:themes,id',
            'chapo' => 'nullable|string|max:500',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Mise à jour du slug si le titre change
            'chapo' => $request->chapo,
            'content' => $request->content,
            'published_at' => $request->published_at,
            'theme_id' => $request->theme_id,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Article mis à jour avec succès !');
    }

    public function deleteArticle(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Article supprimé avec succès !');
    }
}
