<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mynot";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı Yok " . $conn->connect_error);
}
//echo "Bağlantı Başarılı"

?>