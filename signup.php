<!DOCTYPE html>
<html>

<head>
	<title>Мой сайт</title>
	<link rel="stylesheet" href="style/style-signup.css">
</head>
<body>

<?php 
require "db.php";

$data = $_POST;
if(isset($data['do_sign_up']))

{

	$errors = array();
	if(trim($data['login']) == ''){

		$errors[] = 'Введите имя пользователя!';
	}

	if($data['password'] == ''){

		$errors[] = 'Введите пароль!';
	}

	if($data['password2'] != $data['password']){

		$errors[] = 'Пароли не совпадают!';
	}


	if(R::count("users", "login = ?", array($data['login'])) > 0){

		$errors[] = 'Пользователь с таким логином уже зарегистрирован!';
	}


	if(empty($errors)){

		$user = R::dispense('users'); 
		$user -> login = $data['login'];
		$user -> password = password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);
	
		echo ("<strong><p align='center'>Вы успешно зарегистрированы! Перенаправление на страницу авторизации...</p></strong>");
		echo("<script>location.href='login.php'</script>");

		
	}
	
	else{

		echo '<div align="center" style="color: red;">'. array_shift($errors) . '</div><hr>';
	}

}

?>

<form class="box" action="/signup.php" method="POST"> 
<h1>Регистрация</h1>
<input type="text" placeholder="Имя пользователя" name="login" value="<?php echo @$data['login']; ?>">
<input type="password" placeholder="Пароль" name="password" value="<?php echo @$data['password']; ?>">
<input type="password" placeholder="Повтор пароля" name="password2" value="<?php echo @$data['password2']; ?>">
<input type="submit" value="Зарегистрироваться" name="do_sign_up">

</form>

</body>
</html>