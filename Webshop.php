<?php
require_once "repository_db.php";
function getWebshopData () {
    $products = array();
    $genericErr = '';
    try {
    $products = getAllProducts (); 
    }
    catch (Exception $exception) {
        $genericErr = "Sorry, door een technische fout is de web shop niet bereikbaar";
        logToServer("get webshop data failed " . $exception->getMessage());
    }
    return array('products' => $products, 'genericErr' => $genericErr);
}

function showWebshopHeader () {
    echo 'Wijnwinkel';
}

function showWebshopContent($data) {
    $products = $data['products'];
    echo '<div class="webshop-container">';
    foreach ($products as $product) {
        showWebshopProduct($product);
    } 
    echo '</div>';
}

function showWebshopProduct($product) {
    echo '<div class="webshop-item">';
    echo '<a href="index.php?page=detail&id=' . $product['id'] .'">';
    echo '<div class="center"><img src="Images/' . $product['img_url'] .'" alt="' . $product['name'] . '" height="200px" ></div>' ;
    echo '<div class="center">Naam: ' . $product['name'] . '</div>';
    echo '<div class="center">Prijs: ' . $product['price_per_one'] . '</div>';
    echo '</a>';
    showAddToCardButton($product['id'] ); 
    echo '</div>';
}






