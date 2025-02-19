@extends('layouts.app')
@section('content')
    <div class="container mx-auto text-center">
        <h2 class="text-gray-600 uppercase tracking-widest my-6">The Sauces</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($sauces as $sauce)
                <div class="text-center">
                    <img src="{{ asset('storage/' . $sauce->imageUrl) }}" alt="{{ $sauce->name }}" class="mx-auto h-40">
                    <h3 class="mt-2 font-semibold">{{ strtoupper($sauce->name) }}</h3>
                    <p class="text-gray-500">Heat: {{ $sauce->heat }}/10</p>
                    <p class="text-sm text-gray-400">{{ $sauce->manufacturer }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection