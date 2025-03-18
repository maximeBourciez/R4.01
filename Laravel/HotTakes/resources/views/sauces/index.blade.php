@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container my-3 d-flex justify-content-between align-items-center">  
        <h1>Sauces</h1>
        <a href="{{ route('sauces.create') }}" class="btn btn-primary">Ajouter une sauce</a>
    </div>
    
    <div class="row">
        @foreach($sauces as $sauce)
            <div class="col-md-4 d-flex align-items-stretch"> 
                <div class="card shadow-sm w-100" style="min-height: 450px;">
                    <!-- Image avec hauteur fixe et object-fit:cover -->
                    <img src="{{ $sauce->imageUrl }}" class="card-img-top" alt="{{ $sauce->name }}" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $sauce->name }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($sauce->description, 100) }}</p>
                        <a href="{{ route('sauces.show', $sauce->idSauce) }}" class="btn btn-primary mt-auto">Voir plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
