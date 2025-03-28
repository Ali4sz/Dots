<x-layout>
    <x-slot:title>Dots</x-slot:title>
    <x-slot:navbar>
        <x-nav-bar>
            <x-slot:navlink>
                <ul>
                    <x-nav-link href="{{ route('shop') }}">Shop</x-nav-link>
                    <x-nav-link href="#">Categories</x-nav-link>
                    <x-nav-link href="#">Sales</x-nav-link>
                </ul>

                @auth
                <div class="products-user">
                    <a href="{{ route('profile') }}" class="products-profile-link">
                        <img src="{{ $userDetail->img_url ?? '' }}" alt="User Avatar" class="products-nav-avatar">
                    </a>
                </div>
                @endauth

                @guest
                <div class="home-login">
                    <x-button style="a" class="home-login-btn" href="{{ route('register') }}">Login</x-button>
                </div>
                @endguest
            </x-slot:navlink>
        </x-nav-bar>
    </x-slot:navbar>
    <x-slot:body>
        <section class="home-hero">
            <div class="home-hero-content">
                <h1>Welcome to Dots</h1>
                <p>Discover unique finds that connect the dots of your style.</p>
                <a href="#shop" class="home-hero-btn">Shop Now</a>
            </div>
            <div class="home-hero-background">
                <span class="home-dot home-dot1"></span>
                <span class="home-dot home-dot2"></span>
                <span class="home-dot home-dot3"></span>
            </div>
        </section>

        <section class="home-ads">
            <div class="home-ads-container">
                <div class="home-ad-item">
                    <h2>50K+</h2>
                    <p>Happy Customers</p>
                </div>
                <div class="home-ad-item">
                    <h2>20+</h2>
                    <p>Top Brands</p>
                </div>
                <div class="home-ad-item">
                    <h2>100%</h2>
                    <p>Style Satisfaction</p>
                </div>
            </div>
            <div class="home-brands">
                <h3>Featured Brands</h3>
                <div class="home-brands-list">
                    <span>Nike</span>
                    <span>Adidas</span>
                    <span>Gucci</span>
                    <span>Zara</span>
                </div>
            </div>
        </section>

        <section class="home-featured">
            <h2>Featured Products</h2>
            <div class="home-featured-container">
                {{-- foreach in here --}}
                <x-product-card>
                    <x-slot:prodname>Trendy Sneaker</x-slot:prodname>
                    <x-slot:brandprice>Nike - $89.99</x-slot:brandprice>
                </x-product-card>

                <x-product-card>
                    <x-slot:prodname>Chic Sunglasses</x-slot:prodname>
                    <x-slot:brandprice>Gucci - $149.99</x-slot:brandprice>
                </x-product-card>

                <x-product-card>
                    <x-slot:prodname>Stylish Jacket</x-slot:prodname>
                    <x-slot:brandprice>Adidas - $119.99</x-slot:brandprice>
                </x-product-card>

            </div>
        </section>

        <section class="home-about">
            <div class="home-about-content">
                <h2>About Dots</h2>
                <p>At Dots, our goal is to connect you with unique, stylish products that define your individuality. We
                    aim
                    to curate a shopping experience that blends quality, creativity, and accessibility, bringing you the
                    best from top brands and emerging designers alike.</p>
            </div>
            <div class="home-reviews">
                <h3>What Our Customers Say</h3>
                <div class="home-reviews-container">
                    <div class="home-review-card">
                        <p>"Dots has transformed my wardrobe! The selection is amazing, and the quality is top-notch."
                        </p>
                        <span>- Sarah K.</span>
                    </div>
                    <div class="home-review-card">
                        <p>"I love how easy it is to find something special here. Fast shipping too!"</p>
                        <span>- James P.</span>
                    </div>
                    <div class="home-review-card">
                        <p>"Best online store I’ve shopped at. The styles are so unique!"</p>
                        <span>- Emily R.</span>
                    </div>
                </div>
            </div>
        </section>

        <x-footer></x-footer>
    </x-slot:body>
</x-layout>