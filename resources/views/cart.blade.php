<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Shopping Cart - Dots eShop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="amazon-header">
        <div class="header-logo">
            <a href="#home"><img src="dots-logo.png" alt="Dots Logo"></a>
        </div>
        <div class="header-search">
            <input type="text" placeholder="Search Dots eShop" class="search-input">
            <button class="search-btn">Search</button>
        </div>
        <div class="header-user">
            <a href="#profile" class="user-link">Hello, John</a>
            <a href="#cart" class="cart-link">
                <img src="cart-icon.png" alt="Cart" class="cart-icon">
                <span class="cart-count">3</span>
            </a>
        </div>
    </header>

    <main class="cart-main">
        <h1>Your Shopping Cart</h1>
        <section class="cart-items">
            <div class="cart-header">
                <span class="cart-item-image">Item</span>
                <span class="cart-item-name">Name</span>
                <span class="cart-item-price">Price</span>
                <span class="cart-item-quantity">Quantity</span>
                <span class="cart-item-subtotal">Subtotal</span>
                <span class="cart-item-remove">Remove</span>
            </div>
            <div class="cart-item">
                <img src="product1.jpg" alt="Product 1" class="cart-item-image">
                <span class="cart-item-name">Product 1</span>
                <span class="cart-item-price">$29.99</span>
                <div class="cart-item-quantity">
                    <button class="quantity-btn decrease">-</button>
                    <span class="quantity-value">2</span>
                    <button class="quantity-btn increase">+</button>
                </div>
                <span class="cart-item-subtotal">$59.98</span>
                <button class="remove-btn">Remove</button>
            </div>
            <div class="cart-item">
                <img src="product2.jpg" alt="Product 2" class="cart-item-image">
                <span class="cart-item-name">Product 2</span>
                <span class="cart-item-price">$39.99</span>
                <div class="cart-item-quantity">
                    <button class="quantity-btn decrease">-</button>
                    <span class="quantity-value">1</span>
                    <button class="quantity-btn increase">+</button>
                </div>
                <span class="cart-item-subtotal">$39.99</span>
                <button class="remove-btn">Remove</button>
            </div>
            <div class="cart-item">
                <img src="product3.jpg" alt="Product 3" class="cart-item-image">
                <span class="cart-item-name">Product 3</span>
                <span class="cart-item-price">$19.99</span>
                <div class="cart-item-quantity">
                    <button class="quantity-btn decrease">-</button>
                    <span class="quantity-value">3</span>
                    <button class="quantity-btn increase">+</button>
                </div>
                <span class="cart-item-subtotal">$59.97</span>
                <button class="remove-btn">Remove</button>
            </div>
        </section>
        <section class="cart-total">
            <div class="total-row">
                <span>Total:</span>
                <span class="total-price">$159.94</span>
            </div>
            <a href="#checkout" class="checkout-btn">Proceed to Checkout</a>
        </section>
    </main>
</body>

</html>