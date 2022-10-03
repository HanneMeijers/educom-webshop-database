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
    echo '<div class="table-responsive">
    <table class="table-bordered">
        <tr class="table-headers">
            <th>Product</th>
            <th>Aantal</th>
            <th>Prijs</th>
            <th>Subtotal</th>
            <th>Totaal</th>
            <th>Verwijder</th> 
            /* verwijder moet button worden, geen table titel */
        </tr>';
    foreach ($shoppingCartRows as $shoppingCartRow) {
        showShoppingCartRow ($shoppingCartRow);
    }
      
    echo '   </tr>
    </table>
    </div>'; 

}

function showShoppingCartRow($shoppingCartRow) { 
    echo '<tr>';
    echo '<td>'. $shoppingCartRow['product_name']. '</td>';
    echo '<td>'. $shoppingCartRow['quantity']. '</td>';
    echo '<td>'. $shoppingCartRow['price']. '</td>';
    echo '<td>'. $shoppingCartRow['subtotal']. '</td>';
    echo '<td>'. $shoppingCartRow['total_price']. '</td>';
    echo '</tr>';
    
    /*maak hier 1 rij vd tabel met de data uit shoppingCartRow*/
}











