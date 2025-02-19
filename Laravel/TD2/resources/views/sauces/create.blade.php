@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Ajouter une sauce</h1>

    <form action="{{ route('store.sauce') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf

        <!-- Nom de la sauce -->
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <!-- Fabricant -->
        <div class="mb-3">
            <label class="form-label">Manufacturer</label>
            <input type="text" name="manufacturer" class="form-control" value="{{ old('manufacturer') }}" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <button type="button" class="btn btn-primary mt-2">ADD IMAGE</button>
            <div class="mt-2">
                <img id="preview" src="#" alt="Preview" class="d-none img-thumbnail" width="100">
            </div>
        </div>

        <!-- Ingrédient principal -->
        <div class="mb-3">
            <label class="form-label">Main Pepper Ingredient</label>
            <input type="text" name="main_ingredient" class="form-control" value="{{ old('main_ingredient') }}" required>
        </div>

        <!-- Échelle de chaleur -->
        <div class="mb-3">
            <label class="form-label">Heat</label>
            <input type="range" name="heat" min="1" max="10" value="3" class="form-range">
            <input type="text" id="heatValue" value="3" class="form-control text-center w-25">
        </div>

        <!-- Bouton Soumettre -->
        <div class="mb-3">
            <button type="submit" class="btn btn-success">SUBMIT</button>
        </div>
    </form>
</div>

<script>
    document.querySelector('input[name="heat"]').addEventListener('input', function() {
        document.getElementById('heatValue').value = this.value;
    });

    document.querySelector('input[name="image"]').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const img = document.getElementById('preview');
            img.src = reader.result;
            img.classList.remove('d-none');
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>
@endsection
