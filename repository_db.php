<?php
function connectToDatabase () {
    $servername = "localhost";
    $username = "WebShopUser";
    $password = "Eemnes11!";
    $dbname = "webshop_hanne";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    checkConnection ($conn);
    return $conn;
}

function checkConnection ($conn) {
if (!$conn) {
  throw new Exception("connection with database has failed" . mysqli_connect_error());
}
}
function checkResult ($conn, $result, $sql) {
    if ($result === false) {
        throw new Exception("query failed. sql: ". $sql. " Error: ". mysqli_error($conn));
    }
}

function closeDatabase ($conn) {
    mysqli_close($conn); 
}

function findUserByEmail ($email) {
    $userArray = null;
    $conn = connectToDatabase();
    $id = mysqli_real_escape_string($conn, $id);
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    try {
        $sql = "SELECT id, name, email, password FROM users WHERE email = '$email'"; 
        $result = mysqli_query($conn, $sql);
        checkResult($conn, $result, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $userArray = mysqli_fetch_assoc($result);
        } 
        return $userArray;
    }
    finally {
        closeDatabase($conn);
    }
}

function saveUser ($email, $name, $password) {
    $conn = connectToDatabase();
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    try {
        $sql = "INSERT INTO users (name, email , password)
                    VALUES ('$name', '$email', '$password')";

        $result = mysqli_query($conn, $sql);
        checkResult($conn, $result, $sql);
    }
    finally {
        closeDatabase($conn);
    }
}

function getAllProducts () {
    $productsArray = Array ();
    $conn = connectToDatabase();
    try {
        $sql = "SELECT id, name, img_url, price_per_one FROM products"; 
        $result = mysqli_query($conn, $sql);
        checkResult($conn, $result, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $productsArray [$id] = $row;
            }
        }
        return $productsArray;
    }    
    finally {
        closeDatabase($conn);
    }
}

function getProductById ($productId) {
    $productArray = null;
    $conn = connectToDatabase();
    try {
        $sql = "SELECT * FROM products WHERE id = '$productId'"; 
        $result = mysqli_query($conn, $sql);
        checkResult($conn, $result, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $productArray = mysqli_fetch_assoc($result);
        } 
        return $productArray;
    }
    finally {
        closeDatabase($conn);
    }
}

?>