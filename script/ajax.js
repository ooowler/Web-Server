// for create.php ----

$("#sbm").on("click", function () {
    let task = $("#task").val().trim();
    let deadline = $("#deadline").val().trim();

    if (task.length <= 2) {
        alert("Enter task, which len more than 2");
        return false;
    }

    if (task.length >= 30) {
        alert("Enter task, which len less than 30");
        return false;
    }

    if (deadline.length <= 2) {
        alert("Enter task, which len more than 2");
        return false;
    }

    if (deadline.length >= 30) {
        alert("Enter task, which len less than 30");
        return false;
    }

    $.ajax({
        url: 'create.php',
        type: 'POST',
        cache: false,
        data: {'task': task, 'deadline': deadline},
        dataType: 'html',

        success: function () {
            alert("success\nyour task is: " + task + "\n" +
                "deadline is: " + deadline)
        }
    })
})
