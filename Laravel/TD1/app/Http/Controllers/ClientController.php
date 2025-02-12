<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\DossierDeLocation;
use App\Models\Reservation;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }
}