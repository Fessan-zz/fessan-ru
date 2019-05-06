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


/*
foreach($authors1 as $v){
	$author_ids[] =$v['id'];
}

$books2books2 =q("
SELECT *	
FROM `books2books_author`
ORDER BY `id` 


");
while($book2 = $books2books2->fetch_assoc()){
	$book3[] =$book2;
}

foreach($book3 as $v){
	$book_ids[] = $v['book_id'];
}

$books= q("
 SELECT *
 FROM `books`
ORDER BY `id` 
");

while($books2=$books->fetch_assoc()){
	$books3[] = $books2;
}
*/
DB::close();

if(isset($_SESSION['info'])) {
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
