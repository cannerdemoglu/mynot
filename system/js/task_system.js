document.addEventListener("DOMContentLoaded", function () {

    const activeTasks = document.getElementById("activeTasks");
    const completedList = document.getElementById("completedList");
    const completedCount = document.getElementById("completedCount");

    function updateCount() {
        completedCount.textContent = completedList.children.length;
    }

    document.addEventListener("click", async function (e) {

        // Görevi tamamla
        const completeBtn = e.target.closest(".complete-btn");

        if (completeBtn) {

            const task = completeBtn.closest(".task-item");
            const formData = new FormData();

            formData.append("taskID", task.dataset.id);

            completeBtn.disabled = true;

            try {
                const response = await fetch("system/task_update.php", {
                    method: "POST",
                    body: formData
                });

                if (!response.ok) {
                    completeBtn.disabled = false;
                    return;
                }

                const result = await response.text();

                if (result.trim() === "success") {

                    task.querySelector(".flex-grow-1").classList.add(
                        "text-decoration-line-through",
                        "text-muted"
                    );

                    completeBtn.remove();

                    const deleteBtn = document.createElement("button");
                    deleteBtn.className = "btn btn-danger btn-sm delete-btn";
                    deleteBtn.textContent = "🗑";

                    task.appendChild(deleteBtn);
                    completedList.prepend(task);

                    updateCount();
                } else {
                    completeBtn.disabled = false;
                    alert("Görev tamamlanamadı.");
                }

            } catch (error) {
                completeBtn.disabled = false;
                alert("Sunucu bağlantı hatası!");
                console.error(error);
            }
        }

        // Görevi sil
        const deleteBtn = e.target.closest(".delete-btn");

        if (deleteBtn) {

            if (!confirm("Görevi kalıcı olarak silmek istiyor musun?")) return;

            const task = deleteBtn.closest(".task-item");
            const formData = new FormData();

            formData.append("taskID", task.dataset.id);

            deleteBtn.disabled = true;

            try {
                const response = await fetch("system/task_delete.php", {
                    method: "POST",
                    body: formData
                });

                if (!response.ok) {
                    deleteBtn.disabled = false;
                    return;
                }

                const result = await response.text();

                if (result.trim() === "success") {
                    task.remove();
                    updateCount();
                } else {
                    deleteBtn.disabled = false;
                    alert("Görev silinemedi.");
                }

            } catch (error) {
                deleteBtn.disabled = false;
                alert("Sunucu bağlantı hatası!");
                console.error(error);
            }
        }

    });

    updateCount();

});