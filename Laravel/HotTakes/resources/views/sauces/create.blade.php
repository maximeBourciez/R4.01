@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-4">Create a New Sauce</h1>
        <form action="{{ route('sauces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Sauce Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <!-- Manufacturer -->
            <div class="mb-3">
                <label for="manufacturer" class="form-label">Manufacturer</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>

            <!-- Main Pepper -->
            <div class="mb-3">
                <label for="mainPepper" class="form-label">Main Pepper Used</label>
                <input type="text" name="mainPepper" id="mainPepper" class="form-control" required>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="imageUrl" class="form-label">Image</label>
                <input type="file" name="imageUrl" id="imageUrl" class="form-control" accept="image/*"
                    onchange="previewImage(event)">

                <!-- Conteneur pour afficher l'aperçu -->
                <div id="imagePreviewContainer" class="mt-3" style="display: none;">
                    <p>Aperçu :</p>
                    <img id="imagePreview" src="" alt="Aperçu de l'image" class="img-thumbnail" width="150">
                </div>
            </div>

            <!-- Spiciness Level -->
            <div class="mb-3">
                <label for="heat" class="form-label">Spiciness Level (1-10)</label>
                <input type="number" name="heat" id="heat" class="form-control" min="1" max="10" required>
            </div>

            <!-- Likes (Hidden, defaults to 0) -->
            <input type="hidden" name="likes" value="0">

            <!-- Dislikes (Hidden, defaults to 0) -->
            <input type="hidden" name="dislikes" value="0">

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create Sauce</button>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const previewContainer = document.getElementById("imagePreviewContainer");
            const previewImage = document.getElementById("imagePreview");

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = "block";
                };

                reader.readAsDataURL(input.files[0]); // Lire le fichier et générer une URL pour l'aperçu
            }
        }
    </script>

@endsection