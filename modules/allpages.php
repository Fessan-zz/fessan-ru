<?php

if(isset($_SESSION['user'])) {

	$res = q("
	SELECT *
	FROM `users`
	WHERE `id` = '".$_SESSION['user']['id']."'
	LIMIT 1
	");
	$_SESSION['user'] = $res->fetch_assoc();

	if($_SESSION['user']['active'] != 1 or $_SESSION['user']['access'] == 3) {

		include './'.Core::$CONT.'/cab/exit.php';

	}
}
elseif(isset($_COOKIE['id'], $_COOKIE['hash'])) {
	$res2 = q("
	SELECT *
	FROM `users`
	WHERE `id`		= '".(int)es($_COOKIE['id'])."'
	AND   `hash`	= '".es($_COOKIE['hash'])."'
	AND	  `ip`		= '".es($_COOKIE['ip'])."'
	LIMIT 1
	");
	if($res2->num_rows) {
		$_SESSION['user'] = $res2->fetch_assoc();
	}
	else {
		include './'.Core::$CONT.'/cab/exit.php';


	}
}
if(isset($_COOKIE['id'], $_COOKIE['hash'], $_COOKIE['ip'], $_SESSION['user']['id']) && ($_COOKIE['id'] != $_SESSION['user']['id'] || $_COOKIE['hash'] != $_SESSION['user']['hash'] || $_COOKIE['ip'] != $_SESSION['user']['ip'])) {

	include './'.Core::$CONT.'/cab/exit.php';


}



