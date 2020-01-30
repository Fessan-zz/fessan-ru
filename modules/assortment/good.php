<?php


$news = q("
	SELECT *
	FROM `assortment`
	WHERE `id` = ".(int)$_GET['key1']."
  	LIMIT 1
") ;

DB::close();
$row = $news->fetch_assoc();






