<?php
session_start();
include("../config.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $userID = $_SESSION["u_ID"];

    if (!empty($task)) {

        $stmt = $conn->prepare(
            "INSERT INTO tasks (uID, task) VALUES (?, ?)"
        );

        $stmt->bind_param("is", $userID, $task);
        $stmt->execute();
    }
}
header("Location: ../task.php");
exit();

?>