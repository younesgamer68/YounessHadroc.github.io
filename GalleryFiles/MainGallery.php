<?php
session_start();
?>
<?php
// Check if we're receiving product data from a form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store all basic product information in session
    $_SESSION['product_id'] = $_POST['product_id'];
    $_SESSION['product_name'] = $_POST['product_name'];
    $_SESSION['product_price'] = $_POST['product_price'];
    $_SESSION['product_type'] = $_POST['product_type'];
    $_SESSION['product_category'] = $_POST['product_category'];
    $_SESSION['product_frameType'] = $_POST['product_frameType'];
    $_SESSION['product_material'] = $_POST['product_material'];

    // Store colors as a comma-separated string
    $_SESSION['product_colors'] = $_POST['product_colors'];

    // Store image paths for each color
    $_SESSION['black_front_image'] = $_POST['black_front_image'];
    $_SESSION['black_back_image'] = $_POST['black_back_image'];
    $_SESSION['gold_front_image'] = $_POST['gold_front_image'];
    $_SESSION['gold_back_image'] = $_POST['gold_back_image'];
    $_SESSION['red_front_image'] = $_POST['red_front_image'];
    $_SESSION['red_back_image'] = $_POST['red_back_image'];
    $_SESSION['silver_front_image'] = $_POST['silver_front_image'];
    $_SESSION['silver_back_image'] = $_POST['silver_back_image'];
    $_SESSION['blue_front_image'] = $_POST['blue_front_image'];
    $_SESSION['blue_back_image'] = $_POST['blue_back_image'];

    // Store flags only if they are set (true)
    if (isset($_POST['isTopRated'])) $_SESSION['isTopRated'] = true;
    if (isset($_POST['isMen'])) $_SESSION['isMen'] = true;
    if (isset($_POST['isWomen'])) $_SESSION['isWomen'] = true;
    if (isset($_POST['isKids'])) $_SESSION['isKids'] = true;
    if (isset($_POST['isDiscount'])) $_SESSION['isDiscount'] = true;
    if (isset($_POST['isNew'])) $_SESSION['isNew'] = true;
    if (isset($_POST['isBestseller'])) $_SESSION['isBestseller'] = true;
    if (isset($_POST['isSports'])) $_SESSION['isSports'] = true;
    if (isset($_POST['isAcces'])) $_SESSION['isAcces'] = true;

    // Redirect to another page to view the session data
    header("Location: ./doproduct.php?category=" . $category);
    exit(); // Always call exit() after header redirect

}

?>
<?php

$allowedCategories =
    [

        // EyeGlasses Categories
        'Eye_All',
        'Eye_Men',
        'Eye_Women',
        'Eye_Kids',
        'Eye_Materials',
        'Eye_Frames',



        // SunGlasses Categories
        'Sun_All',
        'Sun_Men',
        'Sun_Women',
        'Sun_Kids',
        'Sun_Materials',
        'Sun_Frames',


        // SunGlasses & EyeGlasses Categories
        'Bestsellers',
        'Under20',
        'Discount',
        'Summer_Sale',
        'Newer',



        // Sports Categories
        'Sports_all',
        'Sports_running',
        'Sports_cycling',
        'Sports_swimming',
        'Sports_winter',

        'Sports_Shapes',
        'Sports_Frames',
        'Sports_Top',
        'Sports_Discount',


        // Accesories Categories
        'Acces_all',
        'Acces_felt',
        'Acces_cords',
        'Acces_case/cleankits',
        'Acces_clips',




    ];
if (empty($_GET['category']) || !in_array($_GET['category'], $allowedCategories)) {
    header("Location: ../Files/ErrorPage.html");
    exit;
} else {
    $category = $_GET['category'];
    // Store the category in the session for later use
    $_SESSION['category'] = $category;
}

?>

