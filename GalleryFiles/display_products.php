<?php
session_start();

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}



// Get available colors from session
$availableColors = [];
$colorImages = [
    'black' => ['front' => $_SESSION['black_front_image'] ?? null, 'back' => $_SESSION['black_back_image'] ?? null],
    'gold' => ['front' => $_SESSION['gold_front_image'] ?? null, 'back' => $_SESSION['gold_back_image'] ?? null],
    'red' => ['front' => $_SESSION['red_front_image'] ?? null, 'back' => $_SESSION['red_back_image'] ?? null],
    'silver' => ['front' => $_SESSION['silver_front_image'] ?? null, 'back' => $_SESSION['silver_back_image'] ?? null],
    'blue' => ['front' => $_SESSION['blue_front_image'] ?? null, 'back' => $_SESSION['blue_back_image'] ?? null]
];

$colorNames = [
    'black' => 'Black',
    'gold' => 'Gold',
    'red' => 'Red',
    'silver' => 'Silver',
    'blue' => 'Blue'
];

foreach ($colorImages as $color => $images) {
    if ($images['front'] || $images['back']) {
        $availableColors[] = $color;
    }
}


// Set default selected color
$selectedColor = $availableColors[0] ?? 'black'; //when i click on the circle
if (isset($_GET['color'])) {
    $requestedColor = $_GET['color'];
    if (in_array($requestedColor, $availableColors)) {
        $selectedColor = $requestedColor;
    }
}

// Set default view (front/back)
$currentView = 'front'; //when i click on the arrow change this to back or front
if (isset($_GET['view'])) {
    $requestedView = $_GET['view'];
    if (in_array($requestedView, ['front', 'back']) && isset($colorImages[$selectedColor][$requestedView])) {
        $currentView = $requestedView;
    }
}

