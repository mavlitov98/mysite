<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<link rel="stylesheet" href="style/style-login.css">
</head>
<body>

<?php 
require "db.php";
$data = $_POST;

if(isset($data['do_login'])){

    $errors = array();
	$user = R::findOne("users", "login = ?", array($data['login']));

	if ($user){

		if(password_verify($data['password'], $user->password)){

			echo("<script>location.href='site.php'</script>");
		

		} else {

			$errors[] = 'Неверный пароль!';
		}

	} else {

		$errors[] = 'Пользователь с таким логином не найден!';
	}
		}


	if(!empty($errors)){

	echo '<div align="center" style="color: #ff0000;">' . array_shift($errors) . '</div><hr>';
		
	}

?>

<form class="box" action="login.php" method="POST">
<h1>Авторизация</h1>
<input type="text" name="login" placeholder="Логин">
<input type="password" name="password" placeholder="Пароль">
<input type="submit" value="Войти" name="do_login">
</form>

</body>
</html>







