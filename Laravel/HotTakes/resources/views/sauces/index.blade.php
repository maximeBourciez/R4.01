@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sauces</h1>
        <div class="row">
            @foreach($sauces as $sauce)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $sauce->image }}" class="card-img-top" alt="{{ $sauce->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sauce->name }}</h5>
                            <p class="card-text">{{ $sauce->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection