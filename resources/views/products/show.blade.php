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

        <main class="product-display-main">
            <section class="product-display-section">
                <div class="product-image">
                    <img src="product1.jpg" alt="Product 1">
                </div>
                <div class="product-details">
                    <h1>{{ $product->prod_name }}</h1>
                    <div class="product-rating">
                        <span>★★★★☆</span> (120 reviews)
                    </div>
                    <p class="product-price">${{ $product->price }}</p>
                    {{-- <div class="product-tags">
                        <span>Clothing</span>
                        <span>Men</span>
                        <span>Casual</span>
                    </div> --}}
                    <p class="product-description">
                        {{ $product->prod_desc }}
                    </p>
                    <form action="{{ route('prod', $product->id) }}" method="POST">
                        @csrf
                        <input type="submit" value="Add to Cart" name="" class="add-to-cart-btn">
                        {{-- <in class="add-to-cart-btn">Add to Cart</in> --}}
                    </form>

                </div>
            </section>

            <section class="shipping-section">
                <h2>Shipping Information</h2>
                <div class="shipping-details">
                    <p><strong>Estimated Delivery:</strong> March 25, 2025 - March 27, 2025</p>
                    <p><strong>Shipping Cost:</strong> $5.99 (Free on orders over $50)</p>
                    <p><strong>Shipping Options:</strong> Standard (3-5 days), Express (1-2 days)</p>
                    <p><strong>Return Policy:</strong> 30-day returns with free return shipping</p>
                </div>
            </section>

            <section class="reviews-section">
                <h2>Customer Reviews</h2>

                @foreach ($product->comment as $prod)
                <div class="review">
                    <div class="review-header">
                        <span class="reviewer-name">{{ $prod->author }}</span>
                        <span class="review-rating">★★★★★</span>
                    </div>
                    <p class="review-date">{{$prod->created_at}}</p>
                    <p class="review-text">{{ $prod->comment }}</p>
                </div>
                @endforeach

                @auth
                <form class="review-form" action="{{ route('prod', $product->id) }}" method="POST">
                    @csrf
                    <textarea name="comment" placeholder="Write your comment here..." required></textarea>
                    <button type="submit" class="submit-review-btn">Submit Comment</button>
                </form>
                @else
                <x-button style="a" class="login-to-comment-btn" href="{{ route('register') }}">Login To Leave A Comment
                </x-button>
                @endauth

            </section>
        </main>

    </x-slot:body>
</x-layout>