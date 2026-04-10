<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Urenregistratie";

// verbinding maken
$con = new mysqli($servername, $username, $password, $dbname);

// checken of het werkt
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>