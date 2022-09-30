<?php
session_start();

function dologinUser($name) {
    $_SESSION['loggedInName'] = $name;
    $_SESSION['shoppingCart'] = array (); /* we doen productid => hoeveelheid (quantity) */
}

function isUserLoggedIn() {
    return isset($_SESSION['loggedInName']);
}
function getLoggedInUsername() {
    return $_SESSION["loggedInName"];
}

function doLogoutUser() {
    unset($_SESSION['loggedInName']);
    unset($_SESSION['shoppingCart']);
}

function addProductToShoppingCart($productid) {
    if (array_key_exists($productid, $_SESSION['shoppingCart'])) {
        $_SESSION['shoppingCart'][$productid] +=1; /* dit is verkort voor als er al 1 van dit product in de shoppingcart zit, doe +1 */
    } else {
        $_SESSION['shoppingCart'][$productid] = 1;
    }
}

function getShoppingCartData () {
    return $_SESSION['shoppingCart'];
}