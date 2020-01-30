<?php

Core::$META['title'] = 'Авторы';

$author =	q("
	SELECT * 
	FROM `books_author`
	ORDER BY `id` 
") ;



DB::close();

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
