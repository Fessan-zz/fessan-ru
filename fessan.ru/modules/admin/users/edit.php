<?php

Core::$META['title'] = 'Редактировать пользователя';


$users = q("
	SELECT *
	FROM `users`
	WHERE `id` = ".(int)$_GET['key2']."
  	LIMIT 1
");
$row = $users->fetch_assoc();

if(isset($_POST['add']) && (isset($_POST) or isset($_POST['password']) or isset($_POST['email']) or isset($_POST['age']) or isset($_POST['access'])) ) {
	foreach($_POST as $k => $v) {
		$_POST[$k] = trim($v);
	}
	$errors = [];
	if(empty($_POST['login'])) {
		$errors['login'] = 'Вы не заполнили логин';
	}
	elseif(!preg_match('#^[a-zA-Z][a-zA-Z0-9-_\.]{2,20}$#ui', $_POST['login'])) {
		$errors['login'] = 'Вы ввели неверный логин';
	}
	if(mb_strlen($_POST['password']) < 5 and !empty($_POST['password'])) {
		$errors['password'] = 'Пароль должен быть длинее 4х символов';
	}
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Вы не заполнили email';

	}

	$res = q("
		SELECT `id`
		FROM `users`
		WHERE `login` = '".trimALL(es($_POST['login']))."'
		AND  NOT `id` = ".(int)$_GET['key2']."
		LIMIT 1
		");

	if($res->num_rows) {
		$errors['login'] = 'Такой логин уже существует';
	}

	$res2 = q("
		SELECT `id`
		FROM `users`
		WHERE `email` = '".trimALL(es($_POST['email']))."'
		AND  NOT `id` = ".(int)$_GET['key2']."
		LIMIT 1
		");
	if($res2->num_rows) {
		$errors['email'] = 'Такой email уже существует';
	}


	if(!count($errors)) {

		if(!count($errors) && ($_POST['login'] != $row['login'])) {
			q("
			UPDATE `users` SET
			`login` 			= '".trimALL(es($_POST['login']))."'
			WHERE `id`          = ".(int)$_GET['key2']."
			");
			$_SESSION['info'] = 'Логин был изменен';
		}
		if(!count($errors) && !empty($_POST['password'])) {
			q("
			UPDATE `users` SET 
			`password`		    = '".trimALL(es(myHash($_POST['password'])))."'
			WHERE `id`          = ".(int)$_GET['key2']."
			");
			$_SESSION['info'] = 'Пароль был изменен';
		}
		if(!count($errors) && ($_POST['email'] != $row['email'])) {
			q("
			UPDATE `users` SET 
			`email`		    	= '".es($_POST['email'])."'
			WHERE `id`          = ".(int)$_GET['key2']."
			");
			$_SESSION['info'] = 'Почта была изменена';
		}
		if(!count($errors) && ($_POST['age'] != $row['age'])) {
			q("
			UPDATE `users` SET 
			`age` 		    	= '".es($_POST['age'])."'
			WHERE `id`          = ".(int)$_GET['key2']."
			");
			$_SESSION['info'] = 'Возраст был изменен';
		}
		if(!count($errors) && ($_POST['access'] != $row['access'])) {
			q("
			UPDATE `users` SET
			`access`           = '".es($_POST['access'])."'
			WHERE `id`         = ".(int)$_GET['key2']."
			");
			$_SESSION['info'] = 'Права доступа изменены';
		}


		header('Location: /admin/users/edit/'.$_GET['key2']);
		exit();
	}


}



if(!$users->num_rows) {

	$_SESSION['info'] = 'Данного пользователя не существует!';
	header('Location:/admin/users');
	exit();
}
if(isset($_SESSION['info'])){
	$info=$_SESSION['info'];
	unset($_SESSION['info']);
}





