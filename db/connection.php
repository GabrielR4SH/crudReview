<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "creview";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name;port=$port", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; // Você pode remover isso se quiser
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
