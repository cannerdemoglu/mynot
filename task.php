<?php
session_start(); 

if (!isset($_SESSION["u_ID"])) {
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
<link rel="stylesheet" href="main/css/main.css">

<div id="taskWrapper">
    <div id="taskContainer">

        <div class="task-page-header">
            <h4 class="task-page-title">
                <i data-lucide="check-square" style="color: var(--Blue); width: 22px; height: 22px;"></i>
                Görevlerim
            </h4>
            <span class="badge" style="background: rgba(255,255,255,0.06); font-family: poppinsRegular; border: 1px solid rgba(255,255,255,0.08); font-size: 13px; font-weight: normal; padding: 6px 12px; border-radius: 20px;">
                Aktif: <?= count($activeTasks) ?>
            </span>
        </div>

        <div id="activeTasks">
            <?php foreach ($activeTasks as $row) { ?>
                <div class="task-item" data-id="<?= $row["taskID"] ?>">
                    <div class="flex-grow-1">
                        <?= htmlspecialchars($row["task"]) ?>
                        <div class="text-muted small">
                            <?= htmlspecialchars($row["createdAt"]) ?>
                        </div>
                    </div>
                    <button class="complete-btn" title="Görevi Tamamla">✓</button>
                </div>
            <?php } ?>
        </div>

        <div class="mt-4">
            <button class="completed-toggle-btn"
                    data-bs-toggle="collapse"
                    data-bs-target="#completedTasks">
                ✓ Tamamlananlar <span id="completedCount" class="ms-1 badge bg-secondary"><?= count($completedTasks) ?></span>
            </button>

            <div class="collapse mt-2" id="completedTasks">
                <div id="completedList">
                    <?php foreach ($completedTasks as $row) { ?>
                        <div class="task-item" data-id="<?= $row["taskID"] ?>">
                            <div class="flex-grow-1 text-decoration-line-through">
                                <?= htmlspecialchars($row["task"]) ?>
                            </div>
                            <button class="delete-btn" title="Görevi Sil">🗑</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

    <div id="gorevAdd">
        <form action="system/task_add.php" method="POST">
            <input type="text" name="task" class="form-control" placeholder="Yeni görev ekle..." required autocomplete="off">
            <button type="submit" id="gorev_add_btn">+</button>
        </form>
    </div>
</div>

<script src="system/js/task_system.js"></script>
<script>
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>
</body>
</html>
