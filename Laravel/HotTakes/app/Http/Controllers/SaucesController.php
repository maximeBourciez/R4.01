<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class SaucesController extends Controller
{
    // Affiche toutes les sauces
    public function index()
    {
        $sauces = Sauce::all();
        return view('sauces.index', compact('sauces'));
    }

    // Affiche la vue de création de sauce
    public function create()
    {
        return view('sauces.create');
    }

    // Affiche une sauce en particulier
    public function show($id)
    {
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return abort(404); // Gérer le cas où la sauce n'existe pas
        }

        return view('sauces.show', compact('sauce'));
    }


    // Enregistre une nouvelle sauce
    public function store(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add a sauce.');
        }

        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string',
            'mainPepper' => 'required|string|max:255',
            'imageUrl' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'heat' => 'required|integer|min:1|max:10',
        ]);

        // Gestion de l'upload d'image
        $imageName = time().'.'.$request->imageUrl->extension();
        $imagePath = $request->imageUrl->storeAs('sauces', $imageName, 'public');
        $imageUrl = asset('storage/'.$imagePath);

        // Création et enregistrement de la sauce
        Sauce::create([
            'userId' => Auth::user()->id, 
            'name' => $request->input('name'),
            'manufacturer' => $request->input('manufacturer'),
            'description' => $request->input('description'),
            'mainPepper' => $request->input('mainPepper'),
            'imageUrl' => $imageUrl,
            'heat' => $request->input('heat'),
            'likes' => 0,
            'dislikes' => 0,
        ]);

        return redirect()->route('sauces.index')->with('success', 'Sauce ajoutée avec succès!');
    }

    // Méthode pour afficher le formulaire d'édition d'une sauce
    public function edit($id)
    {
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return abort(404);
        }

        return view('sauces.edit', compact('sauce'));
    }

    // Méthode pour mettre à jour une sauce
    public function update(Request $request, $id)
    {
        // Vérifier l'authentification de l'utilisateur et que la sauce lui appartient
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to edit a sauce.');
        }
        else if(Auth::user()->id != Sauce::find($id)->userId){
            return redirect()->route('sauces.index')->with('error', 'You are not allowed to edit this sauce.');
        }

        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string',
            'mainPepper' => 'required|string|max:255',
            'imageUrl' => 'image|mimes:jpeg,png,jpg|max:2048',
            'heat' => 'required|integer|min:1|max:10',
        ]);

        // Récupération de la sauce
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return abort(404);
        }

        // Gestion de l'upload d'image
        if ($request->hasFile('imageUrl')) {
            $imageName = time().'.'.$request->imageUrl->extension();
            $imagePath = $request->imageUrl->storeAs('sauces', $imageName, 'public');
            $imageUrl = asset('storage/'.$imagePath);
        } else {
            $imageUrl = $sauce->imageUrl;
        }

        // Mise à jour de la sauce
        $sauce->update([
            'name' => $request->input('name'),
            'manufacturer' => $request->input('manufacturer'),
            'description' => $request->input('description'),
            'mainPepper' => $request->input('mainPepper'),
            'imageUrl' => $imageUrl,
            'heat' => $request->input('heat'),
        ]);

        return redirect()->route('sauces.index')->with('success', 'Sauce modifiée avec succès!');
    }


    // Méthode pour supprimer une sauce
    public function destroy($id)
    {
        // Vérifier l'authentification de l'utilisateur et que la sauce lui appartient
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to delete a sauce.');
        }
        else if(Auth::user()->id != Sauce::find($id)->userId){
            return redirect()->route('sauces.index')->with('error', 'You are not allowed to delete this sauce.');
        }

        // Récupération de la sauce
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return abort(404);
        }

        // Suppression de l'image
        Storage::disk('public')->delete(str_replace('storage/', '', $sauce->imageUrl));

        // Suppression de la sauce
        $sauce->delete();

        return redirect()->route('sauces.index')->with('success', 'Sauce supprimée avec succès!');
    }
    
}
