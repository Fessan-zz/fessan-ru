<?php

$news = q("
	SELECT *
	FROM `news`
	WHERE `id` = ".(int)$_GET['key2']."
  	LIMIT 1
") ;

$row = $news->fetch_assoc();

if(!$news->num_rows){

	$_SESSION['info'] = 'Данной новости не существует!';
	header('Location: /admin/news');
	exit();

}


DB::close();

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
