<?php

Core::$META['title'] = 'Страница пользователя';

if(isset($_POST['submit'], $_POST['email'], $_POST['age'])) {

	foreach($_POST as $k => $v) {
		$_POST[$k] = trim($v);
	}
	$errors = [];

	if(mb_strlen($_POST['password']) < 5 and !empty($_POST['password'])) {
		$errors['password'] = 'Пароль должен быть длинее 4х символов';
	}
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Вы не заполнили email';
	}




	//	Upload::uploader($_FILES);
	//	Upload::resize(100,100);
	//	$name = Upload::$name;
	/*
	if($_FILES['file']['error'] == 0){
		$errors = Upload::$error;
		if(!isset($errors)) {

			Upload::uploader($_FILES);
			Upload::resize(100, 100);
			$name = Upload::$name;
		}
		}

	*/
	if(!count($errors)) {

		$res = q("
		SELECT `id`
		FROM `users`
		WHERE `email` = '".trimALL(es($_POST['email']))."'
		AND  NOT `id` = ".(int)$_GET['key1']."
		LIMIT 1
		");
		if($res->num_rows) {
			$errors['email'] = 'Такой email уже существует';
			$_SESSION['info'] = 'Ошибка!Такой email уже существует';
		}
	}

	if(!count($errors)) {


		if(!count($errors) & !empty($name)) {
			q("
		UPDATE `users` SET
		`avatar`       = '".es($name)."'
		WHERE `id`     = ".(int)$_GET['key1']."
		");
		}
		if(!count($errors) && !empty($_POST['password'])) {
			q("
			UPDATE `users` SET 
			`password`		    = '".trimALL(es(myHash($_POST['password'])))."'
			WHERE `id`          = ".(int)$_GET['key1']."
			");
		}
		if(!count($errors) && !empty($_POST['email'])) {
			q("
			UPDATE `users` SET 
			`email`		    	= '".es($_POST['email'])."'
			WHERE `id`          = ".(int)$_GET['key1']."
			");
		}
		if(!count($errors) && !empty($_POST['age'])) {
			q("
			UPDATE `users` SET 
			`age` 		    	= '".(int)$_POST['age']."'
			WHERE `id`          = ".(int)$_GET['key1']."
			");
		}
		$_SESSION['info'] = 'Запись была изменена';
		header('Location:/cab/user/'.$_GET['key1']);
		exit();
	}
}

$users = q("
	SELECT *
	FROM `users`
	WHERE `id` = ".(int)$_GET['key1']."
  	LIMIT 1
");
$row = $users->fetch_assoc();

if(!$users->num_rows) {

	$_SESSION['info'] = 'Данного пользователя не существует!';
	header('Location:/');
	exit();
}
DB::close();

