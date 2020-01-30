<?php

Core::$META['title'] = 'Редактировать Новость';

if(isset($_POST['ok'], $_POST['text'], $_POST['cat'], $_POST['description'], $_POST['title'])) {

	foreach($_POST as $k => $v) {
		$_POST[$k] = trim($v);
	}

	// ошибки
	$errors = [];
	if(empty($_POST['title'])) {
		$errors['title'] = 'Вы не заполнили название новости';
	}

	if(empty($_POST['text'])) {
		$errors['text'] = 'Вы не заполнили текст новости';
	}
	if(empty($_POST['description'])) {
		$errors['description'] = 'Вы не заполнили описание';
	}

	// добавление изображения
	if(!count($errors)) {
		Upload::uploader($_FILES);
		if(!Upload::$error) {
			$file = Upload::resize(600);
		}
		else {
			$errors = Upload::$error;
		}
	}

	if(!count($errors)) {

		if($_POST['cat'] == 'Politic'){
			$cat = 1;
		}
		if($_POST['cat'] == 'Criminal'){
			$cat = 2;
		}
		if($_POST['cat'] == 'Science'){
			$cat = 3;
		}


		q("
	UPDATE `news` SET 
	`cat` 			= '".trimALL(es($_POST['cat']))."',
	`title`			= '".trimALL(es($_POST['title']))."',
	`text` 			= '".trimALL(es($_POST['text']))."',
	`description` 	= '".trimALL(es($_POST['description']))."',
	`cat_id`		= '$cat',
	`date`          = NOW()
	WHERE `id` = ".(int)$_GET['key2']."
	");



		if(!count($errors) && !empty($file)) {
			q("
			UPDATE `news` SET
			`img`     = '".es($file)."'
			WHERE `id`     = ".(int)$_GET['key2']."
			
			");
		}
		$_SESSION['info'] = 'Запись была изменена';
	header('Location: /admin/news');
		exit();

	}
}

$news = q("
	SELECT *
	FROM `news`
	WHERE `id` = ".(int)$_GET['key2']."
  	LIMIT 1
");

$row = $news->fetch_assoc();

if(!$news->num_rows) {

	$_SESSION['info'] = 'Данной новости не существует!';
	header('Location:/admin/news');
	exit();
}


if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}


