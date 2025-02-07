
@extends('layouts.app')

@section('title', 'Liste des Clients')

@section('content')
    <div class="container">
        <h2>Liste des Clients</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Carte Bancaire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->carteBancaire }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
