<?php
Core::$META['title'] = 'Регистрация';


//обработка регистрации
if(isset($_POST['login'],$_POST['password'],$_POST['email'],$_POST['age'])){
	$errors = [];
	$_POST['login'] = trimALL($_POST['login']);
	if(empty($_POST['login'])){
		$errors['login'] = 'Вы не заполнили логин';
	} elseif (!preg_match('#^[\wё\s]{3,16}$#ui',$_POST['login'])) {
		$errors['login'] = 'Вы ввели неверный логин';
	}
	if(mb_strlen($_POST['password'] ) < 5){
		$errors['password'] = 'Пароль должен быть длинее 4х символов';
	}

	if(empty($_POST['email'])|| !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ){
		$errors['email'] = 'Вы не заполнили email';
	}

	if(!count($errors)) {
		$res = q("
		SELECT `id`
		FROM `users`
		WHERE `login` = '".trimALL(es($_POST['login']))."'
		LIMIT 1
		");
		if($res->num_rows){
			$errors['login'] = 'Такой логин уже существует';
		}
		$res = q("
		SELECT `id`
		FROM `users`
		WHERE `email` = '".trimALL(es($_POST['email']))."'
		LIMIT 1
		");
		if($res->num_rows){
			$errors['email'] = 'Такой email уже существует';
		}
	}

	if(!count($errors)){
		q ("
		INSERT INTO `users` SET 
		`login`			  = '".trimALL(es($_POST['login']))."',
  		`password`		  = '".trimALL(es(myHash($_POST['password'])))."',
		`email`			  = '".trimALL(es($_POST['email']))."',
		`age`			  = ".(int)$_POST['age'].",
		`hash`			  = '".es(myHash($_POST['login'].$_POST['email']))."',
		`ip`			  = '".$_SERVER['REMOTE_ADDR']."'
		");

		$id =DB::_()->insert_id;;

		$_SESSION['regok']= 'OK';
		header("Location:/cab/exit");
		exit();

		Mail::$to = $_POST['email'];
		Mail::$subject = 'Подтвердите регистрацию на сайте';
		Mail::$text = '
		Пройдите по ссылке для активации Вашего аккаунта '.Core::$DOMAIN.'index.php?module=cab&page=activate&id='.$id.'&hash='.
			myHash($_POST['login'].$_POST['email']);
		Mail::send();

		header("Location:/cab/reg");
		exit();
	}
}

DB::close();