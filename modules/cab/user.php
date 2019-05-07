<?php

Core::$META['title'] = 'Страница пользователя';

$users = q("
	SELECT *
	FROM `users`
	WHERE `id` = ".(int)$_GET['key1']."
	LIMIT 1
");

$row = $users->fetch_assoc();
if(!$users->num_rows){
	$_SESSION['info'] = 'Данного пользователя не существует';
	header('Location:/');
	exit();
	}


if(isset($_POST['submit'])){ // нажатие кнопки отправить

	foreach($_POST as $k => $v){
		$_POST[$k] = trim($v);
	}

	$errors = []; // массив для ошибок

	// проверка пароля
	if(mb_strlen($_POST['password']) < 5 & !empty($_POST['password'])){
		$errors['password'] = 'Пароль должен быть длинее 4х символов';
	}
	// проверка почты
	if(!filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL) || empty ($_POST['email'])){
		$errors['email'] = 'Вы не заполнили email';
	}


	// работа с БД/////////////////////////


	//  проверка почты(должна не повторяться)
		$res_email = q("
			SELECT `id`
			FROM `users`
			WHERE `email` = '".trimALL(es($_POST['email']))."'
			AND NOT `id`  = ".(int)$_GET['key1']."
			LIMIT 1
		");

		if($res_email->num_rows) {
			$errors['email'] = 'Такой email уже существует';
			$_SESSION['info'] = 'Ошибка!Такой email уже существует';
		}

		////////////////////////////////////////////
		////// Работа с Обновлениями в БД///////////
		///
	/// // здесь будет вызов класса для загрузки и ресайза

	if(!count($errors)) {
		Upload::uploader($_FILES);
		$tmp_err = Upload::$error;
		if(!$tmp_err) {
			$file = Upload::resize(100, 100);
		}
		else {
			$errors = Upload::$error;
		}
	}


	// изменение изображения

	if(!count($errors)) {

	//	Upload::uploader($_FILES);
	//	$errors = Upload::$error;
	//	$file =  Upload::resize(100,100);



		if(!empty($file)) {
			q("
			UPDATE `users` SET
			`avatar`   = '".es($file)."'
			WHERE `id` = ".(int)$_GET['key1']."
			");
		}

		// изменение пароля
		if(isset($_POST['password']) & !empty($_POST['password'])) {
			q("
			UPDATE `users` SET
			`password`  = '".trimALL(es(myHash($_POST['password'])))."'
			WHERE `id`          = ".(int)$_GET['key1']."
 			");
		}

		// изменение почты
		if(isset($_POST['email'] ) and !empty($_POST['email'])){
			q("
				UPDATE `users` SET
				`email`        = '".es($_POST['email'])."'
				WHERE `id`     = ".(int)$_GET['key1']."
				");
		}

		// изменение возраста
		if(isset($_POST['age']) and !empty($_POST['age'])) {
			q("
			UPDATE `users` SET
			`age` 		    = '".(int)$_POST['age']."'
			WHERE `id`      = ".(int)$_GET['key1']."
			");
		}

		$_SESSION['info'] = 'Запись была изменена';
		header('Location:/cab/user/'.$_GET['key1']);
		exit();
	}



}


DB::close();

