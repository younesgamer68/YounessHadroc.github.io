<?php
session_start();

// Check if user is logged in
if (empty($_SESSION['username'])) {
    $_SESSION['login_message'] = 'You need to login first to proceed to checkout.';
    header('Location: login.php');
    exit();
}

// Store cart data in session
if (isset($_POST['cart_data'])) {
    $cart = json_decode($_POST['cart_data'], true);
    
    // Validate the cart data
    if (is_array($cart)) {
        $_SESSION['cart'] = $cart;
        header('Location: checkout.php');
        exit();
    }
}

// If something went wrong, redirect back
header('Location: cart.php'); // Or wherever you want to redirect on error
exit();
?>