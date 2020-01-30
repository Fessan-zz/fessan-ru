<?php

$news = q("
	SELECT *
	FROM `news`
	WHERE `id` = ".(int)$_GET['key1']."
  	LIMIT 1
") ;


$row = $news->fetch_assoc();

if(!$news->num_rows){

	$_SESSION['info'] = 'Данной новости не существует!';
	header('Location: /news');
	exit();

}


DB::close();
