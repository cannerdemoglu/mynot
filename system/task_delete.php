<?php
session_start();
include("../includes/header.php");

if(!isset($_SESSION["u_ID"])){
    http_response_code(401);
    exit;
}
$userID = $_SESSION["u_ID"];
$taskID = $_POST["taskID"];

$stmt = $conn->prepare(
    "DELETE FROM tasks
     WHERE taskID = ? AND uID = ? AND isCompleted = 1"
);

$stmt->bind_param("ii", $taskID, $userID);
$stmt->execute();

echo"Başarılı";

?>