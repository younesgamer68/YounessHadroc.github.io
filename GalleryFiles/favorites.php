<?php
session_start();
include("../NavBar/navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            --accent-color: #ffdd92ff;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .go-back {
            display: inline-flex;
            align-items: center;
            color: #b5985a;
            text-decoration: none;
            margin-bottom: 20px;
            transition: var(--transition);
            font-weight: 500;

            font-family: big;
        }

        .go-back i {
            margin-right: 8px;
            transition: var(--transition);
        }

        .go-back:hover {
            color: var(--secondary-color);
            transform: translateX(-3px);
        }

        .go-back:hover i {
            transform: translateX(-3px);
        }

        .favorites-header {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: var(--dark-color);
            font-weight: 500;
            position: relative;
            padding-bottom: 15px;
            padding-left: 50px;
            font-family: big;
        }

        .favorites-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50;
            width: 10%;
            height: 4px;
            background: linear-gradient(to right, #ffdd92ff, #b5985a);
            border-radius: 2px;
        }

        .favorites-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .favorite-item {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .favorite-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        .favorite-image-container {
            background: linear-gradient(135deg, #e4c27841 0%, #ffffffff 100%);
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 250px;
        }

        .favorite-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: var(--transition);
        }

        .favorite-item:hover .favorite-image {
            transform: scale(1.05);
        }

        .favorite-details {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .favorite-name {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #24262b;
            font-weight: 550;
            font-family: medium;
        }

        .favorite-name::first-letter {
            text-transform: uppercase;
        }

        .favorite-price {
            color: #24262b;
            margin-bottom: 12px;
            font-size: 1.2rem;
            font-family: small;
        }

        .favorite-color {
            color: #24262b;
            margin-bottom: 15px;
            font-size: 0.9rem;
            font-family: small;

        }

        .remove-favorite {
            color: red;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            font-weight: 500;
            margin: auto;
            padding: 8px 0;
            transition: var(--transition);
            font-family: small;
        }

        .remove-favorite i {
            margin-right: 8px;
            transition: var(--transition);
        }

        .remove-favorite:hover {
            color: #b5985a;
        }

        .remove-favorite:hover i {
            transform: scale(1.1);
        }

        .empty-favorites {
            text-align: center;
            padding: 60px 20px;
            color: var(--gray-color);
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            max-width: 600px;
            margin: 0 auto;
        }

        .empty-favorites i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #24262b;
        }

        .empty-favorites p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-family: big;
        }

        .empty-favorites .btn {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid #24262b;
            color: #24262b;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            font-family: medium;
        }

        .empty-favorites .btn:hover {
            border: 1px solid #b5985a;
            color: #b5985a;
            transform: scale(1.03);
        }

        @media (max-width: 768px) {
            .favorites-header {
                font-size: 2rem;
            }

            .favorites-grid {
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px 15px;
            }

            .favorites-header {
                font-size: 1.8rem;
            }

            .favorites-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>



    <div class="container">
        <a href="../home.php" class="go-back">
            <i class="fas fa-arrow-left"></i>
            Back to Gallery
        </a>
        <h1 class="favorites-header">My Favorites</h1>
        <div id="favoritesContainer" class="favorites-grid">
            <!-- Favorites will be loaded here -->
        </div>
        <div id="emptyFavorites" class="empty-favorites" style="display: none;">
            <i class="far fa-heart"></i>
            <p>Your favorites list is empty</p>
            <a href="/Project_do_stage/GalleryFiles/MainGallery.php?category=Eye_All" class="btn">Browse Products</a>
        </div>
    </div>

    <!--Footer section-->
    <footer>
        <?php
        include("../Footer/footer_css.html");
        ?>
    </footer>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadFavorites();
    });

    function loadFavorites() {
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        let container = document.getElementById('favoritesContainer');
        let emptyMsg = document.getElementById('emptyFavorites');

        container.innerHTML = '';

        if (favorites.length === 0) {
            emptyMsg.style.display = 'block';
            return;
        }

        emptyMsg.style.display = 'none';

        favorites.forEach(product => {
            let item = document.createElement('div');
            item.className = 'favorite-item';
            item.innerHTML = `
                <div class="favorite-image-container">
                    <img src="${product.image}" alt="${product.name}" class="favorite-image">
                </div>
                <div class="favorite-details">
                    <div class="favorite-name">${product.name}</div>
                    <div class="favorite-price">${product.price}</div>
                    <div class="favorite-color">Color: ${product.color}</div>
                    <div class="remove-favorite" onclick="removeFavorite(${product.id}, this)">
                        <i class="fas fa-times"></i> Remove
                    </div>
                </div>
            `;
            container.appendChild(item);
        });
    }

    function removeFavorite(productId, element) {
        let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
        favorites = favorites.filter(fav => fav.id !== productId);
        localStorage.setItem('favorites', JSON.stringify(favorites));

        // Remove the item from UI
        element.closest('.favorite-item').remove();

        // Show empty message if no favorites left
        if (favorites.length === 0) {
            document.getElementById('emptyFavorites').style.display = 'block';
        }
    }
</script>

</html>