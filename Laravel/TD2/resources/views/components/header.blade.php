<header class="border-b py-4">
    <nav class="container mx-auto flex justify-between items-center">
        <div class="flex items-center space-x-6">
            <a href="{{ route('home') }}" class="font-bold uppercase">All Sauces</a>
            <a href="{{ route('add.sauce') }}" class="text-gray-600">Add Sauce</a>
        </div>

        <div class="text-center">
            <h1 class="text-2xl font-extrabold">HOT TAKES</h1>
            <p class="text-sm text-gray-500">THE WEB'S BEST HOT SAUCE REVIEWS</p>
        </div>

        <div>
            <a href="{{ route('logout') }}" class="text-gray-600">Logout</a>
        </div>
    </nav>
</header>
