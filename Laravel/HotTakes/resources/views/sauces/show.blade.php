@extends('layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <div class="container">
        <div class="d-flex flex-row">
            <div class="d-flex flex-column col-md-8">
                <img src="{{ asset('storage/' . $sauce->imageUrl) }}" alt="{{ $sauce->imageUrl }}"
                    style="height: 450px; object-fit: cover;">
                @if ($sauce->userId === Auth::id() && Auth::check())
                    <div class="d-flex flex-row gap-1">
                        <a href="{{ route('sauces.edit', $sauce->idSauce) }}" class="btn btn-primary mt-3 mr-2">Modifier</a>
                        <form action="{{ route('sauces.destroy', $sauce->idSauce) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="ml-3 d-flex flex-column justify-content-around align-items-center text-center">
                <h1>{{ $sauce->name }}</h1>
                <h3>{{ $sauce->manufacturer }}</h3>
                <p>{{ $sauce->description }}</p>
                <p>Heat : {{ $sauce->heat }} / 10</p>
                <div class="d-flex flex-row justify-content-around w-100">
                    <a href="{{ route('sauce.react', [$sauce->idSauce, 1]) }}" class="btn btn-secondary like">
                        <i class="fas fa-thumbs-up"></i> {{ $likes }}
                    </a>
                    <a href="{{ route('sauce.react', [$sauce->idSauce, 0]) }}" class="btn btn-secondary dislike">
                        <i class="fas fa-thumbs-down"></i> {{ $dislikes }}
                    </a>
                </div>
                <a href="{{ route('sauces.index') }}" class="w-100 btn btn-primary">Retour à l'accueil</a>
            </div>
        </div>
    </div>

    <style>
        .btn {
            transition: all 0.3s ease-in;
        }

        .btn:hover {
            transform: scale(1.05);
        }
    </style>
@endsection