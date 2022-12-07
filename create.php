<?php
$connection = mysqli_connect('127.0.0.1',  'root', '', 'task');

if (!$connection) {
    echo 'Не удалось подключиться к БД';
    echo mysqli_connect_error();
    exit();
}


if(isset($_POST['sbm'])){
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];

    $task = $_POST['task'];
    $deadline = $_POST['deadline'];

    if (strlen($task) <= 2) {
        header('location: index.php?page_layout=create');
        exit("Enter task, which len more than 2");
    }


    $sql="INSERT INTO `task`(`task`, `deadline`) VALUES ('$task','$deadline')";
    mysqli_query($connection, $sql);

    header('location: index.php?page_layout=list');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Task</title>
</head>
<body>


<div id="myDIV" class="header">
    <h2 style="margin:5px">Список дел</h2>
    <br>

    <form method="post" enctype="multipart/form-data">

        <input type="text" name="task" id="task" placeholder="Введите task" required>

        <input type="text" name="deadline" id="deadline" placeholder="Введите deadline" required>

        <button name="sbm" class="addBtn" type="submit">Add</button>
    </form>
</div>

</body>
</html>