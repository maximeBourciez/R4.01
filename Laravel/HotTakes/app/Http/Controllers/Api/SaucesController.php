<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sauce;
use Illuminate\Support\Facades\Validator;

class SaucesController extends Controller
{
    public function index()
    {
        $sauces = Sauce::all();
        return response()->json([
            'success' => true,
            'data' => $sauces
        ]);
    }

    public function show($id)
    {
        $sauce = Sauce::find($id);
        
        if (!$sauce) {
            return response()->json([
                'success' => false,
                'message' => 'Sauce non trouvée'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $sauce
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'manufacturer' => 'required|string|max:255',
            'mainPepper' => 'required|string|max:255',
            'heat' => 'required|integer|min:1|max:10',
            'imageUrl' => 'nullable|string|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $sauce = Sauce::create($request->all());
        
        // Stockage de l'image
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('images', 'public');
            $sauce->imageUrl = asset('storage/' . $imagePath);
            $sauce->save();
        }

        return response()->json([
            'success' => true,
            'data' => $sauce,
            'message' => 'Sauce créée avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $sauce = Sauce::find($id);
        
        if (!$sauce) {
            return response()->json([
                'success' => false,
                'message' => 'Sauce non trouvée'
            ], 404);
        }
        
        $validator = Validator::make($request->all(), [
            'nom' => 'string|max:255',
            'description' => 'string',
            'prix' => 'numeric',
            'niveau_piquant' => 'integer|min:1|max:10',
            // Ajoutez d'autres validations selon votre modèle
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $sauce->update($request->all());
        
        return response()->json([
            'success' => true,
            'data' => $sauce,
            'message' => 'Sauce mise à jour avec succès'
        ]);
    }

    public function destroy($id)
    {
        $sauce = Sauce::find($id);
        
        if (!$sauce) {
            return response()->json([
                'success' => false,
                'message' => 'Sauce non trouvée'
            ], 404);
        }
        
        $sauce->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Sauce supprimée avec succès'
        ]);
    }
}