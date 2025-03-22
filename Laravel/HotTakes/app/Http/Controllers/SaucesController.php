<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;


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
        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une sauce.');
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
        $fichier = $request->file('imageUrl');
        $imageUrl = $fichier->store('sauces', 'public');
    
        // Création de la sauce
        Sauce::create([
            'userId' => Auth::id(), 
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

        // Vérifier que l'utilisateur est le propriétaire de la sauce
        if (Auth::id() != $sauce->userId) {
            return redirect()->route('sauces.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cette sauce.');
        }

        return view('sauces.edit', compact('sauce'));
    }

    // Méthode pour mettre à jour une sauce
    public function update(Request $request, $id)
    {
        // Récupération de la sauce
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return abort(404);
        }

        // Vérifier l'authentification de l'utilisateur et que la sauce lui appartient
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour modifier une sauce.');
        }
        else if(Auth::id() != $sauce->userId){
            return redirect()->route('sauces.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cette sauce.');
        }

        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string',
            'mainPepper' => 'required|string|max:255',
            'imageUrl' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'heat' => 'required|integer|min:1|max:10',
        ]);

        // Gestion de l'upload d'image
        if ($request->hasFile('imageUrl')) {
            // Supprimer l'ancienne image si elle existe
            if ($sauce->imageUrl) {
                $oldImagePath = str_replace(asset('storage/'), '', $sauce->imageUrl);
                Storage::disk('public')->delete($oldImagePath);
            }
            
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
        // Récupération de la sauce
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return abort(404);
        }

        // Vérifier l'authentification de l'utilisateur et que la sauce lui appartient
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour supprimer une sauce.');
        }
        else if(Auth::id() != $sauce->userId){
            return redirect()->route('sauces.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette sauce.');
        }

        // Suppression de l'image
        if ($sauce->imageUrl) {
            $imagePath = str_replace(asset('storage/'), '', $sauce->imageUrl);
            Storage::disk('public')->delete($imagePath);
        }

        // Suppression de la sauce
        $sauce->delete();

        return redirect()->route('sauces.index')->with('success', 'Sauce supprimée avec succès!');
    }
}