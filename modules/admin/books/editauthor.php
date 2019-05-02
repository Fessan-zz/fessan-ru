<?php

Core::$META['title'] = 'Редактировать Новость';

if(isset($_POST['ok'], $_POST['name'], $_POST['age'], $_POST['cat'], $_POST['description'],$_POST['biografi'])) {

	foreach($_POST as $k => $v) {
		$_POST[$k] = trim($v);
	}

	// ошибки
	$errors = [];
	if(empty($_POST['name'])) {
		$errors['name'] = 'Вы не заполнили ФИО автора';
	}

	if(empty($_POST['age'])) {
		$errors['age'] = 'Вы не заполнили возратс автора';
	}
	if(empty($_POST['description'])) {
		$errors['description'] = 'Вы не заполнили описание';
	}
	if(empty($_POST['biografi'])) {
		$errors['biografi'] = 'Вы не заполнили биография автора';
	}

	if(!Upload::uploader($_FILES)){
		$errors['img'] = Upload::$error;
	}else {
		$name = Upload::resize($_FILES,100,100);
	}
	// добавление изображения

	if(!count($errors)) {
		q("
	UPDATE `books_author` SET 
	`author`		 ='".trimALL (es($_POST['name']))."',
	`age`			 = ".(int)$_POST['age'].",
	`cat` 			 = '".trimALL (es($_POST['cat']))."',
	`description` 	 = '".trimALL(es($_POST['description']))."',
	`biografi`		 = '".trimALL(es($_POST['biografi']))."',
  	`date`           = NOW()
	WHERE `id` = ".(int)$_GET['key2']."
	");



		if(!count($errors) && !empty($name)) {
			q("
			UPDATE `books_author` SET
			`img`     = '".es($name)."'
			WHERE `id`     = ".(int)$_GET['key2']."
			
			");
		}



		$_SESSION['info'] = 'Запись была изменена';
		header('Location: /admin/books');
		exit();

	}
}

$author = q("
	SELECT *
	FROM `books_author`
	WHERE `id` = ".(int)$_GET['key2']."
  	LIMIT 1
");

$row = $author->fetch_assoc();

if(!$author->num_rows) {

	$_SESSION['info'] = 'Данного автора не существует!';
	header('Location:/admin/books');
	exit();
}




if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
