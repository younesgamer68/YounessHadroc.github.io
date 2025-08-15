<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(-45deg, #f5f7fa, #b5985a0a, #6b696618, #b5985a);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .search-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 100px);
            padding: 20px;
        }

        .search-box {
            width: 100%;
            max-width: 800px;
            position: relative;
        }

        .search-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            color: #333;
            font-family: big;
        }

        .search-input {
            width: 100%;
            padding: 25px 30px;
            font-size: 1.5rem;
            border: 2px solid #ddd;
            border-radius: 50px;
            outline: none;
            transition: all 0.3s ease;
            font-family: small;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .search-input:focus {
            border-color: #b5985a;
            box-shadow: 0 5px 25px rgba(67, 97, 238, 0.2);
        }

        .search-button {
            position: absolute;
            right: -50px;
            top: 77%;
            transform: translateY(-50%);
            background: #b5985a;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            background: #3a0ca3;
            transform: translateY(-50%) scale(1.05);
        }

        @media (max-width: 768px) {
            .search-title {
                font-size: 2rem;
            }

            .search-input {
                padding: 20px 25px;
                font-size: 1.2rem;
            }

            .search-button {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
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

    <div class="search-container">
        <div class="search-box">
            <h1 class="search-title">What are you looking for?</h1>
            <form id="searchForm" action="../GalleryFiles/MainGallery.php" method="GET">
                <input
                    type="text"
                    class="search-input"
                    placeholder="Search for products, brands, or categories..."
                    name="query"
                    autocomplete="off"
                    autofocus
                    required>
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>



    <!-- Section-->
    <section>
        <?php
        include("../HomePage/sometexte.html")
        ?>
    </section>


    <!--continers Section-->
    <section>
        <?php
        include("../HomePage/continers.html")
        ?>
    </section>
    <!--Best Sellers Section-->
    <section>
        <?php
        include("../HomePage/BestGalleries.html")
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

</html>