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

function doQuery () {
$sql = "INSERT INTO users (id, naam, e-mailadres, wachtwoord);
VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')";





















if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: kan gegevens niet toevoegen" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn); 





function selectUsers ()
$sql = "SELECT id, naam, e-mailadres, wachtwoord  FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. "Naam: " . $row["naam"]. "E-mailadres " . $row["e-mailadres"]. "Wachtwoord " . $row["wachtwoord"]."<br>";
  }
} else {
  echo "0 results";
}


?>