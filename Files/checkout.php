<?php
session_start();

// Check if user is logged in
if (empty($_SESSION['username'])) {
    $_SESSION['login_message'] = 'You need to login first to view the checkout page.';
    header('Location: login.php');
    exit();
}

// Check if cart exists and is not empty
if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

$cart = $_SESSION['cart'];
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | <?php echo htmlspecialchars($_SESSION['username'] ?? 'Guest'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!--Fonts -->
    <style>
        @font-face {
            font-family: title_texte;
            src: url(/Project_do_stage/Assets/Fonts/Anja\ Eliane\ accent002.ttf)
        }

        @font-face {
            font-family: big;
            src: url(/Project_do_stage/Assets/Fonts/Heavitas.ttf)
        }

        @font-face {
            font-family: medium;
            src: url(/Project_do_stage/Assets/Fonts/Coolvetica\ Rg.otf)
        }

        @font-face {
            font-family: small;
            src: url(/Project_do_stage/Assets/Fonts/ComicNeueSansID.ttf)
        }
    </style>

    <style>
        :root {
            --primary-color: #b5985a;
            --secondary-color: #24262b;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
            --dark-color: #24262b;
            --gray-color: #95a5a6;
            --success-color: #2ecc71;
            --border-radius: 10px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        body {
            background-color: #f5f5f5;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .checkout-header {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }

        .checkout-header h1 {
            font-family: big;
            font-size: 2.5rem;
            color: var(--secondary-color);
            margin-bottom: 15px;
            font-weight: 700;
        }

        .checkout-header p {
            font-family: medium;
            font-size: 1.8rem;
            color: var(--secondary-color);
            margin-bottom: 15px;

        }

        .checkout-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), #ffd884ff);
            border-radius: 2px;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
        }

        .checkout-items {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--box-shadow);
            animation: fadeIn 0.6s ease-out;
        }

        .checkout-summary {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 20px;
            height: fit-content;
        }

        .checkout-item {
            display: flex;
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #eee;
            transition: var(--transition);
        }

        .checkout-item:hover {
            transform: translateX(5px);
        }

        .checkout-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .item-image {
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 8px;
            margin-right: 20px;
            border: 1px solid #eee;
            padding: 10px;
            background: white;
        }

        .item-info {
            flex-grow: 1;
        }

        .item-info h3 {
            font-family: small;
            font-size: 1.1rem;
            margin-bottom: 8px;
            color: var(--secondary-color);
        }

        .item-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 10px;
        }

        .item-meta p {
            font-family: small;
            font-size: 0.9rem;
            color: var(--gray-color);
        }

        .item-price {
            font-family: small;
            font-weight: 600;
            color: var(--primary-color);
        }

        .item-quantity {
            display: flex;
            align-items: center;
        }

        .quantity-btn {
            background: #f5f5f5;
            border: none;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: var(--transition);
            font-family: small;
        }

        .quantity-btn:hover {
            background: #e0e0e0;
        }

        .quantity-value {
            margin: 0 12px;
            font-weight: 600;
            min-width: 20px;
            text-align: center;
            font-family: small;
        }

        .remove-item {
            color: var(--gray-color);
            font-size: 13px;
            cursor: pointer;
            margin-top: 5px;
            display: inline-flex;
            align-items: center;
            transition: var(--transition);
            text-decoration: none;
            font-family: big;
        }

        .remove-item:hover {
            color: var(--accent-color);
            transform: scale(1.1);
            text-decoration: underline;
        }

        .remove-item i {
            margin-right: 5px;
            font-size: 12px;
            font-family: small;
        }

        .summary-title {
            font-family: big;
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--secondary-color);
            font-weight: 600;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .summary-details {
            margin-bottom: 25px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-family: small;
        }

        .summary-label {
            color: var(--gray-color);
        }

        .summary-value {
            font-family: small;
            font-weight: 500;
        }

        .summary-total {
            font-family: small;
            font-weight: 700;
            font-size: 1.2rem;
            border-top: 1px solid #eee;
            padding-top: 15px;
            margin-top: 15px;
        }

        .checkout-btn {
            font-family: medium;
            background: linear-gradient(135deg, var(--primary-color), #d4b05f);
            color: white;
            border: none;
            padding: 16px;
            width: 100%;
            font-size: 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(181, 152, 90, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .checkout-btn:hover {
            background: linear-gradient(135deg, #9c7e3f, var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(181, 152, 90, 0.4);
        }

        .contact-link {
            font-family: small;
            display: inline-block;
            margin-top: 30px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .contact-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: var(--transition);
        }

        .contact-link:hover::after {
            width: 100%;
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: var(--gray-color);
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }



        .continue-shopping {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
        }

        .continue-shopping:hover {
            background: #1a1a1a;
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        @media (max-width: 992px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .checkout-summary {
                position: static;
                margin-top: 30px;
            }
        }

        @media (max-width: 576px) {
            .checkout-item {
                flex-direction: column;
            }

            .item-image {
                width: 100%;
                height: auto;
                max-height: 200px;
                margin-right: 0;
                margin-bottom: 15px;
            }

            .checkout-header h1 {
                font-size: 2rem;
            }
        }
    </style>

</head>


<body>
    <div class="container">
        <div class="checkout-header">
            <h1>Checkout</h1>
            <p>Review your order before payment</p>
        </div>

        <div class="checkout-grid">
            <div class="checkout-items">
                <?php foreach ($cart as $item):
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>
                    <div class="checkout-item">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="item-image">
                        <div class="item-info">
                            <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                            <div class="item-meta">
                                <p class="item-price">€<?php echo number_format($item['price'], 2); ?></p>
                                <div class="item-quantity">
                                    <span class="quantity-value"><?php echo $item['quantity']; ?> Quantities</span>
                                </div>
                                <p>Subtotal: <span class="item-price">€<?php echo number_format($subtotal, 2); ?></span></p>
                            </div>
                            <a class="remove-item" href="../index.php">
                                <i class="fas fa-times"></i> Remove
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="checkout-summary">
                <h3 class="summary-title">Order Summary</h3>
                <div class="summary-details">
                    <div class="summary-row">
                        <span class="summary-label">Subtotal:</span>
                        <span class="summary-value">€<?php echo number_format($total, 2); ?></span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Shipping:</span>
                        <span class="summary-value">Free</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Tax:</span>
                        <span class="summary-value">€<?php echo number_format($total * 0.21, 2); ?></span>
                    </div>
                </div>
                <div class="summary-row summary-total">
                    <span>Total:</span>
                    <span>€<?php echo number_format($total * 1.21, 2); ?></span>
                </div>

                <button class="checkout-btn">
                    <i class="fas fa-lock"></i> Secure Checkout
                </button>

                <a href="./contact.php" class="contact-link">
                    <i class="fas fa-question-circle"></i> Need help? Contact us
                </a>
            </div>
        </div>
    </div>


</body>

</html>