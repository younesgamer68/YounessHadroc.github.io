<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye Test Selection</title>
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
            --accent-color: #ffdd92ff;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --border-radius: 10px;
            --dark-color: #24262b;
            --gray-color: #6c757d;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .go-back {
            display: inline-flex;
            align-items: center;
            color: var(--primary-color);
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

        .tests-header {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: var(--dark-color);
            font-weight: 500;
            position: relative;
            padding-bottom: 15px;
            padding-left: 50px;
            font-family: big;
        }

        .tests-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50px;
            width: 10%;
            height: 4px;
            background: linear-gradient(to right, var(--accent-color), var(--primary-color));
            border-radius: 2px;
        }

        .tests-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .test-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            text-align: center;
            cursor: pointer;
        }

        .test-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        .test-icon-container {
            background: linear-gradient(135deg, #e4c27841 0%, #ffffffff 100%);
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 250px;
        }

        .test-icon {
            font-size: 4rem;
            color: var(--primary-color);
            transition: var(--transition);
        }

        .test-card:hover .test-icon {
            transform: scale(1.1);
            color: var(--secondary-color);
        }

        .test-details {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .test-name {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--dark-color);
            font-weight: 600;
            font-family: medium;
            text-transform: capitalize;
        }

        .test-description {
            color: var(--gray-color);
            margin-bottom: 15px;
            font-size: 0.95rem;
            font-family: small;
        }

        .start-test {
            color: var(--primary-color);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            margin-top: auto;
            padding: 10px 0;
            transition: var(--transition);
            font-family: small;
        }

        .start-test i {
            margin-left: 8px;
            transition: var(--transition);
        }

        .start-test:hover {
            color: var(--secondary-color);
        }

        .start-test:hover i {
            transform: translateX(5px);
        }

        .disclaimer-box {
            margin-top: 50px;
            padding: 25px;
            background-color: white;
            border-radius: var(--border-radius);
            border-left: 5px solid var(--primary-color);
            position: relative;
            font-size: 0.95rem;
            color: var(--gray-color);
            box-shadow: var(--box-shadow);
            font-family: small;
        }

        .disclaimer-box::before {
            content: '⚠';
            position: absolute;
            left: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid var(--primary-color);
        }

        @media (max-width: 768px) {
            .tests-header {
                font-size: 2rem;
                padding-left: 20px;
            }

            .tests-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px 15px;
            }

            .tests-header {
                font-size: 1.8rem;
                padding-left: 10px;
            }

            .tests-grid {
                grid-template-columns: 1fr;
            }

            .test-icon-container {
                padding: 30px;
                height: 200px;
            }

            .test-icon {
                font-size: 3rem;
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

    <div class="container">
        <a href="../home.php" class="go-back">
            <i class="fas fa-arrow-left"></i>
            Back to Home
        </a>
        <h1 class="tests-header">Eye Tests</h1>

        <div class="tests-grid">
            <div class="test-card" onclick="location.href='./Eyetests/colore_test.php'">
                <div class="test-icon-container">
                    <i class="fas fa-palette test-icon"></i>
                </div>
                <div class="test-details">
                    <div class="test-name">Ishihara Test</div>
                    <div class="test-description">Assess your color vision for potential color blindness</div>
                    <div class="start-test">
                        Start Test <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>

            <div class="test-card" onclick="location.href='./Eyetests/contrast_test.php'">
                <div class="test-icon-container">
                    <i class="fas fa-eye test-icon"></i>
                </div>
                <div class="test-details">
                    <div class="test-name">Contrast Sensitivity</div>
                    <div class="test-description">Test your ability to distinguish subtle contrasts</div>
                    <div class="start-test">
                        Start Test <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>

            <div class="test-card" onclick="location.href='./Eyetests/Visual_test.php'">
                <div class="test-icon-container">
                    <i class="fas fa-chart-line test-icon"></i>
                </div>
                <div class="test-details">
                    <div class="test-name">Visual Acuity</div>
                    <div class="test-description">Measure the sharpness of your vision</div>
                    <div class="start-test">
                        Start Test <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="disclaimer-box">
            These tests are for informational purposes only and should not replace professional eye examinations. Consult an optometrist for comprehensive eye care.
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

</html>