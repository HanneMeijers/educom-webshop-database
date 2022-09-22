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
  die("Connection to server failed" . mysqli_connect_error());
}
}

function closeDatabase ($conn) {
    mysqli_close($conn); 
}

function findUserByEmail ($email) {
    $userArray = null;
    $conn = connectToDatabase();
    $sql = "SELECT id, name, email, password FROM users WHERE email = '$email'"; 
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $userArray = mysqli_fetch_assoc($result);
    } 
    closeDatabase($conn);
    return $userArray;
}

function saveUser ($email, $name, $password) {
    $conn = connectToDatabase();
    $sql = "INSERT INTO users (name, email , password)
            VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registratie voltooid";
    } else {
        echo "Error: e-mailadres al in gebruik" . $sql . "<br>" . mysqli_error($conn);
    }
    closeDatabase($conn);
}
?>