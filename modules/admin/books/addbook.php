<?php
Core::$META['title'] = 'Добавить Новость';
// ПОИСК авторов книг...

$author = q("
  SELECT * FROM `books_author`
  ORDER BY `id` DESC 
");

if(isset($_POST['add'], $_POST['name'], $_POST['description'], $_POST['coast'], $_POST['author'])) {


	// ошибки
	$errors = [];
	if(empty($_POST['name'])) {
		$errors['name'] = 'Вы не заполнили название книги';
	}

	if(empty($_POST['description'])) {
		$errors['description'] = 'Вы не заполнили описание книги';
	}
	if(empty($_POST['coast'])) {
		$errors['coast'] = 'Вы не заполнили цену книги';
	}
	if(!isset($_POST['author'])) {
		$errors['author'] = 'Вы не указали автора книги';
	}
	if(!Upload::uploader($_FILES)){
		$errors= Upload::$error;
	}else {
		$name = Upload::resize($_FILES,150,200);
	}
	// добавление изображения


	if(!count($errors)) {

		q("
	INSERT INTO `books` SET 
	`name`			 ='".trimALL(es($_POST['name']))."',
	`description` 	 = '".trimALL(es($_POST['description']))."',
	`coast`			 = ".(int)$_POST['coast'].",
	 `img`			 = '".trimALL(es($name))."',
  	`date`           = NOW()
	");
		$id = DB::_()->insert_id;

		foreach($_POST['author'] as $v) {

			$author_id = q("
	
			  SELECT `*`
			  FROM `books_author`	
			  WHERE `author` =  '".trimALL(es($v))."'
			  
		  ");
			$ids =$author_id->fetch_assoc();

			q("
		INSERT INTO `books2books_author` SET 
		`book_id`      ='".trimALL(es($id))."',
		`author_id` 	= '".trimALL(es($ids['id']))."'
		");
		}
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
