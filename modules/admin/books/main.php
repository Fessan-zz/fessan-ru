<?php

Core::$META['title'] = 'Авторы';
// удаление авторов
if(isset($_POST['delete'])) {

	foreach($_POST['ids'] as $k => $v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',', $_POST['ids']);
	q("
	DELETE FROM `books_author`
	WHERE `id` IN (".$ids.")
");

	$_SESSION['info'] = 'Авторы были удалены';
	header("Location:/admin/books ");
	exit();
}

if(isset($_GET['key2'], $_GET['key3']) && $_GET['key2'] == 'delete') {
	q("
	DELETE FROM `books_author`
    WHERE `id` = ".(int)$_GET['key3']."
		");
	$_SESSION['info'] = 'Автор был удален';
	header("Location:/admin/books ");
	exit();
}

// запрос к БД для вывода авторов

$author = q("
	SELECT * 
	FROM `books_author`
	ORDER BY `id` 
");



DB::close();

if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
