
<?php

include("../config.php");
session_start();

$u_ID = $_SESSION['u_ID'];

$taskID = $_POST['taskID'];
$isCompleted = $_POST['isCompleted'];

$sql = "UPDATE tasks 
        SET isCompleted = ? 
        WHERE taskID = ? AND uID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $isCompleted, $taskID, $u_ID);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

?>
