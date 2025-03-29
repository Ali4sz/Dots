<x-layout>

    <x-slot:title>Products - Dots eShop</x-slot:title>

    <x-slot:navbar>

        <header class="amazon-header">
            <x-logo></x-logo>
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
        </header>

    </x-slot:navbar>
    <x-slot:body>

        <main class="products-main">
            <aside class="products-sidebar">
                <h3>Filter Products</h3>
                <div class="filter-group">
                    <h4>Category</h4>
                    <x-input type="checkbox" name="category" value="clothing">Clothing</x-input>
                    <x-input type="checkbox" name="category" value="accessories">Accessories</x-input>
                    <x-input type="checkbox" name="category" value="electronics">Electronics</x-input>
                </div>
                <div class="filter-group">
                    <h4>Price Range</h4>
                    <x-input type="radio" name="price" value="0-25">$0 - $25</x-input>
                    <x-input type="radio" name="price" value="25-50">$25 - $50</x-input>
                    <x-input type="radio" name="price" value="50+">$50+</x-input>
                </div>
            </aside>

            <section class="products-content">
                <h1>Explore Our Products</h1>
                <div class="products-grid">
                    @foreach ($products as $product)
                    <div class="product-card">
                        <img src="product1.jpg" alt="{{ $product->prod_name }}">
                        <h2>{{ $product->prod_name }}</h2>
                        <p class="description">{{ $product->prod_desc }}</p>
                        <p class="price">${{ $product->price }}</p>
                        <div class="rating">
                            <span>★★★★☆</span> (120 reviews)
                        </div>
                        <a href="{{ route('product', $product->id) }}" class="index-add-to-cart-btn">More Details</a>
                        <div class="hover-dots">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div>{{ $prods->links() }}</div> --}}
                </div>
            </section>
        </main>

    </x-slot:body>
</x-layout>