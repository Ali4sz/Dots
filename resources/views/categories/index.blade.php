<x-layout>
    <x-slot:title>Categories - Dots eShop</x-slot:title>

    <x-slot:navbar>
        <x-nav-bar>
            <x-slot:navlink>
                <div class="header-search">
                    <input type="text" placeholder="Search Dots eShop" class="search-input">
                    <x-button class="search-btn">Search</x-button>
                </div>
                <div class="header-user">

                    @auth
                    <a href="{{ route('profile') }}" class="user-link">Hello, {{ $info['user_name'] ?? '' }}</a>
                    @endauth

                    @guest
                    <a href="{{ route('register') }}" class="user-link">Login Now</a>
                    @endguest

                    <a href="#cart" class="cart-link">
                        <img src="http://localhost/dashboard/Dots/resources/img/cart.png" alt="Cart" class="cart-icon">
                        <span class="cart-count">0</span>
                    </a>
                </div>
            </x-slot:navlink>
        </x-nav-bar>
    </x-slot:navbar>

    <x-slot:body>
        <main class="categories-main">
            <h1>Shop by Category</h1>
            <div class="categories-grid">
                @foreach ($tags as $tag)
                <a href="{{ route('slug', $tag->slug) }}" class="category-card">
                    <img src="{{ $tag->img_url }}" alt="Clothing">
                    <span class="category-name">{{ $tag->slug }}</span>
                </a>
                @endforeach
            </div>
        </main>
    </x-slot:body>
</x-layout>