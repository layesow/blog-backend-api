<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $article = Article::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            //'user_id' => auth()->id(),
            'user_id' => Auth::id(),
            'categorie_id' => $request->categorie_id,
        ]);

        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);  // Utilisation de l'id pour récupérer l'article

        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);  // Utilisation de l'id pour récupérer l'article

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $article->update($request->all());

        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);  // Utilisation de l'id pour récupérer l'article

        $article->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
}
