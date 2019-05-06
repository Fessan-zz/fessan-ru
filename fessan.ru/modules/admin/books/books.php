<?php

Core::$META['title'] = 'Книги';
// удаление авторов
if(isset($_POST['delete'])) {

	foreach($_POST['ids'] as $k=>$v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',', $_POST['ids']);
	q("
	DELETE FROM `books`
	WHERE `id` IN (".$ids.")
") ;

	$_SESSION['info'] = 'Книги были удалены';
	header("Location:/admin/books/books ");
	exit();
}



if(isset($_GET['key2'],$_GET['key3']) && $_GET['key2'] == 'delete'){
	q( "
	DELETE FROM `books`
    WHERE `id` = ".(int)$_GET['key3']."
		");
	$_SESSION['info'] = 'Книга была удалена';
	header("Location:/admin/books/books ");
	exit();
}
// запрос к БД для вывода авторов

$books =	q("
	SELECT * 
	FROM `books`
	ORDER BY `id` 
") ;



DB::close();

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
