<?php
session_start(); 

if(!isset($_SESSION["u_ID"])){
    header("Location: login.php");
    exit;
}

include("includes/header.php"); 

$userID = $_SESSION["u_ID"];

$stmt = $conn->prepare(
    "SELECT taskID, task, isCompleted, createdAt
    FROM tasks
    WHERE uID = ?
    ORDER BY isCompleted ASC, createdAt DESC"
);

    $stmt->bind_param("i", $userID);
    $stmt->execute();

    $result = $stmt->get_result();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Görev Listesi</title>
</head>
<body>
<div class="container-fluid bg-light min-vh-100 justify-content-center">

  <div class="container py-4">

    <h4 class="mb-3">Görevlerim</h4>

    <?php
$activeTasks = [];
$completedTasks = [];

while ($row = $result->fetch_assoc()) {
    if ($row["isCompleted"]) {
        $completedTasks[] = $row;
    } else {
        $activeTasks[] = $row;
    }
}
?>

<div id="activeTasks">

    <?php foreach ($activeTasks as $row) { ?>

        <div class="task-item bg-white border rounded-2 p-3 mb-2 d-flex align-items-center"
             data-id="<?= $row["taskID"] ?>">

            <div class="flex-grow-1">
                <?= htmlspecialchars($row["task"]) ?>
                <div class="text-muted small">
                    <?= htmlspecialchars($row["createdAt"]) ?>
                </div>
            </div>

            <button class="btn btn-success btn-sm complete-btn">✓</button>

        </div>

    <?php } ?>

</div>

    <div class="mt-4">

        <button class="btn btn-light w-100 text-start"
                data-bs-toggle="collapse"
                data-bs-target="#completedTasks">

            ✓ Tamamlananlar
            <span id="completedCount"></span>

        </button>

        <div class="collapse mt-2" id="completedTasks">
            <div id="completedList">

    <?php foreach ($completedTasks as $row) { ?>

        <div class="task-item bg-white border rounded-2 p-3 mb-2 d-flex align-items-center"
             data-id="<?= $row["taskID"] ?>">

            <div class="flex-grow-1 text-decoration-line-through text-muted">
                <?= htmlspecialchars($row["task"]) ?>
            </div>

            <button class="btn btn-danger btn-sm delete-btn">🗑</button>

        </div>

    <?php } ?>

</div>
        </div>

    </div>

</div>

    <div id="gorevAdd" class="container-fluid d-flex bg-white p-2 border-0 rounded-2">
        <form class="d-flex w-100" action="system/task_add.php" method="POST">
            <input type="text" name="task" class="form-control">
            <input type="submit" class="bg-primary border-0 rounded-1 text-white p-2" id="gorev_add_btn" value="+">
        </form>
    </div>

</div>

    <style>
        #gorevAdd {
            width:100%;
            align-items: center;
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        #gorev_add_btn {
            width: 40px;
            height: 40px;
            margin-left: 10px;
        }
    </style>
<script src="system/js/task_system.js"></script>
</body>
</html>