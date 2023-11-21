<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('article.articles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'type' => 'required',
            'statut' => 'required',
        ]);

        $imagePath = $request->file('image')->store('images/article', 'public');

        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->image = $imagePath;
        $article->type = $request->type;
        $article->statue = $request->statut;

        $article->save();

        return back()->with('status', 'Article ajouté avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = Article::all(); // Récupérer tous les biens depuis le modèle article
        return view('article.listeArticle', compact('article')); // Passer les Articles à la vue
    }

    public function voirDetails($id)
    {
        $article = Article::findOrFail($id);
        $commentaire = Commentaire::where('article_id', '=', $id)->get();
        return view('article.voirDetails', compact('article', 'commentaire'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.modifierArticle', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'type' => 'required',
            'statut' => 'required',

        ]);
        $article = Article::findOrFail($id);
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('images/article', 'public');
            $article->image = $imagePath;
        }
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->type = $request->type;
        $article->statue = $request->statut;

        $article->update();

        return back()->with('status', 'Article mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        Storage::disk('public')->delete($article->image);

        $article->delete();
        return back()->with('success', 'Article supprimer avec succès');
    }
}
