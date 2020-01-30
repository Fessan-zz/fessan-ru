<?php

Core::$META['title'] = 'Комментарии';

if(isset($_SESSION['user'],$_POST['comments'],$_POST['coments_submit'])){
	$errors = [];
	if(isset($_POST['comments']) && empty(($_POST['comments']))){
		$errors = 'Вам нужно заполнить коментарий';
	}
	if(!count($errors) && isset($_POST['coments_submit'])){
		q("
		INSERT INTO `comments` SET 
		`login`      = '".es($_SESSION['user']['login'])."',
		`email`      = '".es($_SESSION['user']['email'])."',
		`comments`   = '".nl2br( es($_POST['comments']))."'
				");
		header("Location:/comments");
		exit();

	}

}

$res = q(
	"SELECT * FROM `comments` ORDER BY `id` DESC ");

DB::close();
















