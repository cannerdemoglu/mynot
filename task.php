<?php

include("includes/header.php");

$u_ID = $_SESSION['u_ID'];

$sql = "SELECT taskID, task, isCompleted, createdAt
        FROM tasks
        WHERE uID = ?
        ORDER BY isCompleted ASC, createdAt DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $u_ID);
$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Görevler</title>
</head>
<body>

<div id="bildirim" class="alert alert-success"></div>

<div id="taskList" class="container">

    <?php while ($gorev = $result->fetch_assoc()): ?>

        <div class="gorevList mb-3  p-3">

            <input type="checkbox"
                data-id="<?php echo $gorev['taskID']; ?>"
                <?php echo $gorev['isCompleted'] ? 'checked' : ''; ?>>

            <?php echo htmlspecialchars($gorev['task']); ?>

            <small class="text-muted">
                <?php echo $gorev['createdAt']; ?>
            </small>
        </div>

    <?php endwhile; ?>

</div>


<div id="gorevBox" class="container-fluid position-fixed bottom-0 mb-4 align-items-center justify-content-center">
    <div id="taskBox" class="container d-flex align-items-center justify-content-center mt-auto">

        <form id="gorevForm" action="system/task_add.php" method="POST"
            style="background: transparent; border:0;"
            class="form-control d-flex align-items-center justify-content-center">

            <input type="text" name="gorevEkle" id="gorevEkle"
                class="form-control" placeholder="Görev Ekle">

            <input type="submit" value="Ekle"
                class="btn btn-primary m-3" id="gorevEkleBtn">

        </form>
    </div>
</div>


<script>
document.getElementById("gorevForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("system/task_add.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log(data);

        document.getElementById("gorevEkle").value = "";

        const bildirim = document.getElementById("bildirim");

        bildirim.innerHTML = "<p>Görev Eklendi</p>";
        bildirim.style.display = "flex";
        bildirim.style.animation = "bildirimAnimasyonu 0.5s ease forwards";

        setTimeout(function() {
            bildirim.style.display = "none";
            bildirim.innerHTML = "";
            bildirim.style.animation = "";
        }, 2000);
    });
});

document.querySelectorAll("#taskList input[type='checkbox']").forEach(checkbox => {

    checkbox.addEventListener("change", function() {

        const taskID = this.dataset.id;
        const isCompleted = this.checked ? 1 : 0;

        const formData = new FormData();

        formData.append("taskID", taskID);
        formData.append("isCompleted", isCompleted);

        fetch("system/task_update.php", {
        method: "POST",
        body: formData
        })
        .then(response => response.text())
        .then(data => {
        console.log("PHP Cevabı:", data);
        })
        .catch(error => {
        console.log("Fetch Hatası:", error);
        });

    });

});

</script>

</body>
</html>

<?php include("includes/footer.php"); ?>
