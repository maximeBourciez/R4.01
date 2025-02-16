@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Button to create a new client -->
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un client</a>
    
    <!-- Table of clients -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Carte Bancaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->numeroClient }}</td>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->carteBancaire }}</td>
                    <td>
                        <!-- Edit button -->
                        <a href="{{ route('clients.edit', $client->numeroClient) }}" class="btn btn-warning btn-sm">Éditer</a>
                        
                        <!-- Show button -->
                        <a href="{{ route('clients.show', $client->numeroClient) }}" class="btn btn-info btn-sm">Voir</a>

                        <!-- Delete button -->
                        <form action="{{ route('clients.destroy', $client->numeroClient) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Pagination links -->
    <div class="d-flex justify-content-center">
        {!! $clients->links('pagination::bootstrap-4') !!}
    </div>
</div>
@endsection
