<?php
Core::$META['title'] = 'Добавить Новость';

if(isset($_POST['add'], $_POST['text'], $_POST['cat'], $_POST['description'], $_POST['title'])){

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
	INSERT INTO `news` SET 
	`cat` 			= '".trimALL (es($_POST['cat']))."',
	`title`			= '".trimALL(es($_POST['title']))."',
	`text` 			= '".trimALL(es($_POST['text']))."',
	`description` 	= '".trimALL(es($_POST['description']))."',
	 `img`			= '".trimALL(es($file))."',
	 `cat_id`		= '$cat',
	`date`          = NOW()
	");

		$_SESSION['info'] = 'Запись была добавлена';
		header('Location: /admin/news');
		DB::close();
		exit();
	}

}

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
