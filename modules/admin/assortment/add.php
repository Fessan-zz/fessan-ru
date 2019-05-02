<?php
Core::$META['title'] = 'Добавление Товара';

if(isset($_POST['add'], $_POST['title'], $_POST['code'], $_POST['nal'], $_POST['cat'], $_POST['price'], $_POST['description'], $_POST['text'])) {

	$errors = [];
	if(empty($_POST['title'])) {
		$errors['title'] = 'Вы не заполнили название';
	}
	if(empty($_POST['code'])) {
		$errors['code'] = 'Вы не заполнили код товара';
	}
	if(empty($_POST['price'])) {
		$errors['price'] = 'Вы не заполнили цену товара';
	}
	if(empty($_POST['description'])) {
		$errors['description'] = 'Вы не заполнили описание';
	}
	if(empty($_POST['text'])) {
		$errors['text'] = 'Вы не заполнили описание';
	}
	foreach($_POST as $k => $v) {
		$_POST[$k] = trim($v);
	}
	if(!Upload::uploader($_FILES)){
		$errors['img'] = Upload::$error;
	}else {
		$name = Upload::resize($_FILES,400);
	}




	if(!count($errors)) {
		q("
	 INSERT INTO `assortment` SET 
	 `title`        = '".trimALL(es($_POST['title']))."',
	 `code`         = '".trimALL(es($_POST['code']))."',
	  `nal`         = '".es($_POST['nal'])."',
	  `cat`         = '".es($_POST['cat'])."',
	  `price`       = ".trimALL((int)$_POST['price']).",
	  `description` = '".trimALL(es($_POST['description']))."',
	  `text`        = '".trimALL(es($_POST['text']))."',
	  `img`			= '".trimALL(es($name))."'
	  
	 ");
		DB::close();
		$_SESSION['info'] = 'Запись была добавлена';
		header('Location:/admin/assortment');
		exit();
	}
}

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}

