<?php
$dom = new DOMDocument();
$dom->load('data/data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
$product=$products->getElementsByTagName('product');
$index = $product->length;
if ($index != 0) {
    $id=$product[$index-1]->getElementsByTagName('id')->item(0)->nodeValue+1;
} else {
    $id = 1;
}

if(isset($_POST['sbm'])){
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];
    $new_prd = $dom->createElement('product');

    $node_id = $dom->createElement('id', $id);
    $new_prd->appendChild($node_id);

    $node_task = $dom->createElement('task', $task);
    $new_prd->appendChild($node_task);

    $node_deadline = $dom->createElement('deadline', $deadline);
    $new_prd->appendChild($node_deadline);

    $products->appendChild($new_prd);

    if (strlen($task) <= 2) {
        header('location: index.php?page_layout=create');
        exit("Enter task, which len more than 2");
    }

    $dom->formatOutput=true;
    $dom->save('data/data.xml')or die('Error');
    $error = "";
    header('location: index.php?page_layout=list');
    exit();
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