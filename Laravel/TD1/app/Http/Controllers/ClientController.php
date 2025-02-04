<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all(); // Récupérer tous les clients de la base de données
        return view('clients.index', compact('clients'));
    }
}
