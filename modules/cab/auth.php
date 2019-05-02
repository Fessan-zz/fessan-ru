<?php

Core::$META['title'] = 'Авторизация';
//простая авторизация

if(isset($_POST['login'], $_POST['password'], $_POST['submit'])) {
	$res = q("
	SELECT *
	FROM `users`
	WHERE `login`  = '".trimALL(es($_POST['login']))."'
	AND `password` = '".trimALL(es(myHash($_POST['password'])))."'
	AND `active`  = 1 
	 LIMIT 1
	");

	if($res->num_rows) {
		$_SESSION['user'] = $res->fetch_assoc();
		$status = 'ok';
		// проверка прав пользователя
		if(isset($_SESSION['user']['access']) && $_SESSION['user']['access'] == 3) {

			header('Location: /cab/exit');
			exit();
		}

		// авто авторизацмя
		if(isset($_POST['check'])) {
			setcookie('id', $_SESSION['user']['id'], time()+3600 * 24 * 30,'/' );
			setcookie('hash',es(myHash($_SESSION['user']['id'],$_SESSION['user']['email'],$_SESSION['user']['login'])),time()+3600 * 24 * 30,'/');
			setcookie('ip',$_SERVER['REMOTE_ADDR'], time() +3600 *24 * 30, '/');

			q("
			UPDATE `users` SET
			`hash`      = '".es(myHash($_SESSION['user']['id'],$_SESSION['user']['email'],$_SESSION['user']['login']))."',
			`ip`		= '".$_SERVER['REMOTE_ADDR']."'
			WHERE `id`  = '".$_SESSION['user']['id']."'
 			");


		}
	}
	else {
		$error = 'Нет пользователя  с таким логином или паролем';
	}


}


