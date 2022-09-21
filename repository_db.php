<?php
function connectToDatabase () {
$servername = "localhost3306";
$username = "WebShopUser";
$password = "Eemnes11!";
$dbname = "webshop_hanne"

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

function checkConnection ()
if (!$conn) {
  die("Connection to server failed" . mysqli_connect_error());
}
echo "Connected successfully";
}

function closeDatabase ($conn) {
    mysqli_close($conn); 
}

function findUser () {
$sql = "SELECT id, naam, e-mailadres, wachtwoord FROM users"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. "name: " . $row["naam"]. "e-mail: " . $row["e-mailadres"]. "password: " . $row["wachtwoord"]. "<br>";
  }
} else {
  echo "0 results";
}
}

function saveUser () {
$sql = "INSERT INTO users (naam, e-mailadres , wachtwoord)
VALUES ('$name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "Registratie voltooid";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}

mysqli_close($conn);
?>