<header class="border-bottom py-4">
    <nav class="container d-flex justify-content-between align-items-center">
        <div class="d-flex gap-3">
            <a href="{{ route('home') }}" class="fw-bold text-uppercase text-decoration-none">All Sauces</a>
            <a href="{{ route('add.sauce') }}" class="text-muted text-decoration-none">Add Sauce</a>
        </div>

        <div class="text-center">
            <h1 class="fs-2 fw-bold">HOT TAKES</h1>
            <p class="fs-6 text-muted">THE WEB'S BEST HOT SAUCE REVIEWS</p>
        </div>

        <div>
            <a href="{{ route('logout') }}" class="text-muted text-decoration-none">Logout</a>
        </div>
    </nav>
</header>