<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./Assets/Avatars/favicon.png" /> <!-- Add your favicon path -->
    <title>Eye Wear</title>

</head>

<body>

    <!--Navigation Bar-->
    <header>
        <?php
        include("./NavBar/navbar.php")
        ?>
    </header>

    <!--Main Slider-->
    <section>
        <?php
        include("./HomePage/MainSlider.html")
        ?>
    </section>

    <!-- Section-->
    <section>
        <?php
        include("./HomePage/sometexte.html")
        ?>
    </section>

    <!--Best Sellers Section-->
    <section>
        <?php
        include("./HomePage/BestGalleries.html")
        ?>
    </section>

    <!--continers Section-->
    <section>
        <?php
        include("./HomePage/continers.html")
        ?>
    </section>

    <!--bigconiners Section-->
    <section>
        <?php
        include("./HomePage/bigconiners.html")
        ?>
    </section>

    <!--Buy by FaceShape-->
    <section>
        <?php
        include("./HomePage/ShapesShop.html")
        ?>
    </section>

    <!--eyewear history text-->
    <section>
        <?php
        include("./HomePage/textads_section.html")
        ?>
    </section>

    <!--find nearby eye care ads Section-->
    <section>
        <?php
        include("./HomePage/adsSection.html")
        ?>
    </section>

    <!--Reviews Section-->
    <section>
        <?php
        include("./HomePage/reviews.html")
        ?>
    </section>

    <!--Looks Section-->
    <section>
        <?php
        include("./HomePage/LooksSection.html")
        ?>
    </section>

    <!--Texte Section-->
    <section>
        <?php
        include("./HomePage/TexteSection.html")
        ?>
    </section>

    <!--Footer section-->
    <footer>
        <?php
        include("./Footer/footer_css.html");
        ?>
    </footer>
    
</body>
</html>