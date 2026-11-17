<?php 
include("../config.php");
session_start();

$u_ID = $_SESSION['u_ID'];


$sql = "SELECT task, isCompleted, createdAt
        FROM tasks
        WHERE uID = ?
        ORDER BY isCompleted ASC, createdAt DESC";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$u_ID]);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $gorevler[] = $row;
        }

?>