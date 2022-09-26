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


