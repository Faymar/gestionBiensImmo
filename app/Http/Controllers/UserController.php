<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::all(); // Récupérer tous les biens depuis le modèle article
        return view('article.listeArticle', compact('article'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function user()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
    public function articles()
    {
        $article = Article::all(); // Récupérer tous les biens depuis le modèle article
        return view('admin.articles', compact('article'));
    }
    public function commentaires()
    {
        return view('admin.commentaires');
    }

    public function ajouter()
    {
        return view('admin.ajouter');
    }

    public function profil()
    {
        return view('admin.profil');
    }

    public function profilUser()
    {
        return view('admin.profilUser');
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'prenom' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('status', 'Informations de Compte modifiees avec success');
    }

    public function updatePasswd(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'password' => 'required',
            'newpassword' => 'required|min:8|different:password',
            'renewpassword' => 'required|same:newpassword',
        ]);

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Le mot de passe actuel est incorrect.',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->newpassword),
        ]);

        return back()->with('status', 'Informations de Compte modifiees avec success');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('status', 'Compte supprime avec success');
    }
}
