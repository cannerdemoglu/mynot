<?php 
include("../config.php");
session_start();

$uID = $_SESSION['u_ID']; //Giriş yapan kullanıcı ID.
$gorev = $_POST['gorevEkle'];

// echo $gorev;


$sql = "INSERT INTO tasks (uID, task, isCompleted)
        VALUES (?, ?, 0)";

$stmt = $conn->prepare($sql);
$stmt->execute([$uID, $gorev]);

echo "Görev Başarıyla eklendi!";

?>