// Determine available views for current color
$availableViews = [];
if ($colorImages[$selectedColor]['front']) $availableViews[] = 'front';
if ($colorImages[$selectedColor]['back']) $availableViews[] = 'back';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($_SESSION['product_name'] ?? 'Product Details'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            --accent-color: #b5985a;
            --light-bg: #f8f9fa;
            --dark-color: #24262b;
            --gray-color: #95a5a6;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
        }

        .line {
            max-width: 1400px;
            border-bottom: 2px solid #b5985a;
            border-radius: 20px;
            height: 5px;
            box-shadow: 0 2px 5px #b5985a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        #favoriteHeart {
            transition: all 0.3s ease;
            margin: 10px;
        }

        #favoriteHeart:hover {
            transform: scale(1.2);
        }

        body {
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .go-back {
            display: inline-flex;
            align-items: center;
            color: #b5985a;
            text-decoration: none;
            margin-bottom: 20px;
            transition: all 0.3s ease-in-out;
            font-weight: 500;

            font-family: big;
        }

        .go-back i {
            margin-right: 8px;
            transition: all 0.3s ease-in-out;
        }

        .go-back:hover {
            color: var(--secondary-color);
            transform: translateX(-3px);
        }

        .go-back:hover i {
            transform: translateX(-3px);
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 40px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-section {
            flex: 1 1 60%;
            padding: 40px;
            background: #f8f9fa;
            position: relative;
        }

        .main-image-container {
            position: relative;
            width: 100%;
            height: 500px;
            margin-bottom: 25px;
            border-radius: 10px;
            overflow: hidden;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .main-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: opacity 0.5s ease;
        }

        .nav-arrow {
            text-decoration: none;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #7c7d7e00;
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.459);
            margin: auto 5px;
            border-radius: 50%;
        }

        .nav-arrow:hover {
            background-color: #b5985a;
            transform: translateY(-50%) scale(1.1);
        }

        .arrow-left {
            left: 25px;
        }

        .arrow-right {
            right: 25px;
        }

        .thumbnail-container {
            display: flex;
            gap: 15px;
            padding-bottom: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            background: white;
            padding: 5px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
        }

        .thumbnail:hover,
        .thumbnail.active {
            border-color: var(--accent-color);
            transform: scale(1.08);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.2);
        }

        .color-selector {
            display: flex;
            gap: 18px;
            margin-bottom: 25px;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
        }

        .color-circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            position: relative;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .color-circle:hover {
            transform: scale(1.15);
        }

        .color-circle.active {
            border-color: #b5985a;
            transform: scale(1.15);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .color-circle.active::after {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px solid var(--accent-color);
            border-radius: 50%;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                opacity: 0.7;
            }

            70% {
                transform: scale(1.1);
                opacity: 0.3;
            }

            100% {
                transform: scale(0.95);
                opacity: 0.7;
            }
        }

        .color-black {
            background-color: #000;
        }

        .color-gold {
            background-color: #FFD700;
        }

        .color-red {
            background-color: #FF0000;
        }

        .color-silver {
            background-color: #C0C0C0;
        }

        .color-blue {
            background-color: #0000FF;
        }

        .color-swatch.purple {
            background-color: #a200ffff;
        }


        .details-section {
            flex: 1 1 40%;
            padding: 40px;
            position: relative;
            background: white;
        }

        .product-title {
            font-size: 32px;
            margin-bottom: 15px;
            color: var(--dark-color);
            font-weight: 500;
            line-height: 1.2;
            font-family: medium;
        }

        .product-price {
            font-size: 28px;
            font-weight: 700;
            color: var(--accent-color);
            margin-bottom: 25px;
            display: flex;
            font-family: small;
            align-items: center;
        }

        .product-price .original-price {
            font-size: 20px;
            color: var(--gray-color);
            text-decoration: line-through;
            margin-left: 10px;
        }

        .product-description {
            margin-bottom: 25px;
            color: #555;
            line-height: 1.7;
            font-size: 15px;
        }

        .benefits {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            font-family: small;
            border-left: 4px solid var(--secondary-color);
        }

        .benefit-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            padding: 8px 0;
        }

        .benefit-item:last-child {
            margin-bottom: 0;
        }

        .benefit-icon {
            width: 28px;
            height: 28px;
            margin-right: 12px;
            color: var(--secondary-color);
            background: rgba(52, 152, 219, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;

        }

        .benefit-text {
            font-size: 14px;
            font-weight: 500;
            color: #555;

        }

        .product-meta {
            margin-bottom: 30px;
        }

        .meta-item {
            display: flex;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px dashed #eee;
        }

        .meta-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .meta-label {
            font-family: big;
            font-weight: 600;
            width: 130px;
            color: var(--gray-color);
            font-size: 14px;
        }

        .meta-value {
            flex: 1;
            font-family: small;
            font-weight: 500;
            color: #444;
            font-size: 14px;
        }

        .flag-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 25px;
        }

        .flag {
            background-color: var(--secondary-color);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            font-family: small;
        }

        .flag i {
            margin-right: 5px;
            font-size: 10px;
        }

        .flag.discount {
            background-color: var(--accent-color);
        }

        .flag.new {
            background-color: var(--success-color);
        }

        .flag.bestseller {
            background-color: var(--warning-color);
        }

        .add-to-cart {
            font-family: medium;
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 18px 30px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(44, 62, 80, 0.2);
        }

        .add-to-cart:hover {
            background-color: #1a252f;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(44, 62, 80, 0.3);
        }

        .logo-container {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .logo {
            max-width: 180px;
            height: auto;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .logo:hover {
            opacity: 1;
        }

        .cart-modal {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            width: 380px;
            height: 100%;
            background: white;
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .cart-modal.active {
            transform: translateX(0);
            display: block;
        }

        .cart-header {
            padding: 25px;
            background: var(--primary-color);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .cart-title {
            font-family: small;
            font-size: 20px;
            font-weight: 600;
        }

        .close-cart {
            font-family: small;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .close-cart:hover {
            transform: rotate(90deg);
        }

        .cart-items {
            padding: 20px;
        }

        .cart-item {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
            transition: transform 0.3s ease;
        }

        .cart-item:hover {
            transform: translateX(5px);
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
            border: 1px solid #eee;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark-color);
        }

        .cart-item-price {
            color: var(--accent-color);
            font-weight: 700;
            font-size: 16px;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            margin-top: 8px;
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
            transition: all 0.2s ease;
        }

        .quantity-btn:hover {
            background: #e0e0e0;
        }

        .quantity-value {
            margin: 0 12px;
            font-weight: 600;
            min-width: 20px;
            text-align: center;
        }

        .remove-item {
            color: var(--gray-color);
            font-size: 13px;
            cursor: pointer;
            margin-top: 5px;
            display: inline-flex;
            align-items: center;
            transition: color 0.2s ease;
        }

        .remove-item:hover {
            color: var(--accent-color);
        }

        .remove-item i {
            margin-right: 5px;
            font-size: 12px;
        }

        .cart-total {
            padding: 25px;
            border-top: 1px solid #eee;
            font-weight: 700;
            font-size: 20px;
            background: #f9f9f9;
            position: sticky;
            bottom: 0;
        }

        .checkout-btn {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 18px;
            width: calc(100% - 50px);
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            margin: 15px 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }

        .checkout-btn:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.4);
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 999;
            backdrop-filter: blur(3px);
            transition: opacity 0.3s ease;
        }

        .overlay.active {
            display: block;
        }

        .empty-cart {
            text-align: center;
            padding: 40px 20px;
            color: var(--gray-color);
        }

        .empty-cart i {
            font-size: 50px;
            margin-bottom: 20px;
            color: #ddd;
        }

        .empty-cart p {
            font-size: 16px;
            margin-bottom: 20px;
        }


        .color-option {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            text-decoration: none;

        }

        .color-name {
            font-size: 12px;
            font-weight: 500;
            color: #24262b;
            font-family: small;
            text-transform: capitalize;
        }

        .continue-shopping {
            background: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .continue-shopping:hover {
            background: #2980b9;
        }

        @media (max-width: 992px) {

            .gallery-section,
            .details-section {
                flex: 1 1 50%;
            }
        }

        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
            }

            .gallery-section,
            .details-section {
                flex: 1 1 100%;
                padding: 25px;
            }

            .main-image-container {
                height: 400px;
            }

            .product-title {
                font-size: 28px;
            }

            .product-price {
                font-size: 24px;
            }

            .cart-modal {
                width: 100%;
                max-width: 380px;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 15px;
            }

            .gallery-section,
            .details-section {
                padding: 20px;
            }

            .main-image-container {
                height: 350px;
            }

            .thumbnail {
                width: 70px;
                height: 70px;
            }

            .color-circle {
                width: 30px;
                height: 30px;
            }

            .add-to-cart {
                padding: 16px;
                font-size: 16px;
            }
        }
    </style>

</head>

<body>

    <!--Navigation Bar-->
    <header>
        <?php
        include("../NavBar/navbar.php")
        ?>
    </header>

    <!--Cart-->
    <section>
        <?php
        include("../Files/cart_action.php")
        ?>
    </section>


    <div class="container">
        <a href="./MainGallery.php?category=<?= urlencode($_SESSION['category']) ?>" class="go-back">
            <i class="fas fa-arrow-left"></i> Back to Gallery
        </a>
        <div class="product-container">
            <div class="gallery-section">
                <div class="main-image-container">
                    <img id="mainImage" class="main-image"
                        src="<?php echo htmlspecialchars($colorImages[$selectedColor][$currentView] ?? ''); ?>"
                        alt="Main Product Image">

                    <?php if (count($availableViews) > 1): ?>
                        <!-- Left arrow - links to previous view -->
                        <a href="?color=<?php echo $selectedColor; ?>&view=<?php echo $currentView === 'front' ? 'back' : 'front'; ?>"
                            class="nav-arrow arrow-left">
                            <i class="fas fa-chevron-left"></i>
                        </a>

                        <!-- Right arrow - links to next view -->
                        <a href="?color=<?php echo $selectedColor; ?>&view=<?php echo $currentView === 'front' ? 'back' : 'front'; ?>"
                            class="nav-arrow arrow-right">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="color-selector">
                    <?php foreach ($availableColors as $color): ?>
                        <a href="?color=<?php echo $color; ?>&view=front" class="color-option">
                            <div class="color-circle color-<?php echo $color; ?> <?php echo $color === $selectedColor ? 'active' : ''; ?>"></div>
                            <div class="color-name"><?php echo $colorNames[$color]; ?></div>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="thumbnail-container">
                    <?php if ($colorImages[$selectedColor]['front']): ?>
                        <a href="?color=<?php echo $selectedColor; ?>&view=front">
                            <img class="thumbnail <?php echo $currentView === 'front' ? 'active' : ''; ?>"
                                src="<?php echo htmlspecialchars($colorImages[$selectedColor]['front']); ?>"
                                alt="<?php echo $selectedColor; ?> front">
                        </a>
                    <?php endif; ?>

                    <?php if ($colorImages[$selectedColor]['back']): ?>
                        <a href="?color=<?php echo $selectedColor; ?>&view=back">
                            <img class="thumbnail <?php echo $currentView === 'back' ? 'active' : ''; ?>"
                                src="<?php echo htmlspecialchars($colorImages[$selectedColor]['back']); ?>"
                                alt="<?php echo $selectedColor; ?> back">
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="details-section">
                <h1 class="product-title"><?php echo htmlspecialchars($_SESSION['product_name'] ?? 'Product Name'); ?></h1>
                <div class="product-price">
                    <?php echo htmlspecialchars($_SESSION['product_price'] ?? '0.00$'); ?>
                    <?php if (isset($_SESSION['original_price'])): ?>
                        <span class="original-price">$<?php echo htmlspecialchars($_SESSION['original_price']); ?></span>
                    <?php endif; ?>
                </div>
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <i id="favoriteHeart" class="far fa-heart" style="font-size: 24px; color: #ccc; cursor: pointer; margin-left: 15px;"></i>
                </div>
                <?php if (!empty($_SESSION['description'])): ?>
                    <div class="product-description">
                        <?php echo nl2br(htmlspecialchars($_SESSION['description'])); ?>
                    </div>
                <?php endif; ?>

                <div class="benefits">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-undo"></i>
                        </div>
                        <span class="benefit-text">30 days no-questions-asked free returns</span>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <span class="benefit-text">Free shipping on all orders</span>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <span class="benefit-text">Two-year guarantee on frame & lenses</span>
                    </div>
                </div>

                <div class="flag-container">
                    <?php
                    $flags = [
                        'isTopRated' => ['label' => 'Top Rated', 'class' => '', 'icon' => 'fa-star'],
                        'isMen' => ['label' => 'Men', 'class' => '', 'icon' => 'fa-male'],
                        'isWomen' => ['label' => 'Women', 'class' => '', 'icon' => 'fa-female'],
                        'isKids' => ['label' => 'Kids', 'class' => '', 'icon' => 'fa-child'],
                        'isDiscount' => ['label' => 'Discount', 'class' => 'discount', 'icon' => 'fa-tag'],
                        'isNew' => ['label' => 'New', 'class' => 'new', 'icon' => 'fa-certificate'],
                        'isBestseller' => ['label' => 'Bestseller', 'class' => 'bestseller', 'icon' => 'fa-trophy']
                    ];

                    foreach ($flags as $flag => $data) {
                        if (isset($_SESSION[$flag]) && $_SESSION[$flag] === true) {
                            echo '<span class="flag ' . $data['class'] . '"><i class="fas ' . $data['icon'] . '"></i> ' . $data['label'] . '</span>';
                        }
                    }
                    ?>
                </div>

                <div class="product-meta">
                    <div class="meta-item">
                        <span class="meta-label">Type : </span>
                        <span class="meta-value"><?php echo htmlspecialchars($_SESSION['product_type'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Category :</span>
                        <span class="meta-value"><?php echo htmlspecialchars($_SESSION['product_category'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Frame Type :</span>
                        <span class="meta-value"><?php echo htmlspecialchars($_SESSION['product_frameType'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Material :</span>
                        <span class="meta-value"><?php echo htmlspecialchars($_SESSION['product_material'] ?? 'N/A'); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Colors :</span>
                        <span class="meta-value"><?php echo htmlspecialchars(implode(' | ', array_map('ucfirst', $availableColors))); ?></span>
                    </div>
                </div>


                <!--add to cart logic-->
                <button class="add-to-cart" onclick="addToCart({
                    id: <?php echo htmlspecialchars($_SESSION['product_id'] ?? '0'); ?>,
                    name: '<?php echo htmlspecialchars($_SESSION['product_name'] ?? 'Unknown'); ?>',
                    price: <?php echo intval(str_replace('$', '', htmlspecialchars($_SESSION['product_price'] ?? '0.00$'))) ?>,
                    image: '<?php echo htmlspecialchars($colorImages[$selectedColor]['front'] ?? ''); ?>'
                })">Add to Cart
                </button>


            </div>
        </div>
        <div class="line">
        </div>
    </div>


    <!--continers Section-->
    <section>
        <?php
        include("../HomePage/continers.html")
        ?>
    </section>

    <!--Buy by FaceShape-->
    <section>
        <?php
        include("../HomePage/ShapesShop.html")
        ?>
    </section>

    <!--bigconiners Section-->
    <section>
        <?php
        include("../HomePage/bigconiners.html")
        ?>
    </section>

    <!--Best Sellers Section-->
    <section>
        <?php
        include("../HomePage/BestGalleries.html")
        ?>
    </section>

    <!--Texte Section-->
    <section>
        <?php
        include("../HomePage/TexteSection.html")
        ?>
    </section>

    <!--Footer section-->
    <footer>
        <?php
        include("../Footer/footer_css.html");
        ?>
    </footer>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const favoriteHeart = document.getElementById('favoriteHeart');
        const productId = <?php echo htmlspecialchars($_SESSION['product_id'] ?? '0'); ?>;

        // Check if product is already favorited
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        const isFavorited = favorites.some(fav => fav.id == productId);

        // Set initial state
        if (isFavorited) {
            favoriteHeart.classList.remove('far');
            favoriteHeart.classList.add('fas');
            favoriteHeart.style.color = 'red';
        }

        // Toggle favorite on click
        favoriteHeart.addEventListener('click', function() {
            // Get product data from PHP session
            const product = {
                id: <?php echo htmlspecialchars($_SESSION['product_id'] ?? '0'); ?>,
                name: '<?php echo htmlspecialchars($_SESSION['product_name'] ?? 'Unknown'); ?>',
                price: '<?php echo htmlspecialchars($_SESSION['product_price'] ?? '0.00$'); ?>',
                image: '<?php echo htmlspecialchars($colorImages[$selectedColor]['front'] ?? ''); ?>',
                color: '<?php echo $selectedColor; ?>'
            };

            // Check current state
            const isCurrentlyFavorited = this.classList.contains('fas');

            if (isCurrentlyFavorited) {
                // Remove from favorites
                favorites = favorites.filter(fav => fav.id != product.id);
                this.classList.remove('fas');
                this.classList.add('far');
                this.style.color = '#ccc';
                showFavoriteMessage('Removed from favorites');
            } else {
                // Add to favorites
                favorites.push(product);
                this.classList.remove('far');
                this.classList.add('fas');
                this.style.color = 'red';
                showFavoriteMessage('Added to favorites!');
            }

            // Save back to localStorage
            localStorage.setItem('favorites', JSON.stringify(favorites));
        });

        function showFavoriteMessage(message) {
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.backgroundColor = '#2c3e50';
            notification.style.color = 'white';
            notification.style.padding = '12px 24px';
            notification.style.borderRadius = '5px';
            notification.style.zIndex = '1000';
            notification.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            notification.style.animation = 'fadeIn 0.3s, fadeOut 0.3s 2s forwards';
            notification.textContent = message;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 2500);
        }
    });
</script>

</html>