<?php

Core::$META['title'] = 'Пользователи';

if(isset($_POST['delete'])) {

	foreach($_POST['ids'] as $k=>$v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',', $_POST['ids']);
	q("
	DELETE FROM `users`
	WHERE `id` IN (".$ids.")
") ;

	$_SESSION['info'] = 'Пользователи были  удалены';
	header("Location:/admin/users ");
	exit();
}



if(isset($_GET['key2'],$_GET['key3']) && $_GET['key2'] == 'delete'){
	q( "
	DELETE FROM `users`
    WHERE `id` = ".(int)$_GET['key3']."
		");
	$_SESSION['info'] = 'Пользователь был удален';
	header("Location:/admin/users ");
	exit();
}


$users =	q("
	SELECT * 
	FROM `users`
	ORDER BY `id` DESC 
") ;

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}


if(isset($_POST['search_text'], $_POST['search'])) {

	$_POST['search_text'] = trimALL ($_POST['search_text']);

	$search = q("
	SELECT *
	FROM `users`
	WHERE `login` LIKE '%".es($_POST['search_text'])."%'
  	
") ;
}
DB::close();