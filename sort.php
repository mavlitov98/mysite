<!DOCTYPE html>
<html>
<head>
	<title>Мой сайт</title>
    <link rel="stylesheet" type="text/css" href="style/style-page1.css">
</head>
<body>
<h2 align="center">Отсортированные товары:<hr></h1>

<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'mysite');

if($connection == false){
    print('Не удалось подключиться к базе данных библиотеки.');
    print (mysqli_connect_error);
    exit();
}

$cat = $_GET['cat'];

$items = mysqli_query($connection, "SELECT * FROM shop WHERE categorie_id = '$cat'");

foreach ($items as $item){
echo 'Наименование товара:   ' . $item['name'] . '<br>';
echo 'Категория:   ' . $item['categorie_id'] . '<br>';
echo 'Цена:   ' . $item['price'] . ' рублей.' . '<br><br>';
}


echo "<a href='page1.php'>Назад</a>";
?>

</body>
</html>





