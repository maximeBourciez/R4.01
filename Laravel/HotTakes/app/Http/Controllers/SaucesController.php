<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
use App\Models\UserReactsSauce;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


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
        // Récupérer la sauce avec l'ID
        $sauce = Sauce::find($id);

        // Gérer le cas où la sauce n'existe pas
        if (!$sauce) {
            return abort(404); // Gérer le cas où la sauce n'existe pas
        }

        // Récupérer l'utilisateur connecté
        $userId = auth()->id();
        $userReaction = null;

        // Vérifier si l'utilisateur a déjà réagi à cette sauce
        if ($userId) {
            $userReaction = UserReactsSauce::where('userId', $userId)
                ->where('sauceId', $id)
                ->first();
        }

        // Retourner la vue avec les données nécessaires : sauce, réactions, et l'utilisateur connecté
        return view('sauces.show', [
            'sauce' => $sauce,
            'likes' => UserReactsSauce::where('sauceId', $id)->where('reaction', 1)->count(),
            'dislikes' => UserReactsSauce::where('sauceId', $id)->where('reaction', 0)->count(),
            'userReaction' => $userReaction
        ]);
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
        } else if (Auth::id() != $sauce->userId) {
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

            $imageName = time() . '.' . $request->imageUrl->extension();
            $imagePath = $request->imageUrl->storeAs('sauces', $imageName, 'public');
            $imageUrl = asset('storage/' . $imagePath);
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
        } else if (Auth::id() != $sauce->userId) {
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




    // Méthoide pour ajouter une réaction à une sauce
    public function react(int $id, int $reaction)
    {
        // Vérifier si la réaction est valide (1 pour like, 0 pour dislike)
        if (!in_array($reaction, [0, 1])) {
            return response()->json(['error' => 'La réaction doit être 0 ou 1'], 400);
        }

        $userId = auth()->id(); // Récupérer l'utilisateur connecté

        // Vérifier si l'utilisateur a déjà réagi à cette sauce
        $reactionRecord = UserReactsSauce::where('userId', $userId)
            ->where('sauceId', $id)
            ->first();

        if ($reactionRecord) {
            // Si l'utilisateur veut supprimer sa réaction (il clique sur le même bouton)
            if ($reactionRecord->reaction === $reaction) {
                UserReactsSauce::where('userId', $userId)
                                ->where('sauceId', $id)
                                ->delete();
                return redirect()->route('sauces.show', $id)
                    ->with('message', 'Réaction supprimée');
            }

            // Sinon, on met à jour la réaction (like <-> dislike)
            $reactionRecord->reaction = $reaction;
            UserReactsSauce::where('userId', $userId)
                ->where('sauceId', $id)
                ->update(['reaction' => $reaction]);
            return redirect()->route('sauces.show', $id)
                ->with('message', 'Réaction mise à jour');
        }

        // Ajouter une nouvelle réaction
        UserReactsSauce::create([
            'userId' => $userId,
            'sauceId' => $id,
            'reaction' => $reaction,
        ]);

        return redirect()->route('sauces.show', $id)
            ->with('message', 'Réaction ajoutée');
    }

}