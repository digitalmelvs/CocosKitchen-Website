<?php

    // this is connected to m_menuPage.php to show the cart beside the order products

include_once "conn_db.php";

// If the user submitted a form to add an item to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['item_id']) && isset($_POST['item_qty']))  {
    // Get the item ID and quantity from the form
    $item_id = $_POST['item_id'];
    $item_qty = $_POST['item_qty'];

    // If the item is already in the cart, update its quantity
    if (isset($_SESSION['cart'][$item_id])) {
        $_SESSION['cart'][$item_id] += $item_qty;
    } else {
        // Otherwise, add the item to the cart with the specified quantity
        $_SESSION['cart'][$item_id] = $item_qty;
    }

    // Redirect the user back to the order display page
    header('Location: m_menuPage.php');
    exit;
}

// If the user wants to remove an item from the cart
if (isset($_GET['remove'])) {
    // Get the item ID to remove
    $item_id = $_GET['remove'];

    // Remove the item from the cart
    unset($_SESSION['cart'][$item_id]);

    // Redirect the user back to the cart page
    header('Location: m_menuPage.php');
    exit;
}
