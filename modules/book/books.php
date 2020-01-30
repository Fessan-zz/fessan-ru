<?php

Core::$META['title'] = 'Книги';


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
