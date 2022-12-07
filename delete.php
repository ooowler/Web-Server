<?php $get_id = $_GET['id'];

$connection = mysqli_connect('127.0.0.1',  'root', '', 'task');

if (!$connection) {
    echo 'Не удалось подключиться к БД';
    echo mysqli_connect_error();
    exit();
}

$sql="DELETE FROM TASK WHERE id = '$get_id'";
mysqli_query($connection, $sql);

header('location: index.php?page_layout=list');
exit;
?>