<?php
// Define category data with titles, descriptions, and icons
$categoryData = [
    //Eye glasses
    'Eye_All' => [
        'title' => 'All Eyeglasses',
        'description' => 'Discover our complete eyewear collection featuring hundreds of stylish frames for every face shape and personal style. Our EyeGlasses Collection includes prescription-ready frames in various materials like acetate, metal, and titanium, available in all sizes from petite to extra-wide fits. Whether you need everyday glasses, computer glasses, or special occasion frames, you\'ll find perfect options with anti-reflective coatings, blue light filtering, and other lens technologies.',
        'icon' => '👓'
    ],
    'Eye_Men' => [
        'title' => 'Men\'s Eyeglasses',
        'description' => 'Premium eyeglass frames designed specifically for men featuring masculine styles and durable construction. Our collection includes professional rectangular frames, modern geometric designs, and classic wayfarer shapes in materials like acetate, titanium and stainless steel. Many models feature spring hinges for flexibility, adjustable nose pads for perfect fit, and lightweight materials for all-day comfort in business or casual settings.',
        'icon' => '👔'
    ],
    'Eye_Women' => [
        'title' => 'Women\'s Eyeglasses',
        'description' => 'Feminine eyeglass frames designed to complement women\'s facial features with elegant styling. Our collection includes cat-eye frames, round vintage-inspired designs, and contemporary geometric shapes with delicate metal accents and decorative temple details. Available in various colors, patterns and sizes to match different face shapes and personal styles while providing clear vision and comfortable wear.',
        'icon' => '👚'
    ],
    'Eye_Kids' => [
        'title' => 'Kids Eyeglasses',
        'description' => 'Durable and fun eyeglass frames designed specifically for children with safety and comfort in mind. Featuring flexible, bendable materials, shatter-resistant lenses, and spring hinges that withstand rough handling. Bright colors, fun patterns and character themes make wearing glasses exciting for kids while proper sizing ensures comfortable fit for growing faces.',
        'icon' => '🧒'
    ],
    'Eye_Materials' => [
        'title' => 'Eyeglass Materials',
        'description' => 'Explore the different materials used in our premium eyeglass frames including lightweight titanium, flexible TR90, classic acetate and durable stainless steel. Each material offers unique benefits - titanium is hypoallergenic, acetate provides vibrant colors, TR90 is ultra-lightweight and flexible, while stainless steel offers strength and thin profiles. Learn which material best suits your lifestyle and comfort needs.',
        'icon' => '🛠️'
    ],
    'Eye_Frames' => [
        'title' => 'Eyeglass Frames',
        'description' => 'Browse our diverse selection of eyeglass frame styles including full-rim, semi-rimless and rimless designs. Full-rim frames offer maximum durability and style options, semi-rimless provide a lighter look, while rimless glasses create a barely-there appearance. Available in all shapes from classic rectangles to trendy hexagons and round frames, in sizes ranging from narrow to extra-wide fits.',
        'icon' => '🖼️'
    ],

    //Sunglasses
    'Sun_All' => [
        'title' => 'All Sunglasses',
        'description' => 'Discover our premium sunglasses collection offering 100% UV protection in stylish designs for every occasion. From polarized lenses for outdoor activities to fashion-forward oversized frames, our selection includes mirrored lenses, gradient tints and photochromic options. All sunglasses feature impact-resistant lenses with scratch-resistant coatings and comfortable frames for extended wear in bright conditions.',
        'icon' => '🕶️'
    ],
    'Sun_Men' => [
        'title' => 'Men\'s Sunglasses',
        'description' => 'Masculine sunglasses combining style with advanced lens technology for optimal eye protection. Features include polarized lenses to reduce glare, wraparound designs for peripheral coverage, and lightweight frames with rubberized nose pads. Popular styles include classic aviators, wayfarers and modern sport sunglasses with interchangeable lenses for different light conditions.',
        'icon' => '👔'
    ],
    'Sun_Women' => [
        'title' => 'Women\'s Sunglasses',
        'description' => 'Fashionable sunglasses designed to complement women\'s features while providing superior sun protection. Our collection includes oversized frames, cat-eye shapes and colorful acetate designs with UV400 protection. Many styles feature gradient lenses, metal accents and decorative temple details perfect for driving, beach days or everyday outfits.',
        'icon' => '👚'
    ],
    'Sun_Kids' => [
        'title' => 'Kids Sunglasses',
        'description' => 'Protective sunglasses designed specifically for children\'s sensitive eyes with 100% UV blocking lenses. These durable frames have flexible hinges, rubberized nose bridges and adjustable temples to stay secure during active play. Available in fun colors and patterns with impact-resistant polycarbonate lenses ideal for sports and outdoor activities.',
        'icon' => '🧒'
    ],
    'Sun_Materials' => [
        'title' => 'Sunglass Materials',
        'description' => 'Learn about the premium materials and technologies used in our sunglasses including lightweight Grilamid, flexible acetate and durable metal alloys. Lens options include polarized, mirrored, photochromic and blue-blocking technologies. Each combination provides specific benefits for driving, water sports, high-altitude activities or general fashion purposes.',
        'icon' => '🛠️'
    ],
    'Sun_Frames' => [
        'title' => 'Sunglass Frames',
        'description' => 'Explore our variety of sunglass frame styles designed for different face shapes and activities. Options include sporty wraparounds, classic aviators, rectangular frames for oval faces and round frames for angular features. Available in both full-frame and semi-rimless designs with proper sizing for comfortable all-day wear in sunny conditions.',
        'icon' => '🖼️'
    ],

    //Special collections
    'Bestsellers' => [
        'title' => 'Best Sellers',
        'description' => 'Our most popular eyewear styles consistently loved by customers for their perfect combination of quality, comfort and style. These bestsellers include timeless frame designs that flatter most face shapes, premium materials that withstand daily wear, and advanced lens technologies that customers rave about.',
        'icon' => '🏆'
    ],
    'Under20' => [
        'title' => 'Under $20',
        'description' => 'Quality eyewear at unbeatable prices - all under $20. These affordable options feature durable frames with standard single-vision lenses, perfect for backup glasses or budget-conscious shoppers. All meet our strict quality standards for optical clarity, frame durability and comfortable fit despite the low price point.',
        'icon' => '💲'
    ],
    'Discount' => [
        'title' => 'Discount Eyewear',
        'description' => 'Significant savings on high-quality eyewear from previous collections and overstock items. Our discount section offers the same great frames at reduced prices, many including premium features like anti-scratch coatings and UV protection - excellent value for customers seeking brand-name glasses affordably.',
        'icon' => '🤑'
    ],
    'Summer_Sale' => [
        'title' => 'Summer Sale',
        'description' => 'Our annual summer event featuring special prices on select sunglasses, eyeglasses and accessories. Limited-time offers include designer frames at reduced prices, exclusive online bundles and clearance items from seasonal collections - perfect time to stock up or try new styles.',
        'icon' => '☀️'
    ],
    'Newer' => [
        'title' => 'New Arrivals',
        'description' => 'Discover our latest arrivals - fresh styles that just hit the shelves! This season\'s newest eyewear collections feature cutting-edge designs, innovative materials, and trending colors. From contemporary minimalist frames to bold statement pieces, our newest additions combine fashion-forward aesthetics with premium optical technology. Be the first to explore these exclusive styles before they become bestsellers!',
        'icon' => '🆕'
    ],

    //Sports glasses
    'Sports_all' => [
        'title' => 'All Sports Eyewear',
        'description' => 'High-performance sports eyewear designed for athletes featuring impact-resistant polycarbonate lenses with anti-fog coatings. Our collection includes rubberized nose pads and temples for secure fit during movement, plus wraparound designs for maximum coverage during cycling, running and other activities.',
        'icon' => '🏅'
    ],
    'Sports_running' => [
        'title' => 'Running Eyewear',
        'description' => 'Specialized running glasses designed to stay securely in place during vigorous activity. Features include lightweight frames, ventilation to prevent fogging, and lenses that enhance contrast while protecting eyes from UV rays, wind and debris during your runs.',
        'icon' => '🏃'
    ],
    'Sports_cycling' => [
        'title' => 'Cycling Eyewear',
        'description' => 'Performance cycling glasses with wraparound designs for maximum coverage and protection. Features include interchangeable lenses for different light conditions, rubberized grips for secure fit, and ventilation systems to prevent fogging during intense rides.',
        'icon' => '🚴'
    ],
    'Sports_swimming' => [
        'title' => 'Swimming Goggles',
        'description' => 'Competition-grade swim goggles featuring leak-proof seals and anti-fog treatments. Available in various lens tints for different lighting conditions in pools and open water, with comfortable silicone gaskets and adjustable straps for secure fit during laps.',
        'icon' => '🏊'
    ],
    'Sports_winter' => [
        'title' => 'Winter Sports Goggles',
        'description' => 'Winter sports goggles designed for skiing and snowboarding with anti-fog coatings and enhanced peripheral vision. Features include double-layer lenses, adjustable straps and comfortable fits over helmets to protect eyes in alpine conditions.',
        'icon' => '⛷️'
    ],
    'Sports_Shapes' => [
        'title' => 'Sports Frame Shapes',
        'description' => 'Specialty sports eyewear in various frame shapes designed for different athletic activities. Our collection includes aerodynamic designs for cycling, low-profile frames for running, and wide-coverage goggles for winter sports - all with sport-specific features.',
        'icon' => '🔶'
    ],
    'Sports_Frames' => [
        'title' => 'Sports Frames',
        'description' => 'Durable sports frames constructed from lightweight, impact-resistant materials designed to withstand rigorous activity. Features include flexible hinges, rubberized contact points and ventilation systems to keep lenses clear during intense workouts and competitions.',
        'icon' => '🖼️'
    ],
    'Sports_Top' => [
        'title' => 'Top Sports Eyewear',
        'description' => 'Our premium performance sports eyewear featuring advanced lens technologies and premium frame materials. Top models include photochromic lenses that adapt to light conditions, polarized options for water sports, and ultra-lightweight designs for endurance athletes.',
        'icon' => '🥇'
    ],
    'Sports_Discount' => [
        'title' => 'Sports Discount',
        'description' => 'Discounted sports eyewear from previous seasons offering great value on high-performance designs. These models still feature impact-resistant lenses, secure-fit frames and sport-specific designs at reduced prices - perfect for athletes on a budget.',
        'icon' => '🏷️'
    ],

    //Accessories
    'Acces_all' => [
        'title' => 'All Accessories',
        'description' => 'Complete your eyewear experience with our selection of essential accessories including protective cases, cleaning kits and repair tools. Our collection features microfiber cloths, lens cleaning solutions, compact folding cases and retention straps to maintain and protect your glasses investment.',
        'icon' => '🧰'
    ],
    'Acces_felt' => [
        'title' => 'Felt Cases',
        'description' => 'Premium felt-lined eyeglass cases and sleeves providing gentle protection for your lenses and frames. These non-abrasive cases prevent scratches while storing or transporting your glasses, available in various sizes and stylish designs to match your eyewear.',
        'icon' => '🧶'
    ],
    'Acces_cords' => [
        'title' => 'Retention Cords',
        'description' => 'Eyewear retention cords and straps designed to keep your glasses secure during activities. Features include adjustable lengths, quick-release connectors and comfortable materials that won\'t irritate skin - perfect for sports, work or everyday use.',
        'icon' => '📿'
    ],
    'Acces_case/cleankits' => [
        'title' => 'Case & Clean Kits',
        'description' => 'Complete eyeglass care kits including protective cases and professional cleaning supplies. Our kits feature spray cleaners, microfiber cloths and sometimes spare parts - everything you need to keep your glasses clean, clear and protected daily.',
        'icon' => '🧽'
    ],
    'Acces_clips' => [
        'title' => 'Clip-Ons',
        'description' => 'Clip-on sunglasses and accessories that transform your prescription glasses into sun protection. Our collection includes magnetic clip-ons, flip-up designs and side shields - affordable solutions for adding sun protection to your regular frames.',
        'icon' => '📎'
    ]
];

