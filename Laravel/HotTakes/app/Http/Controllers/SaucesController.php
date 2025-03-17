<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;

class SaucesController extends Controller
{
    // Méthode de listing de toutes les sauces
    public function index()
    {
        $sauces = Sauce::all();
        return view('sauces.index', compact('sauces'));
    }

    // Méthode d'affichage de la vue d'ajout de sauce
    public function onAddTry()
    {
        return view('sauces.create');
    }

    // Méthode d'affichage d'une sauce en particulier
    public function show($id)
    {
        $sauce = Sauce::find($id);
        return view('sauces.show', compact('sauce'));
    }
}
