<?php 
session_start();
include("../config.php");

if (!isset($_SESSION["u_ID"])) {
    http_response_code(401);
    exit;
}

$userID = $_SESSION["u_ID"];
$taskID = $_POST["taskID"];

$stmt = $conn->prepare(
    "UPDATE tasks
     SET isCompleted = 1
     WHERE taskID = ? AND uID = ?"
);

$stmt->bind_param("ii", $taskID, $userID);
$stmt->execute();

echo "success";
?>
