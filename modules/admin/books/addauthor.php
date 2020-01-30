
<?php
Core::$META['title'] = 'Добавить Автора';

if(isset($_POST['add'], $_POST['name'], $_POST['age'], $_POST['cat'], $_POST['description'],$_POST['biografi'])){

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

	// добавление изображения
	if(!count($errors)) {
		Upload::uploader($_FILES);
		if(!Upload::$error) {
			$file = Upload::resize(100, 100);
		}
		else {
			$errors = Upload::$error;
		}
	}

	if(!count($errors)) {

		q("
	INSERT INTO `books_author` SET 
	`author`		 ='".trimALL (es($_POST['name']))."',
	`age`			 = ".(int)$_POST['age'].",
	`cat` 			 = '".trimALL (es($_POST['cat']))."',
	`description` 	 = '".trimALL(es($_POST['description']))."',
	`biografi`		 = '".trimALL(es($_POST['biografi']))."',
	 `img`			 = '".trimALL(es($file))."',
  	`date`           = NOW()
	");

		$_SESSION['info'] = 'Запись была добавлена';
		header('Location: /admin/books');
		DB::close();
		exit();
	}

}

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
