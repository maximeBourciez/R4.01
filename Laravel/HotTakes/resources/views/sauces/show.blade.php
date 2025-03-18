@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row">
        <img src="{{  asset($sauce->imageUrl) }}" alt="{{ $sauce->imageUrl }}" class="col-md-8" style="height: 450px; object-fit: cover;">
        <div class="ml-3 d-flex flex-column justify-content-around align-items-center text-center">
            <h1>{{ $sauce->name }}</h1>
            <h3>{{ $sauce->manufacturer }}</h3>
            <p>{{ $sauce->description }}</p>
            <p>Heat : {{ $sauce->heat }} / 10</p>
            <div class="d-flex flex-row justify-content-around w-100">
                <a href="{{ route('sauce.react', [$sauce->idSauce, true]) }}" class="btn btn-secondary like">J'aime</a>
                <a href="{{ route('sauce.react', [$sauce->idSauce, false]) }}" class="btn btn-secondary dislike">J'aime pas</a>
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

/* Appliquer les couleurs correctement */
.like:hover {
    background-color: #00FF00 !important;
    border-color: #00FF00 !important;
    color: white !important;
}

.dislike:hover {
    background-color: #FF0000 !important;
    border-color: #FF0000 !important;
    color: white !important;
}

</style>
@endsection