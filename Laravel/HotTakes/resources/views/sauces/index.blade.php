@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container my-3 d-flex justify-content-between align-items-center">
        <h1>Sauces</h1>
        <a href="{{ route('sauces.create') }}" class="btn btn-primary">Ajouter une sauce</a>
    </div>

    <div class="row">
        @foreach($sauces as $sauce)
            <div class="col-md-3 d-flex my-3">
                <div class="card shadow-sm w-100 text-align-center cardLink">
                    <a href="{{ route('sauces.show', $sauce->idSauce) }}" class="stretched-link text-decoration-none d-flex flex-column" style="height: 100%;">
                        <div class="card-body d-flex flex-column text-align-center align-items-center justify-content-between  flex-grow-1">
                            <img src="{{ $sauce->imageUrl }}" class="card-img-top" alt="{{ $sauce->name }}">
                            <div class="d-flex flex-column text-align-center align-items-center justify-content-between text-dark">
                                <h5 class="card-title">{{ $sauce->name }}</h5>
                                <p class="">Heat : {{ $sauce->heat }} /10</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>


<style>
    .cardLink{
        transition: all 0.3s;

        &:hover{
            transform: scale(1.05);
        }
    }
</style>
@endsection