$currentCategory = $categoryData[$category];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="" /> <!-- Add your favicon path -->
    <title>Main Gallery</title>

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

    <!-- product css -->
    <style>
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

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .product-card {
            overflow: hidden;
            transition: transform 0.3s ease;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-2px);
            transform: scale(1.01);
        }

        .product-image-container {
            height: 250px;
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .product-image-container a {
            display: block;
            width: 100%;
            height: 100%;
        }

        .product-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .product-image-container img.front {
            opacity: 1;
            z-index: 1;
        }

        .product-image-container img.back {
            opacity: 0;
            z-index: 2;
        }

        .product-image-container:hover img.front {
            opacity: 0;
        }

        .product-image-container:hover img.back {
            opacity: 1;
        }

        .wishlist-icon i {
            position: absolute;
            bottom: 0px;
            right: 0px;
            font-size: 25px;
        }

        .wishlist-icon {
            position: absolute;
            bottom: 15px;
            right: 15px;
            z-index: 10;
            color: #303030;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .wishlist-icon:hover {
            transform: scale(1.3);
        }

        .wishlist-icon.active {
            color: red;
        }

        .top-rated-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            height: 25px;
            width: 80px;
            background: rgba(238, 31, 31, 1);
            color: #ffffff;
            padding: 5px 12px;
            font-size: 0.75rem;
            border-radius: 20px;
            font-weight: 700;
            z-index: 2;
            font-family: big;
            /* Changed from 'small' to a proper font stack */
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

        }

        .discount-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            height: 25px;
            width: 80px;
            background: rgba(238, 172, 31, 1);
            color: #ffffff;
            padding: 5px 12px;
            font-size: 0.75rem;
            border-radius: 20px;
            font-weight: 700;
            z-index: 2;
            font-family: big;
            /* Changed from 'small' to a proper font stack */
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .gender-icon {
            position: absolute;
            top: 15px;
            left: 15px;
            height: 25px;
            padding: 5px 12px;
            font-size: 0.9rem;
            border-radius: 20px;
            font-weight: 700;
            z-index: 2;
            font-family: big;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 5px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);

            background: linear-gradient(to right,
                    #008cffff 0%,
                    #008cffff 33%,
                    #ae00ffff 33%,
                    #ff00ddff 66%,
                    #ea00ffff 66%,
                    #ffee00ff 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            background-size: 200% auto;
            animation: gradientMove 3s linear infinite alternate;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% center;
            }

            100% {
                background-position: 100% center;
            }
        }


        .new-icon {
            position: absolute;

        }

        .bestseller-icon {
            position: absolute;
            bottom: 15px;
            left: 15px;
            height: 25px;
            width: 130px;
            background: rgba(175, 130, 5, 1);
            color: #ffffff;
            padding: 5px 12px;
            font-size: 0.9rem;
            border-radius: 20px;
            font-weight: 700;
            z-index: 2;
            font-family: big;
            /* Changed from 'small' to a proper font stack */
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .Sports-icon {
            position: absolute;
            top: 15px;
            left: 15px;
            height: 25px;
            padding: 5px 12px;
            font-size: 0.9rem;
            border-radius: 20px;
            font-weight: 700;
            z-index: 2;
            font-family: big;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 5px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);

            background: linear-gradient(to right,
                    #ff0055ff 0%,
                    #008cffff 33%,
                    #ae00ffff 33%,
                    #ff00ddff 66%,
                    #ea00ffff 66%,
                    #ffee00ff 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            background-size: 200% auto;
            animation: gradientMove 3s linear infinite alternate;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% center;
            }

            100% {
                background-position: 100% center;
            }
        }

        .Acces-icon {
            position: absolute;
            top: 15px;
            left: 15px;
            height: 25px;
            padding: 5px 12px;
            font-size: 0.9rem;
            border-radius: 20px;
            font-weight: 700;
            z-index: 2;
            font-family: big;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
            letter-spacing: 5px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);

            background: linear-gradient(to right,
                    #bb0202ff 0%,
                    #ff9100ff 33%,
                    #9dff00ff 33%,
                    #00eeffff 66%,
                    #ea00ffff 66%,
                    #ffee00ff 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            background-size: 200% auto;
            animation: gradientMove 3s linear infinite alternate;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% center;
            }

            100% {
                background-position: 100% center;
            }
        }

        .product-details {
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-info {
            text-align: left;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
            font-family: medium;
        }

        .product-name::first-letter {
            text-transform: uppercase;
        }

        .product-price {
            font-size: 16px;
            color: #333;
            margin-bottom: 25px;
            font-family: small;
        }

        .color-section {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 5px;
        }

        .product-color {
            color: #666;
            text-transform: capitalize;
        }

        .color-options {
            display: flex;
            gap: 10px;
        }

        .color-option {
            position: relative;
            width: 23px;
            height: 23px;
            border-radius: 50%;
            cursor: pointer;
            overflow: hidden;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .color-option:hover {
            transform: scale(1.1);
            border-color: #333;
        }

        .color-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 10%;
            height: 100%;
            cursor: pointer;
        }

        .color-option input[type="radio"]:checked+.color-swatch {
            border: 2px solid #333;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .color-swatch {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .color-swatch.silver {
            background-color: #e6e6e6;
        }

        .color-swatch.black {
            background-color: #333333;
        }

        .color-swatch.gold {
            background-color: #ffd700;
        }

        .color-swatch.blue {
            background-color: #0077be;
        }

        .color-swatch.red {
            background-color: #ff0000;
        }

        .color-preview {
            position: absolute;
            top: -150px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 100px;
            border-radius: 5px;
            background-size: cover;
            background-position: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 10;
        }

        .color-option:hover .color-preview {
            opacity: 1;
        }

        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px;
            background-color: #fff;
            border-radius: 8px;
            font-family: big;
            color: #24262b;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);

        }

        .load-more-container {
            grid-column: 1 / -1;
            text-align: center;
            margin-top: 30px;
            padding: 20px;

        }

        .load-more-btn {
            padding: 12px 30px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .load-more-btn:hover {
            background-color: #555;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .load-more-btn:active {
            transform: translateY(0);
        }

        .load-more-btn::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .load-more-btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }

            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }

        @media (min-width: 1200px) {
            .top-picks-container {
                padding: 0;
                max-width: 2000px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
                gap: 40px;
            }

            .product-card {
                border-right: 1px solid #eee;
                border-bottom: 1px solid #eee;
            }

            .product-image-container {
                height: 350px;
            }

            .product-name {
                font-size: 22px;
            }

            .product-price {
                font-size: 20px;
            }

            .color-option {
                width: 28px;
                height: 28px;
            }

            .product-card:nth-child(4n) {
                border-right: none;
            }

            .product-card:nth-last-child(-n+4) {
                border-bottom: none;
            }
        }

        @media (max-width: 1340px) {
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 30px;
            }

            .product-card {
                border: none;
            }
        }

        @media (max-width: 768px) {
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 20px;
            }

            .product-image-container {
                height: 300px;
            }


        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 24px;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
    </style>

    <!-- categories css -->
    <style>
        .category-header {
            text-align: left;
            margin: 30px 0 40px;
            padding: 20px;
            background: linear-gradient(135deg, #ffffffff 0%, #ffffffff 100%);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .category-icon {
            font-size: 2rem;
            /* Adjust emoji size as needed */
            margin-right: 15px;
            vertical-align: middle;
        }

        .category-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #dab86bff;
            display: flex;
            align-items: center;
            /* Changed from 'left' to 'center' for better alignment */
            gap: 15px;
            font-family: big;
        }

        .category-description {
            font-size: 1.1rem;
            color: #000000ff;
            max-width: 700px;
            margin-left: 60px;
            line-height: 1.6;
            font-family: small;
        }

        /* Specific category colors */


        /* Animation for icon */
        @keyframes float {
            0% {
                transform: translateY(0) rotate(-1deg);
            }

            50% {
                transform: translateY(-5px) rotate(1deg);
            }

            100% {
                transform: translateY(0) rotate(-1deg);
            }
        }

        .category-image {
            animation: float 4s ease-in-out infinite;
        }
    </style>

    <!-- top-picks-container -->
    <style>
        /* Enhanced Filter Section */
        .filter-section {
            background-color: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .filter-section:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-group h3 {
            margin-bottom: 0.8rem;
            font-size: 1rem;
            color: #24262b;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: big;
        }

        .filter-group h3::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            background: #dab86bff;
            border-radius: 50%;
        }

        .filter-options {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            background-color: white;
            border: 1px solid #e9ecef;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            font-size: 0.85rem;
            font-weight: 500;
            color: #000000ff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            font-family: small;
        }

        .filter-btn:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(67, 97, 238, 0.2);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .filter-btn:focus:not(:active)::after {
            animation: ripple 0.6s ease-out;
        }

        .filter-btn.active {
            background: #b5985a;
            color: white;
            border-color: #b5985a;
            box-shadow: 0 4px 12px #b5985a;
        }

        .filter-btn.active:hover {
            background: #24262b;
        }

        .reset-btn {
            padding: 0.6rem 1.2rem;
            background: linear-gradient(135deg, #f0cb75ff, #927c4aff);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            align-self: flex-end;
            box-shadow: 0 0px 10px #24262b46;
            position: relative;
            overflow: hidden;
            font-family: medium;
        }

        .reset-btn:hover {
            background: linear-gradient(80deg, #f0cb75ff, #927c4aff);
            transform: scale(1.03);
            box-shadow: 0 6px 15px #b5985a;
        }

        .reset-btn:active {
            transform: translateY(0);
        }

        /* Animations */
        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }

            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .filter-btn {
            animation: fadeIn 0.4s ease forwards;
        }

        .filter-btn:nth-child(1) {
            animation-delay: 0.1s;
        }

        .filter-btn:nth-child(2) {
            animation-delay: 0.2s;
        }

        .filter-btn:nth-child(3) {
            animation-delay: 0.3s;
        }

        .filter-btn:nth-child(4) {
            animation-delay: 0.4s;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .top-picks-container {
                padding: 1.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .filter-section {
                flex-direction: column;
                gap: 1.2rem;
            }

            .reset-btn {
                align-self: center;
                margin-top: 0.5rem;
            }
        }
    </style>

</head>

<body>

    <header>
        <?php
        include("../NavBar/navbar.php");
        ?>
    </header>

    <div class="top-picks-container">

        <div class="category-header <?php
                                    echo strpos($category, 'Men') !== false ? 'men-category' : '';
                                    echo strpos($category, 'Women') !== false ? 'women-category' : '';
                                    echo strpos($category, 'Kids') !== false ? 'kids-category' : '';
                                    echo strpos($category, 'Bestsellers') !== false ? 'Bestsellers-category' : '';
                                    ?>">
            <h1 class="category-title">
                <?php if (!empty($currentCategory['icon'])): ?>
                    <span class="category-icon"><?php echo $currentCategory['icon']; ?></span>
                <?php endif; ?>
                <?php echo $currentCategory['title']; ?>
            </h1>
            <p class="category-description">
                <?php echo $currentCategory['description']; ?>
            </p>
        </div>

        <!-- NEW FILTER SECTION -->
        <?php if (!str_starts_with($category, 'Acces') && !str_starts_with($category, 'Sports')): ?>
            <div class="filter-section">
                <div class="filter-group">
                    <h3>Frame shapes</h3>
                    <div class="filter-options">
                        <button class="filter-btn <?= ($category == 'Sports_Shapes') ? 'active' : '' ?>" data-filter="category" data-value="oval">Oval</button>
                        <button class="filter-btn <?= ($category == 'Sports_Shapes') ? 'active' : '' ?>" data-filter="category" data-value="round">Round</button>
                        <button class="filter-btn <?= ($category == 'Sports_Shapes') ? 'active' : '' ?>" data-filter="category" data-value="rectangle">Rectangle</button>
                        <button class="filter-btn <?= ($category == 'Sports_Shapes') ? 'active' : '' ?>" data-filter="category" data-value="square">Square</button>
                    </div>
                </div>

                <div class="filter-group">
                    <h3>Material</h3>
                    <div class="filter-options">
                        <button class="filter-btn <?= ($category == 'Eye_Materials' || $category == 'Sun_Materials') ? 'active' : '' ?>" data-filter="material" data-value="metal">Metal</button>
                        <button class="filter-btn <?= ($category == 'Eye_Materials' || $category == 'Sun_Materials') ? 'active' : '' ?>" data-filter="material" data-value="acetate">Acetate</button>
                        <button class="filter-btn <?= ($category == 'Eye_Materials' || $category == 'Sun_Materials') ? 'active' : '' ?>" data-filter="material" data-value="titanium">Titanium</button>
                        <button class="filter-btn <?= ($category == 'Eye_Materials' || $category == 'Sun_Materials') ? 'active' : '' ?>" data-filter="material" data-value="combi">Combi</button>
                    </div>
                </div>

                <div class="filter-group">
                    <h3>Frame Styles</h3>
                    <div class="filter-options">
                        <button class="filter-btn <?= ($category == 'Eye_Frames' || $category == 'Sun_Frames' || $category == 'Sports_Frames') ? 'active' : '' ?>" data-filter="frameType" data-value="full-rim">Full Rim</button>
                        <button class="filter-btn <?= ($category == 'Eye_Frames' || $category == 'Sun_Frames' || $category == 'Sports_Frames') ? 'active' : '' ?>" data-filter="frameType" data-value="half-rim">Half Rim</button>
                        <button class="filter-btn <?= ($category == 'Eye_Frames' || $category == 'Sun_Frames' || $category == 'Sports_Frames') ? 'active' : '' ?>" data-filter="frameType" data-value="rimless">Rimless</button>
                        <button class="filter-btn <?= ($category == 'Eye_Frames' || $category == 'Sun_Frames' || $category == 'Sports_Frames') ? 'active' : '' ?>" data-filter="frameType" data-value="classic">Classic</button>
                        <button class="filter-btn <?= ($category == 'Eye_Frames' || $category == 'Sun_Frames' || $category == 'Sports_Frames') ? 'active' : '' ?>" data-filter="frameType" data-value="bold">Bold</button>
                    </div>
                </div>

                <button class="reset-btn" id="resetFilters">Reset Filters</button>
            </div>
        <?php endif; ?>

        <div class="products-grid" id="productsGrid">
            <!-- Products will be loaded here -->
        </div>

        <div class="load-more-container" id="loadMoreContainer">
            <!-- Load More button will be added here -->
        </div>

        <script src="./GalleriesData/product_data.js"></script>

        <script src="./GalleriesData/product_filter.js"></script>

        <script>
            // Product data array

            // Variables for batch loading
            let visibleProducts = 15;
            const batchSize = 5;

            // Function to generate product HTML
            function createProductCard(product) {
                const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
                const isFavorited = favorites.some(fav => fav.id === product.id);

                const colorOptions = product.colors.map(color => `
                        <div class="color-option">
                            <input type="radio" id="${product.id}-${color}" name="${product.id}-color" value="${color}" ${color === product.colors[0] ? 'checked' : ''}>
                            <label for="${product.id}-${color}" class="color-swatch ${color}"></label>
                            <div class="color-preview" style="background-image: url('${product.images[color].front}')"></div>
                        </div>
                    `).join('');

                const images = product.colors.map(color => `
                        <img src="${product.images[color].front}" alt="${product.name} ${color} Front" 
                             class="front" data-color="${color}" style="opacity: ${color === product.colors[0] ? '1' : '0'}; ${color === product.colors[0] ? 'z-index: 1;' : 'z-index: 0;'}">
                        <img src="${product.images[color].back}" alt="${product.name} ${color} Back" 
                             class="back" data-color="${color}" style="opacity: 0; z-index: 0;">
                    `).join('');

                // Generate icons based on product properties
                const icons = [];
                if (product.isTopRated) {
                    icons.push('<div class="top-rated-icon" title="Top Rated">Sales 62%</div>');
                }
                if (product.isDiscount) {
                    icons.push('<div class="discount-icon" title="Discount">50% off</div>');
                }
                if (product.isMen) {
                    icons.push('<div class="gender-icon" title="Men">Gender</div>');
                }
                if (product.isWomen) {
                    icons.push('<div class="gender-icon" title="Women">Gender</div>');
                }
                if (product.isKids) {
                    icons.push('<div class="gender-icon" title="Kids">Gender</div>');
                }
                if (product.isNew) {
                    icons.push('<div class="new-icon" title="New Arrival"></div>');
                }
                if (product.isBestseller) {
                    icons.push('<div class="bestseller-icon" title="Bestseller">Best Sellers</div>');
                }
                if (product.isSports) {
                    icons.push('<div class="Sports-icon" title="Sports">Sports</div>');
                }
                if (product.isAcces) {
                    icons.push('<div class="Acces-icon" title="Acces">Accesories</div>');
                }

                return `
                    <div class="product-card" 
                    data-id="${product.id}"
                    data-category="${product.category}" 
                    data-frameType="${product.frameType}" 
                    data-material="${product.material}"
                    data-price="${product.price.replace('$', '')}"
                    data-type="${product.type}">
                    <div class="product-image-container" onclick="handleProductClick(${product.id})">
                    ${images}
                    <div class="wishlist-icon ${isFavorited ? 'active' : ''}">
                    <i class="${isFavorited ? 'fas' : 'far'} fa-heart"></i>
                    </div>
                    ${icons.join('')}
                        </div>
                            <div class="product-details">
                                <div class="product-info">
                                    <h3 class="product-name">${product.name}</h3>
                                    <div class="product-price">${product.price}</div>
                                </div>
                                <div class="color-section">
                                    <div class="product-color">${product.colors[0]}</div>
                                    <div class="color-options">
                                        ${colorOptions}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
            }

            // Function to handle product click
            function handleProductClick(productId) {
                const product = products.find(p => p.id === productId);
                if (!product) return;

                // Create a form to submit the data
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'doproduct.php'; // Submit to same page

                // Function to add hidden inputs
                function addHiddenInput(name, value) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = name;
                    input.value = value;
                    form.appendChild(input);
                }

                // Add basic product info
                addHiddenInput('product_id', product.id);
                addHiddenInput('product_name', product.name);
                addHiddenInput('product_price', product.price);
                addHiddenInput('product_type', product.type);
                addHiddenInput('product_category', product.category);
                addHiddenInput('product_frameType', product.frameType);
                addHiddenInput('product_material', product.material);

                // Add colors as comma-separated string
                addHiddenInput('product_colors', product.colors.join(','));

                // Add image paths for each color
                addHiddenInput('black_front_image', product.images.black.front);
                addHiddenInput('black_back_image', product.images.black.back);
                addHiddenInput('gold_front_image', product.images.gold.front);
                addHiddenInput('gold_back_image', product.images.gold.back);
                addHiddenInput('red_front_image', product.images.red.front);
                addHiddenInput('red_back_image', product.images.red.back);
                addHiddenInput('silver_front_image', product.images.silver.front);
                addHiddenInput('silver_back_image', product.images.silver.back);
                addHiddenInput('blue_front_image', product.images.blue.front);
                addHiddenInput('blue_back_image', product.images.blue.back);

                // Add flags only if they are true
                if (product.isTopRated) addHiddenInput('isTopRated', 'true');
                if (product.isMen) addHiddenInput('isMen', 'true');
                if (product.isWomen) addHiddenInput('isWomen', 'true');
                if (product.isKids) addHiddenInput('isKids', 'true');
                if (product.isDiscount) addHiddenInput('isDiscount', 'true');
                if (product.isNew) addHiddenInput('isNew', 'true');
                if (product.isBestseller) addHiddenInput('isBestseller', 'true');
                if (product.isSports) addHiddenInput('isSports', 'true');
                if (product.isAcces) addHiddenInput('isAcces', 'true');

                // Submit the form
                document.body.appendChild(form);
                form.submit();
            }

            function showFavoriteMessage(message) {
                const notification = document.createElement('div');
                notification.style.position = 'fixed';
                notification.style.bottom = '20px';
                notification.style.right = '20px';
                notification.style.fontFamily = 'big';
                notification.style.backgroundColor = '#b5985a';
                notification.style.color = 'white';
                notification.style.padding = '15px 30px';
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
            // Function to initialize event listeners
            function initializeEventListeners() {
                // Wishlist toggle - now just needs to handle the click, not initial state
                document.querySelectorAll('.wishlist-icon').forEach(icon => {
                    icon.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const heart = this.querySelector('i');
                        const productCard = this.closest('.product-card');
                        const productId = parseInt(productCard.dataset.id);

                        // Find the product in our products array
                        const product = products.find(p => p.id === productId);
                        if (!product) return;

                        // Toggle the active class
                        this.classList.toggle('active');

                        // Toggle the heart icon
                        heart.classList.toggle('far');
                        heart.classList.toggle('fas');

                        // Get current favorites from localStorage
                        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];

                        // Check if product is already favorited
                        const existingIndex = favorites.findIndex(fav => fav.id === productId);

                        if (existingIndex >= 0) {
                            // Remove from favorites
                            favorites.splice(existingIndex, 1);
                            showFavoriteMessage('Removed from favorites');
                        } else {
                            // Add to favorites
                            const favoriteProduct = {
                                id: product.id,
                                name: product.name,
                                price: product.price,
                                image: product.images[product.colors[0]].front,
                                color: product.colors,
                                category: product.category
                            };
                            favorites.push(favoriteProduct);
                            showFavoriteMessage('Added to favorites');
                        }

                        // Save back to localStorage
                        localStorage.setItem('favorites', JSON.stringify(favorites));
                    });
                });

                // Color change logic
                document.querySelectorAll('.color-option input[type="radio"]').forEach(radio => {
                    radio.addEventListener('change', function(e) {
                        e.stopPropagation();
                        const productCard = this.closest('.product-card');
                        const colorValue = this.value;
                        const imageContainer = productCard.querySelector('.product-image-container');

                        // Update color label
                        productCard.querySelector('.product-color').textContent = colorValue;

                        // Hide all images first
                        imageContainer.querySelectorAll('img').forEach(img => {
                            img.style.opacity = '0';
                            img.style.zIndex = '0';
                        });

                        // Show the front image for the selected color
                        const frontImage = imageContainer.querySelector(`img.front[data-color="${colorValue}"]`);
                        if (frontImage) {
                            frontImage.style.opacity = '1';
                            frontImage.style.zIndex = '1';
                        }
                    });
                });

                // Hover effects
                document.querySelectorAll('.product-image-container').forEach(container => {
                    container.addEventListener('mouseenter', function() {
                        const activeFront = this.querySelector('img.front[style*="opacity: 1"]');
                        if (!activeFront) return;

                        const colorValue = activeFront.dataset.color;
                        const backImage = this.querySelector(`img.back[data-color="${colorValue}"]`);

                        if (activeFront) activeFront.style.opacity = '0';
                        if (backImage) {
                            backImage.style.opacity = '1';
                            backImage.style.zIndex = '2';
                        }
                    });

                    container.addEventListener('mouseleave', function() {
                        const activeFront = this.querySelector('img.front[style*="z-index: 1"]');
                        if (!activeFront) return;

                        const colorValue = activeFront.dataset.color;
                        const backImage = this.querySelector(`img.back[data-color="${colorValue}"]`);

                        if (activeFront) activeFront.style.opacity = '1';
                        if (backImage) {
                            backImage.style.opacity = '0';
                            backImage.style.zIndex = '0';
                        }
                    });
                });
            }

            // Function to apply filters
            function applyFilters() {
                const activeFilters = {};
                let hasActiveFilters = false;

                // Collect all active filters
                document.querySelectorAll('.filter-btn.active').forEach(btn => {
                    const filterType = btn.dataset.filter;
                    const filterValue = btn.dataset.value;

                    if (!activeFilters[filterType]) {
                        activeFilters[filterType] = [];
                    }
                    activeFilters[filterType].push(filterValue);
                    hasActiveFilters = true;
                });

                const productsGrid = document.getElementById('productsGrid');
                const allProducts = productsGrid.querySelectorAll('.product-card');
                let hasVisibleProducts = false;

                // If no filters are active, show all products
                if (!hasActiveFilters) {
                    allProducts.forEach(card => {
                        card.style.display = 'block';
                    });
                    return;
                }

                // Filter products
                allProducts.forEach(card => {
                    let shouldShow = true;

                    // Check against each active filter group
                    for (const filterType in activeFilters) {
                        const cardValue = card.dataset[filterType.toLowerCase()]; // Get the data attribute
                        if (!activeFilters[filterType].includes(cardValue)) {
                            shouldShow = false;
                            break;
                        }
                    }

                    card.style.display = shouldShow ? 'block' : 'none';
                    if (shouldShow) hasVisibleProducts = true;
                });

                // Show "no results" message if needed
                const existingNoResults = productsGrid.querySelector('.no-results');
                if (!hasVisibleProducts) {
                    if (!existingNoResults) {
                        const noResults = document.createElement('div');
                        noResults.className = 'no-results';
                        noResults.innerHTML = '<h2>No products match your filters</h2><p>Try adjusting your filter criteria</p>';
                        productsGrid.appendChild(noResults);
                    }
                } else if (noResults) {
                    noResults.remove();
                }
            }

            // Function to update the "See More" button
            function updateLoadMoreButton() {
                const loadMoreContainer = document.getElementById('loadMoreContainer');
                loadMoreContainer.innerHTML = '';

                if (visibleProducts < products.length) {
                    const loadMoreBtn = document.createElement('button');
                    loadMoreBtn.className = 'load-more-btn';
                    loadMoreBtn.textContent = 'See More';
                    loadMoreBtn.addEventListener('click', loadMoreProducts);
                    loadMoreContainer.appendChild(loadMoreBtn);
                }
            }

            // Function to load more products
            function loadMoreProducts() {
                visibleProducts = Math.min(visibleProducts + batchSize, products.length);
                renderProducts();
            }

            // Function to render products based on current visible count
            function renderProducts() {
                const productsGrid = document.getElementById('productsGrid');
                productsGrid.innerHTML = '';

                // Get category from URL parameter
                const urlParams = new URLSearchParams(window.location.search);
                const categoryParam = urlParams.get('category') || 'all';
                const currentCategory = categories[categoryParam] || categories['all'];

                // Update page title or header with category name
                document.title = `${currentCategory.name} | Your Store Name`;
                const categoryHeader = document.getElementById('categoryHeader');
                if (categoryHeader) {
                    categoryHeader.textContent = currentCategory.name;
                }

                // Filter products based on category
                const filteredProducts = products.filter(currentCategory.filter);
                const productsToShow = filteredProducts.slice(0, visibleProducts);

                if (productsToShow.length === 0) {
                    productsGrid.innerHTML = `
                    <div class="no-results">
                        <h2>No products found in this category</h2>
                        <p>Try browsing our other collections</p>
                    </div>
                `;
                } else {
                    productsGrid.innerHTML = productsToShow.map(product => createProductCard(product)).join('');
                }

                initializeEventListeners();
                updateLoadMoreButton();
                applyFilters();
            }

            // Initialize the page
            document.addEventListener('DOMContentLoaded', function() {
                renderProducts();

                // Set up filter button listeners (if you add filter buttons later)
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        this.classList.toggle('active');
                        applyFilters();
                    });
                });

                // Set up reset button listener (if you add a reset button later)
                const resetBtn = document.getElementById('resetFilters');
                if (resetBtn) {
                    resetBtn.addEventListener('click', function() {
                        document.querySelectorAll('.filter-btn.active').forEach(btn => {
                            btn.classList.remove('active');
                        });
                        applyFilters();
                    });
                }
            });
        </script>


    </div>

    <footer>
        <?php
        include("../Footer/footer_css.html");
        ?>
    </footer>

</body>

</html>