@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informations sur le client</h2>
    <ul>
        <li><strong>Nom :</strong> {{ $client->nom }}</li>
        <li><strong>Email :</strong> {{ $client->email }}</li>
        <li><strong>Carte Bancaire :</strong> {{ $client->carteBancaire }}</li>
    </ul>
    <a href="{{ route('clients.index') }}" class="btn btn-primary">Retour à la liste</a>
</div>
@endsection
