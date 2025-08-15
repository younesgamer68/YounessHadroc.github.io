<?php
session_start();

if ($_POST['product_id'] == "" )
{
    // If product_id is empty, redirect to main page
    header('Location: ../Files/ErrorPage.html');
    exit();
}
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

// Redirect to another page to view the session data
header("Location: display_products.php");
exit();
?>