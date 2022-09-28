<?php
require_once "repository_db.php";
require_once "webshop.php";

function showWebshopDetailsPageHeader() {
    echo '$product['name']';
}

function showWebshopDetailsContent ($data) {
    $data = $data['products'];
    echo '<div class="webshop-container">'
    foreach ($product as $product) {
        showDetailsWebshopProduct($product);
    } 
    echo '</div>';

}

function showDetailsWebshopProduct($product) {
    echo '<div class="webshop-item">';
    echo '<a href="index.php?page=detail&id=' . $product['id'] .'">';
    echo '<div class="center"><img src="Images/' . $product['img_url'] .'" alt="' . $product['name'] . '" height="400px" ></div>' ;
    echo '<div class="center">Naam: ' . $product['name'] . '</div>';
    echo '<div class="center">Beschrijving: ' . $product['description'] . '</div>';
    echo '<div class="center">Prijs: ' . $product['price_per_one'] . '</div>';
    echo '</a>';
    echo '</div>';
}
?>