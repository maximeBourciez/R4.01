@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- Card contenant les informations détaillées de la sauce -->
                <div class="card">
                    <img src="{{ asset('storage/' . $sauce->imageUrl) }}" alt="{{ $sauce->name }}" class="card-img-top" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title fw-semibold text-center">{{ strtoupper($sauce->name) }}</h2>
                        <p class="text-muted text-center">Fabricant : {{ $sauce->manufacturer }}</p>
                        
                        <div class="mt-3">
                            <h5>Description</h5>
                            <p>{{ $sauce->description }}</p>
                        </div>
                        
                        <div class="mt-3">
                            <p class="text-muted">Heat: {{ $sauce->heat }}/10</p>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="{{ route('home') }}" class="btn btn-secondary">Retour à la liste</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
