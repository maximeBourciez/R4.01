@extends('app.layout')

@section('content')
    <h1>Create a new sauce</h1>
    <form action="{{ route('sauces.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="spiciness">Spiciness</label>
            <input type="number" name="spiciness" id="spiciness" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection