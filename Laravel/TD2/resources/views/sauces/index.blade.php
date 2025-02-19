@extends('layouts.app')
@section('content')
    <div class="container text-center mb-4">
        <h2 class="text-muted text-uppercase fw-light my-4">The Sauces</h2>
        <div class="row g-4">
            @foreach($sauces as $sauce)
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card h-100 d-flex flex-column">
                        <!-- Image avec taille fixe -->
                        <img src="{{ asset('storage/' . $sauce->imageUrl) }}" alt="{{ $sauce->name }}" class="card-img-top" style="height: 200px; width: 100%; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title mt-2 fw-semibold">{{ strtoupper($sauce->name) }}</h3>
                            <p class="text-muted">Heat: {{ $sauce->heat }}/10</p>
                            <p class="text-secondary small">{{ $sauce->manufacturer }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('show.sauce', $sauce->idSauce) }}" class="btn btn-primary">Details</a>
                        </div> 
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
