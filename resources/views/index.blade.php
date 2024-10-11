<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
    </style>
    <title>Beads by Kika</title>
</head>

<body>
    <!-- Splash Screen -->
    <div id="splash-screen">
        <img src="{{ asset('assets/BEADSBYKIKA-LOGO.png') }}" alt="Beads by Kika Logo" class="splash-logo">
    </div>

    <!-- Home Page -->
    <div id="home-page" style="display: none;">
        <!-- Header -->
        <header class="header">
            <div class="header-container">
                <!-- Left Section: Cart Icon -->
                <a href="#" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <!-- Logo in the Center -->
                <img src="{{ asset('assets/BEADSBYKIKA-LOGO.png') }}" alt="Beads by Kika Logo" class="logo">

                <!-- Right Section: Search Icon & Menu Icon for Mobile -->
                <div class="header-right">
                    <input type="text" placeholder="Am Looking For..." class="search-bar">
                    <div class="menu-icon" onclick="toggleMobileMenu()">&#9776;</div>
                </div>
            </div>

            <!-- Navigation Menu (Desktop) -->
            <nav class="nav-menu">
                <ul>
                    <li><a href="#">Waist Trainers</a>
                        <ul class="dropdown">
                            <li><a href="#" style="font-size: small; font-weight: 500;">Latex Waist Trainers</a>
                            </li>
                            <li><a href="#" style="font-size: small; font-weight: 500;">Steel-Boned Waist
                                    Trainers</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shapewear</a>
                        <ul class="dropdown">
                            <li><a href="#" style="font-size: small; font-weight: 500;">Bodysuits</a></li>
                            <li><a href="#" style="font-size: small; font-weight: 500;">Thigh Slimmers</a></li>
                        </ul>
                    </li>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="#">Best Sellers</a></li>
                </ul>
            </nav>

            <!-- Mobile Navigation Menu (Dropdown) -->
            <nav id="mobile-menu" class="mobile-menu">
                <ul>
                    <li><a href="#">Waist Trainers</a></li>
                    <li><a href="#">Shapewear</a></li>
                    <li><a href="#">New Arrivals</a></li>
                    <li><a href="#">Best Sellers</a></li>
                    <input type="text" placeholder="Am Looking For..." class="search-bar">
                </ul>
            </nav>
        </header>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <img src="{{ asset('assets/kika1.png') }}" alt="Hero Image" class="hero-image">
        <div class="hero-content">
            <button class="shop-now">Shop Now</button>
        </div>
    </section>

    <!-- Product Categories -->
    <section class="categories">
        <h2>Shop Categories</h2>
        <div class="category-container">
            <div class="category-item">Necklaces</div>
            <div class="category-item">Bracelets</div>
        </div>
    </section>

    <!-- Modal Structure -->
    <div id="colorModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img id="productImage" alt="Product Image" />
            <div id="colorOptions"></div>
            <button onclick="buyNow()">Buy Now</button>
            <button onclick="addToCart()">to Cart</button>
        </div>
    </div>

    <!-- Image Modal Structure -->
    <div id="imageModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeImageModal()">&times;</span>
            <img id="largeProductImage" alt="Large Product Image" />
        </div>
    </div>


    <!-- Product Recommendations -->
    <section class="Rproduct">
        <h2>Personalized Shop</h2>
        <div class="Rproduct-container">
            <div class="Rproduct-item" onclick="openModal('product1', '{{ asset('assets/kika.png') }}')">
                <img src="{{ asset('assets/kika.png') }}" alt="Product 1" />
                <h3>Product 1</h3>
                <p>Price: $29.99</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>
            <div class="Rproduct-item" onclick="openModal('product2', '{{ asset('assets/kika.png') }}')">
                <img src="{{ asset('assets/kika.png') }}" alt="Product 2" />
                <h3>Product 2</h3>
                <p>Price: $39.99</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonial">
            <p>"Beautiful products, absolutely love them!"</p>
            <p>- Happy Customer</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>Customer Support | Social Media | Newsletter Signup | Contact Us | About Us</p>
    </footer>
</body>
<script>
    // JavaScript for Voice Search

    const recognition = new webkitSpeechRecognition();
    recognition.onresult = function(event) {
        const query = event.results[0][0].transcript;
        // Send 'query' to your backend to search products
    };

    document.getElementById('voiceSearchBtn').onclick = function() {
        recognition.start();
    };
</script>

</html>
