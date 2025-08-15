
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

<!--All code -->
<style>
    /* MAIN NAVIGATION */
    .main-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        padding-bottom: 20px;
        background-color: #fff;
        position: sticky;
        width: 100%;
        margin: auto;
        z-index: 1000;
        margin-top: 28px;
        transition: all 0.3s ease-in-out;
        border-bottom: 5px solid #eee;
        max-width: 2000px;

    }

    .logo {
        margin-left: 100px;
        height: 60px;
        transition: transform 0.3s ease-in-out;
    }

    .logo:hover {
        transform: scale(1.1);
        filter: blur(1.07px);

    }

    .nav-links {
        display: flex;
        gap: 50px;

    }

    .nav-links a {
        text-decoration: none;
        color: #333;
        font-size: 16px;
        position: relative;
        cursor: pointer;
        font-weight: 0;
        font-family: medium;
    }


    .nav-links a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 4px;
        bottom: -10px;
        left: 0;
        background-color: #333;
        transition: width 0.3s ease;
    }

    .nav-links a:hover::after {
        width: 100%;
    }

    .nav-links a.summer-sale {
        color: #f11515ff;
    }

    .nav-links a.summer-sale::after,
    .nav-links a.summer-sale:hover::after {
        background-color: #f11515ff;
    }

    .nav-icons {
        display: flex;
        gap: 20px;
        margin-right: 120px;
    }

    .nav-icons a {
        text-decoration: none;
        color: #333;
        font-size: 14px;
        font-family: medium;
    }

    /* MEGA MENUS */
    .mega-menu {
        display: none;
        position: absolute;
        transform: translateX(18%);
        left: 0;
        width: 73%;
        background-color: #fff;
        border-top: 1px solid #eee;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        z-index: 999;

    }

    .mega-menu.active {
        display: flex;
        flex-wrap: wrap;
    }

    /*here ---------------------*/
    .mega-menu-column {
        padding: 0px 30px;
    }

    .dropdown-promos-acces {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        /* Changed to three columns */
        gap: 15px;
        padding: 15px;
    }

    .dropdown-promos {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        padding: 15px;
    }

    .promo-card {
        position: relative;
        height: 100%;
        max-width: 100%;
        max-height: 220px;
        overflow: hidden;
        border-radius: 6px;
    }

    .promo-image {
        height: 220px;
        width: 100%;
        max-width: 100%;
        max-height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .promo-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .promo-card:hover .promo-image img {
        transform: scale(1.05);
    }

    .promo-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        padding: 20px;
        color: white;
    }

    .promo-text h4 {
        font-size: 18px;
        margin-bottom: 5px;

        font-family: big;
    }

    .promo-text p {
        font-size: 14px;
        margin-bottom: 10px;
        opacity: 0.9;
        font-family: small;
    }

    .promo-subtext {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }

    .promo-subtext a {
        color: white;
        text-decoration: none;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 5px;

    }

    .promo-tag {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 12px;
        margin-top: 10px;
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

    .mega-menu-column h3 {
        margin-bottom: 25px;
        font-size: 20px;
        text-transform: uppercase;
        font-family: big;
    }

    .mega-menu-column ul {
        list-style: none;
        padding: 0px 20px;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 20px;
        /* Reduce gap between images */
    }

    .mega-menu-column ul li a {
        text-decoration: none;
        color: #666;
        font-size: 15px;
        font-family: small;
    }

    .mega-menu-column ul li a:hover {
        color: #000;
        text-decoration: underline;
    }



    .shop-links a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    .mobile-menu-btn {
        display: none;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    /* Sign up button styles */
    .signup-btn {
        background-color: #C9A34E;
        /* Blue color - change to match your brand */
        color: white !important;
        padding: 7px 15px;
        border-radius: 20px;
        /* Rounded corners */
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
        transition: all 0.3s ease-in-out;
        margin-right: 10px;
        border: 2px solid transparent;
    }

    .signup-btn:hover {
        background-color: #24262b;
        /* Darker blue on hover */
        transform: translateY(-5px);

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .signup-btn-nologin {
        background-color: #24262b;
        /* Blue color - change to match your brand */
        color: white !important;
        padding: 7px 15px;
        border-radius: 20px;
        /* Rounded corners */
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
        transition: all 0.3s ease-in-out;
        margin-right: 10px;
        border: 2px solid transparent;
    }

    .signup-btn-nologin:hover {
        background-color: #C9A34E;
        /* Darker blue on hover */
        transform: translateY(-5px);

        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Adjust spacing between icons */
    .nav-icons {
        display: flex;
        align-items: center;
        gap: 20px;
        /* Consistent spacing */
    }

    .nav-icons a:not(.signup-btn) {
        color: #333;
        /* Default icon color */
        font-size: 18px;
        transition: all 0.3s ease-in-out;
    }

    .nav-icons a:not(.signup-btn):hover {
        color: #C9A34E;
        /* Blue on hover */
        transform: translateY(-3px);
    }

    /* Optional: Add badge to shopping bag */
    .shopping-bag {
        position: relative;
    }

    .shopping-bag::after {
        content: '0';
        position: absolute;
        top: -8px;
        right: -8px;
        background: #e74c3c;
        color: white;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ANNOUNCEMENT BAR */
    .abovenavbar {
        cursor: pointer;
        position: absolute;
        width: 100%;
        background-color: #24262b;
        color: white;
        text-align: center;
        padding: 8px 0;
        font-size: 14px;
        font-weight: 500;
        font-style: italic;
        margin-top: -4px;
        top: 0;
        left: 0;
        z-index: 2000;
        transition: opacity 0.5s ease-in-out;
        font-family: medium;
    }

    .abovenavbar.fade-out {
        opacity: 0;
    }



    @media (max-width: 1900px) {
        .main-nav {
            padding: 20px 0vw;
            /* Slightly tighter padding */
        }

        .nav-icons {
            display: flex;

            margin-right: 50px;
        }

        .nav-links {
            gap: 50px;
            /* Slightly tighter gap */
        }
    }


    @media (max-width: 1400px) {
        .nav-links {
            gap: 15px;
        }
    }

    @media (max-width: 1200px) {
        .main-nav {
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        .nav-links {
            display: flex !important;
            flex-direction: column;
            gap: 8px;
            margin-top: 15px;
            margin-left: 0;
            width: 90%;
            align-items: center;
        }

        .nav-links a {
            width: 100%;
            text-align: center;
            padding: 8px 12px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #f0f0f0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .nav-links a::after {
            display: none;
        }

        .logo {
            margin-left: 0;
            text-align: center;
            width: 100%;
        }


        .nav-icons {
            margin-right: 0;
            margin-top: 15px;
            width: 90%;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .mega-menu {
            position: relative;
            width: 100%;
            transform: none;
            left: 0;
        }



        .signup-btn {
            margin-right: 0;
            margin-bottom: 10px;
        }
    }
</style>

<!--this navbar2 code-->
<style>
    .navbar2 {
        transition: opacity 0.5s ease-in-out;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 100;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
    }

    .video-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        /* This ensures video stays behind content */
        overflow: hidden;
    }

    .video-background video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .logo2 {
        height: 50px;
        /* Reduced from 550px to reasonable size */
        width: auto;
        /* Maintain aspect ratio */
        z-index: 2;
        /* Ensure logo stays above video */
        position: relative;
        /* Needed for z-index to work */
    }

    /* Scroll to top button */
    .scroll-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        opacity: 0;
        transition: all 0.3s ease;
        z-index: 99;
        border: none;
        outline: none;
    }

    .scroll-top.visible {
        opacity: 1;
    }

    .scroll-top:hover {
        background: #b5985a;

        transform: translateY(-5px);
        transform: scale(1.2);
    }

    @media (max-width: 800px) {
        .navbar2 {
            height: 50px;
        }

        .logo2 {
            height: 40px;
            /* Adjusted for mobile */
        }
    }
</style>

<header>

    <!--this above the navbar -->

    <div class="abovenavbar" id="announcement-bar">
        Free shipping on orders over € 50 | Book an eye test
    </div>

    <!--navbar1-->
    <nav class="navbar1">

        <!--Main Menu-->
        <div class="main-nav">
            <a href="/Project_do_stage/home.php">
                <img class="logo" src="/Project_do_stage/Assets/Logos/logo_without_ketba.png">
            </a>


            <div class="nav-links">
                <a class="EyeGlasses-link">EyeGlasses</a>
                <a class="Sunglasses-link">SunGlasses</a>
                <a class="accessories-link">Accessories</a>
                <a class="sports-link">Sports</a>
                <a href="/Project_do_stage/EyeExam/eye_test.php">EyeExams</a>
                <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Summer_Sale" class="summer-sale">Summer Sales</a>
            </div>

            <div class="nav-icons">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="/Project_do_stage/Files/dashboard.php" class="signup-btn" > Hi . ' . htmlspecialchars($_SESSION['username']) . ' </a>';
                } else {
                    echo '<a href="/Project_do_stage/Files/login.php" class="signup-btn-nologin" >Sign up</a>';;
                }
                ?>
                <a href="/Project_do_stage/Files/find_store.php" class="lens-types-link">Find a Store</a>
                <a href="/Project_do_stage/Files/search.php"><i class="fas fa-search"></i></a>
                <a href="/Project_do_stage/GalleryFiles/favorites.php"><i class="far fa-heart"></i></a>

                <div class="cart-icon" id="cartIcon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count" id="cartCount">0</span>
                </div>
            </div>

            <button class="mobile-menu-btn"><i class="fas fa-bars"></i></button>
        </div>

        <!--Include The Cart-->
        <section>
            <?php
            include("C:/xampp/htdocs/Project_do_stage/Files/cart_action.php")
            ?>
        </section>

        <!-- EyeGlasses Mega Menu -->
        <div class="mega-menu" id="EyeGlasses-menu">
            <div class="mega-menu-column">
                <h3>Collections</h3>
                <ul>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_All">EyeGlasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_Women">Women's EyeGlasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_Men">Men's EyeGlasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_Kids">Kids's EyeGlasses</a></li>

                </ul>
            </div>

            <div class="mega-menu-column">
                <h3>Features</h3>
                <ul>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_Materials">EyeGlasse Material</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_Frames">EyeGlasse Frames</a></li>
                    <li><a style="color: red;" href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Bestsellers">BestSellers</a></li>
                    <li><a style="color: red;" href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Under20">Under 20$</a></li>
                </ul>
            </div>
            <div class="dropdown-promos">
                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_Women">
                        <div class="promo-image">
                            <img id="logoPhotos" src="https://images.aceandtate.com/image/upload/ar_0.8,g_face,c_fill,h_3840,w_3840/q_75/:spree/public/spree/products/18346/original/morris-fizz-head-female.jpg" alt="Premium Brands">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Shop Women</h4>
                                    <p>Polarized Lenses</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_Men">
                        <div class="promo-image">
                            <img id="logoPhotos" src="https://images.aceandtate.com/image/upload/ar_0.8,g_face,c_fill,h_3840,w_3840/q_75/:spree/public/spree/products/16740/original/alfred-caramel-havana-head-male.jpg" alt="Transitions Lenses">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Shop Men</h4>
                                    <p>Blue Light Filter</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sunglasses Mega Menu -->
        <div class="mega-menu" id="Sunglasses-menu">
            <div class="mega-menu-column">
                <h3>Collections</h3>
                <ul>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sun_All">SunGlasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sun_Men">Men's SunGlasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sun_Women">Women's SunGlasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sun_Kids">Kids's SunGlasses</a></li>
                </ul>
            </div>

            <div class="mega-menu-column">
                <h3>Features</h3>
                <ul>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sun_Frames">SunGlasses Frames</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sun_Materials">SunGlasses Material</a></li>
                    <li><a style="color: red;" href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Bestsellers">BestSellers</a></li>
                    <li><a style="color: red;" href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Discount">Discount 50%</a></li>
                </ul>
            </div>
            <div class="dropdown-promos">
                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sun_Men">
                        <div class="promo-image">
                            <img id="logoPhotos" src="https://images.aceandtate.com/image/upload/ar_0.8,g_face,c_fill,h_3840,w_3840/q_75/:spree/public/spree/products/16373/original/monty-fizz-sun-head-male.jpg" alt="Premium Brands">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Shop Men</h4>
                                    <p>Anti-Reflective</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sun_Women">
                        <div class="promo-image">
                            <img id="logoPhotos" src="https://images.aceandtate.com/image/upload/ar_0.8,g_face,c_fill,h_3840,w_3840/q_75/:spree/public/spree/products/18414/original/pierce-tigerwood-sun-head-female.jpg" alt="Transitions Lenses">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Shop Women</h4>
                                    <p>Polycarbonate</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Accessories Mega Menu -->
        <div class="mega-menu" id="accessories-menu">
            <div class="mega-menu-column">
                <h3>Accessories</h3>
                <ul>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Acces_all">All Accessories</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Acces_felt">Felt / EyeWear</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Acces_cords">Cords</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Acces_case/cleankits">Cases & Cleaning Kits</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Acces_clips">Clips-Ons</a></li>
                </ul>
            </div>

            <div class="dropdown-promos-acces ">
                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Acces_case/cleankits">
                        <div class="promo-image">
                            <img id="logoPhotos" src="https://images.aceandtate.com/image/upload/c_lfill,h_3840,w_3840/c_fill,h_1200,w_1200,x_100,y_80,q_100/:spree/public/spree/products/11547/original/cleaning-kit-puik-front.jpg" alt="Premium Brands">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Cleaning Kits</h4>
                                    <p>You missed a spot</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Acces_case/cleankits">
                        <div class="promo-image">
                            <img id="logoPhotos" src="https://images.aceandtate.com/image/upload/c_fill,h_3840,w_3840,g_face,q_85/:spree/public/spree/products/11546/original/3-pack-rpet-cloths-2022-side.jpg" alt="Transitions Lenses">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Lens Cloth</h4>
                                    <p>Goodbye, dirty lenses</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Acces_case/cleankits">
                        <div class="promo-image">
                            <img id="logoPhotos" src="https://i.warbycdn.com/s/c/1d9a9fdb98376f4d5cf47fd22b321cae4c6e4504" alt="Felt Cases">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Cases</h4>
                                    <p>Premium protection</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- sports Mega Menu -->
        <div class="mega-menu" id="sports-menu">
            <div class="mega-menu-column">
                <h3>Collections</h3>
                <ul>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_all">All Sports Glasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_running">Running Glasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_cycling">Cycling Glasses</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_swimming">Swimming Goggles</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_winter">Winter Sports</a></li>
                </ul>
            </div>

            <div class="mega-menu-column">
                <h3>Features</h3>
                <ul>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_Shapes">Sports Glasses Shapes</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_Frames">Impact-Resistant Frames</a></li>
                    <li><a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_Top">Top Selling Sports Glasses</a></li>
                    <li><a style="color: red;" href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_Discount">Sports Glasses 40% off</a></li>
                </ul>
            </div>

            <div class="dropdown-promos">
                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_running">
                        <div class="promo-image">
                            <img src="https://media.istockphoto.com/id/2190370373/photo/portrait-of-an-athlete-drinking-water-sport.webp?a=1&b=1&s=612x612&w=0&k=20&c=7Qc9U8dD633qmX0Wd55r_z_4mc1BSoN7tYFya195X-k=" alt="Running Glasses">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Summer Glasses</h4>
                                    <p>Lightweight & Secure Fit</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="promo-card">
                    <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Sports_winter">
                        <div class="promo-image">
                            <img src="https://plus.unsplash.com/premium_photo-1682091664140-d2a290b563db?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8c2tpZSUyMHNwb3J0JTIwZ2xhc3Nlc3xlbnwwfHwwfHx8MA%3D%3D" alt="Cycling Glasses">
                            <div class="promo-overlay">
                                <div class="promo-text">
                                    <h4>Winter Glasses</h4>
                                    <p>Aerodynamic Design</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </nav>

    <!--navbar2-->
    <nav class="navbar2">
        <div class="video-background">
            <video autoplay muted loop>
                <source src="/Project_do_stage/Assets/Videos/goldenabstract-3.mp4" type="video/mp4">
            </video>
        </div>
        <a href="/Project_do_stage/home.php">
            <img class="logo2" src="/Project_do_stage/Assets/Logos/logo_without_ketba.png" alt="Logo">
        </a>

        <button class="scroll-top" id="scrollTopBtn">
            <i class="fas fa-arrow-up"></i>
        </button>
    </nav>

</header>

<!--this above the navbar -->
<script>
    //above the navbar logic

    const messages = [
        "Buy One Get One Free + 20% Off Lenses | Free Shipping on Orders Over $50! 🎉",
        "New Summer Collection Just Dropped — Shop Now! 😎",
        "Book Your Free Eye Test at a Store Near You 👓"
    ];

    let i = 0;
    const bar = document.getElementById("announcement-bar");

    setInterval(() => {
        bar.classList.add("fade-out");

        setTimeout(() => {
            i = (i + 1) % messages.length;
            bar.textContent = messages[i];
            bar.classList.remove("fade-out");
        }, 250); // Wait for fade-out before changing text
    }, 3000);
</script>

<!--dropdown menu-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all menu links and menus
        const menuLinks = {
            'EyeGlasses-link': 'EyeGlasses-menu',
            'Sunglasses-link': 'Sunglasses-menu',
            'lens-types-link': 'lens-types-menu',
            'accessories-link': 'accessories-menu',
            'sports-link': 'sports-menu'
        };

        // Initialize all menus
        Object.entries(menuLinks).forEach(([linkClass, menuId]) => {
            const link = document.querySelector(`.${linkClass}`);
            const menu = document.getElementById(menuId);

            if (link && menu) {
                // Show menu on hover
                link.addEventListener('mouseenter', function() {
                    // Hide all menus first
                    document.querySelectorAll('.mega-menu').forEach(m => {
                        m.classList.remove('active');
                    });
                    // Show current menu
                    menu.classList.add('active');
                });
            }
        });

        // Get the simple links that shouldn't trigger menus
        const simpleLinks = document.querySelectorAll('.nav-links a:not(.EyeGlasses-link):not(.Sunglasses-link):not(.lens-types-link):not(.accessories-link):not(.sports-link)');

        // Hide menus when hovering over simple links
        simpleLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                document.querySelectorAll('.mega-menu').forEach(menu => {
                    menu.classList.remove('active');
                });
            });
        });

        // Hide menus when mouse leaves nav
        document.querySelector('nav').addEventListener('mouseleave', function() {
            document.querySelectorAll('.mega-menu').forEach(menu => {
                menu.classList.remove('active');
            });
        });


    });
</script>

<!--this the navbar1 &2 logic -->
<script>
    window.addEventListener("scroll", function() {
        const navbar1 = document.querySelector(".navbar1");
        const navbar2 = document.querySelector(".navbar2");
        if (!navbar1 || !navbar2) {
            console.error("Les éléments .navbar01 ou .navbar n'ont pas été trouvés.");
            return;
        }

        if (window.scrollY > 500) {

            navbar2.style.opacity = "1";
            navbar2.style.pointerEvents = "auto";
        } else {
            navbar1.style.opacity = "1";
            navbar2.style.opacity = "0";
            navbar2.style.pointerEvents = "none";
        }
    });


    // Scroll to top button functionality
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>