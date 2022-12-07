<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <title>Task List</title>
</head>
<body>

<?php
$dom = new DOMDocument();
$dom->load('data/data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
?>


<ul id="myUL">
    <li id="const">
        <a class="head">ID</a>
        <a class="head">Task</a>
        <a class="head">DeadLine</a>
        <a class="head"></a>
    </li>
    <?php
    $i = 1;
    $product=$products->getElementsByTagName('product');
    foreach ($product as $tmp){
        ?>
        <li>
            <a href="index.php?page_layout=update&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> <?php echo $tmp->getElementsByTagName('id')->item(0)->nodeValue?></a>
            <a href="index.php?page_layout=update&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> <?php echo $tmp->getElementsByTagName('task')->item(0)->nodeValue?></a>
            <a href="index.php?page_layout=update&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> <?php echo $tmp->getElementsByTagName('deadline')->item(0)->nodeValue?></a>
            <a onclick="return Del('<?php echo $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue;?>')" href="index.php?page_layout=delete&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> Delete </a>
        </li>
        <?php
        $i++;
    } ?>
</ul>



<div class="CRUD">
    <a href="create.php">добавить запись</a>
</div>

<script src="script/main.js"></script>

</body>
</html>
