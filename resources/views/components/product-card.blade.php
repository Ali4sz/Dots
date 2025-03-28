@props(['src'=>'', 'alt'=>'null'])
<div class="home-product-card" {{ $attributes }}>
    <img src="{{ $src }}" alt="{{ $alt }}" >
    <h3>{{ $prodname }}</h3>
    <p>{{ $brandprice }}</p>
    <a href="#buy" class="home-product-btn">Add to Cart</a>
</div>