<!-- to connect database -->

<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "pharmacy_p";

$web = new mysqli($host, $user, $password, $database);

// Check connection
if ($web->connect_error) {
    die("Connection failed: " . $web->connect_error);
}

session_start();
?>



