<?php
function handleShoppingCartActions () {
    $action = getPostDataVariabele("action");
    switch ($action) {
        case "addtocart":
            $productid = getPostDataVariabele("productid");
            addProductToShoppingCart($productid);
            break;
    }
}

function getShoppingCartData() {
    $shoppingCartRows = array ();
    $genericErr = '';
    $total = 0;
    try {
        $products = getAllProducts (); 
        foreach ( getShoppingCartData () as $productid => $quantity) {
            if (!array_key_exists($productid, $products)) {
              continue;  
            }
            $product = $products[$productid];
            $shoppingCartRow = array ('productid' => $productid, 'quantity' => $quantity, 'name' => $product['name'],
                                      'price_per_one' => $product['price_per_one'], 'image_url' => $product['image_url']);
            $subtotal = $quantity * $product['price_per_one'];
            $shoppingCartRow['subtotal'] = $subtotal;
            $total += $subtotal;
            array_push ($shoppingCartRows, $shoppingCartRow);
        }
    }
    catch (Exception $exception) {
        $genericErr = "Sorry, door een technische fout is de web shop niet bereikbaar";
        logToServer("get webshop data failed " . $exception->getMessage());
    }
    return array('shoppingCartRows' => $shoppingCartRows, 'genericErr' => $genericErr, 'total' => $total);

}

function showShoppingCartHeader () {
    echo 'Winkelwagen';
}

function showShoppingCartContent($data) {
    $shoppingCartRows = $data['shoppingCartRows'];
    echo ''; /* hier moet de start van de tabel + de headers tabel */
    foreach ($shoppingCartRows as $shoppingCartRow) {
        showShoppingCartRow ($shoppingCartRow);
    }
    echo ''; /*hier einde vd tavbel */

}

function showShoppingCartRow($shoppingCartRow) { 
    echo '<tr>';
    echo '<td>'. $shoppingCartRow['product_name']. '</td>';
    echo '<td>'. $shoppingCartRow['quantity']. '</td>';
    
    /*maak hier 1 rij vd tabel met de data uit shoppingCartRow*/
}











