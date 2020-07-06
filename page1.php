<!DOCTYPE html>
<html>
<head>
  <title>Мой сайт</title>
  <link rel="stylesheet" href="style/style-page1.css">
</head>
<body>

<h2 align="center">Все товары:<hr></h1>

<?php 
require "db.php";

$items = R::getAssoc('SELECT * FROM shop');

foreach ($items as $item){
echo 'Наименование товара:   ' . $item['name'] . '<br>';
echo 'Категория:   ' . $item['categorie_id'] . '<br>';
echo 'Цена:   ' . $item['price'] . ' рублей.' . '<br><br>';
}

?>

<br>
<h2 align="center">Сортировка по категории:</h2>

<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'mysite');

if($connection == false){
    print('Не удалось подключиться к базе данных.');
    print (mysqli_connect_error);
    exit();
}

$count = 1;

$query = mysqli_query($connection, "SELECT categorie_name FROM cat_id");
while ($id = mysqli_fetch_assoc($query)){

    print $id['categorie_name'] . ' - ' . $count . '<br>' ;
    $count++;

}


?>

 <form method="GET" action="/sort.php" align="center">
   <p><select name="cat">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
   </select></p>
    <input type="submit" value="Отсортировать">
  </form>

<br>
<br>
<a href="site.php">На главную</a>



</body>
</html>




