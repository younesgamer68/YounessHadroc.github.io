<!-- Cart HTML Structure (place this at the bottom of your body) -->
<div class="cart-container" id="cartContainer">
    <div class="cart-header">
        <h2 class="cart-title">Your Cart</h2>
        <button class="close-cart" id="closeCart">&times;</button>
    </div>
    <div class="cart-items" id="cartItems">
        <div class="empty-cart">Your cart is empty</div>
    </div>
    <div class="cart-footer">
        <div class="cart-total">
            <span>Total:</span>
            <span id="cartTotal">€0.00</span>
        </div>
        <button class="checkout-btn" id="checkoutBtn">Checkout</button>
    </div>
</div>

<style>
    .cart-icon {
        position: relative;
        cursor: pointer;
        font-size: 1.2rem;
        transition: all 0.3s ease-in-out;
    }

    .cart-icon:hover {
        transform: translateY(-2px);
        color: #C9A34E;
    }

    .cart-count {
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: #24262b;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.8rem;
    }

    .cart-count:hover {
        background-color: #C9A34E;
    }

    .cart-container {
        position: fixed;
        top: 0;
        right: -350px;
        width: 350px;
        height: 100vh;
        background-color: white;
        box-shadow: -5px 0 15px rgba(0, 0, 0, 0.15);
        /* Stronger left-side shadow */
        transition: right 0.3s ease;
        display: flex;
        flex-direction: column;
        z-index: 1000;
        background-color: #f5f5f5;
        /* Fixed typo (removed "5") */
    }

    .cart-container.open {
        right: 0;
    }

    .cart-header {
        margin-top: 20px;
        padding: 1rem;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #24262b;
    }

    .cart-title {
        font-size: 1.2rem;
        font-weight: bold;
        font-family: big;
        margin: 0 auto;
        color: #b5985a;
    }

    .close-cart {
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: white;
        transition: all 0.3s ease-in-out;
    }

    .close-cart:hover {
        transform: scale(1.4);
    }

    .cart-items {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
    }

    .cart-item {
        display: flex;
        margin-bottom: 1rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }

    .cart-item img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        margin-right: 1rem;
    }

    .item-details {
        flex: 1;
    }

    .item-title {
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        font-family: medium;
    }

    .item-title::first-letter {
        text-transform: uppercase;
    }

    .item-price {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 0.5rem;
        font-family: small;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
    }

    .quantity-btn {
        width: 25px;
        height: 25px;
        background-color: #f0f0f0;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }

    .quantity-input {
        width: 40px;
        height: 25px;
        text-align: center;
        margin: 0 5px;
        border: 1px solid #ddd;
    }

    .remove-item {
        margin-left: 10px;
        color: #ff6b6b;
        cursor: pointer;
    }

    .cart-footer {
        padding: 1rem;
        border-top: 1px solid #eee;
    }

    .cart-total {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        font-weight: bold;
        font-size: 1.1rem;
        font-family: small;
    }

    .checkout-btn {
        width: 100%;
        padding: 0.75rem;
        background-color: #b5985a;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
        font-family: big;
        transition: background-color 0.3s ease;
    }

    .checkout-btn:hover {
        background-color: #24262b;
        color : #b5985a;
    }

    .empty-cart {
        text-align: center;
        padding: 2rem;
        color: #666;
    }

    body.cart-open {
        padding-right: 350px;
    }
</style>

<!-- Cart JavaScript (include before closing body tag) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cart elements
        const cartIcon = document.getElementById('cartIcon');
        const cartContainer = document.getElementById('cartContainer');
        const closeCart = document.getElementById('closeCart');
        const cartItems = document.getElementById('cartItems');
        const cartCount = document.getElementById('cartCount');
        const cartTotal = document.getElementById('cartTotal');
        const checkoutBtn = document.getElementById('checkoutBtn');
        const body = document.body;

        // Initialize cart from localStorage or empty array
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Update cart UI
        function updateCart() {
            // Update cart count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;

            // Update cart items
            if (cart.length === 0) {
                cartItems.innerHTML = '<div class="empty-cart">Your cart is empty</div>';
            } else {
                cartItems.innerHTML = '';
                cart.forEach((item, index) => {
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item';
                    cartItem.innerHTML = `
                        <img src="${item.image}" alt="${item.name}">
                        <div class="item-details">
                            <h4 class="item-title">${item.name}</h4>
                            <p class="item-price">€${item.price.toFixed(2)}</p>
                            <div class="quantity-controls">
                                <button class="quantity-btn minus" data-index="${index}">-</button>
                                <input type="text" class="quantity-input" value="${item.quantity}" readonly>
                                <button class="quantity-btn plus" data-index="${index}">+</button>
                                <span class="remove-item" data-index="${index}"><i class="fas fa-trash"></i></span>
                            </div>
                        </div>
                    `;
                    cartItems.appendChild(cartItem);
                });
            }

            // Update total price
            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            cartTotal.textContent = `€${totalPrice.toFixed(2)}`;

            // Save cart to localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Toggle body class based on cart state
            if (cartContainer.classList.contains('open')) {
                body.classList.add('cart-open');
            } else {
                body.classList.remove('cart-open');
            }
        }

        // Toggle cart visibility
        cartIcon.addEventListener('click', () => {
            cartContainer.classList.add('open');
            body.classList.add('cart-open');
            updateCart();
        });

        closeCart.addEventListener('click', () => {
            cartContainer.classList.remove('open');
            body.classList.remove('cart-open');
        });

        // Event delegation for dynamic elements (quantity controls and remove buttons)
        cartItems.addEventListener('click', (e) => {
            // Handle minus button
            if (e.target.classList.contains('minus')) {
                const index = e.target.getAttribute('data-index');
                if (cart[index].quantity > 1) {
                    cart[index].quantity -= 1;
                    updateCart();
                }
            }

            // Handle plus button
            if (e.target.classList.contains('plus')) {
                const index = e.target.getAttribute('data-index');
                cart[index].quantity += 1;
                updateCart();
            }

            // Handle remove item
            if (e.target.classList.contains('remove-item') || e.target.closest('.remove-item')) {
                const index = e.target.getAttribute('data-index') ||
                    e.target.closest('.remove-item').getAttribute('data-index');
                cart.splice(index, 1);
                updateCart();
            }
        });

        // Checkout button


        checkoutBtn.addEventListener('click', () => {
            if (cart.length === 0) {
                return;
            }

            // Create a form dynamically
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '../Files/store_cart.php'; // This will be a new PHP file to store the cart

            // Add cart data as hidden input
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'cart_data';
            input.value = JSON.stringify(cart);
            form.appendChild(input);

            // Add CSRF token if you're using one
            // const csrfInput = document.createElement('input');
            // csrfInput.type = 'hidden';
            // csrfInput.name = 'csrf_token';
            // csrfInput.value = 'YOUR_CSRF_TOKEN';
            // form.appendChild(csrfInput);
            cart = [];
            updateCart();
            cartContainer.classList.remove('open');
            body.classList.remove('cart-open');
            document.body.appendChild(form);
            form.submit();
        });


        // Initialize cart on page load
        updateCart();

        // Make addToCart function available globally
        window.addToCart = function(product) {
            const existingItem = cart.find(item => item.id === product.id);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    image: product.image,
                    quantity: 1
                });
            }

            updateCart();
            cartContainer.classList.add('open');
            body.classList.add('cart-open');
        };
    });
</script>