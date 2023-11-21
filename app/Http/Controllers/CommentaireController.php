<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ajouterComment(Request $request, $id)
    {
        $request->validate(
            [
                'contenu' => 'required'
            ]
        );

        $commentaire = new Commentaire([
            'contenu' => $request->get('contenu'),
            'article_id' => $id,
            'user_id' => Auth::user()->id,
        ]);

        $commentaire->save();

        return back()->with('status', 'commentaire ajoute avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $commentaire = Commentaire::find($id);
        return view('commentaire.modifier', ['commentaire' => $commentaire]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'contenu' => 'required'
            ]
        );
        $commentaire = Commentaire::find($id);
        $commentaire->update($data);
        return Redirect::to('/article/' . $commentaire->article_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commentaire = Commentaire::find($id);
        $commentaire->delete();
        return Redirect::to('/article/' . $commentaire->article_id);
    }
}
