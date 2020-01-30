<?php
Core::$META['title'] = 'Новости';



// вывод  новостей



if(isset($_GET['cat'])){
	if($_GET['cat'] == 'politic'){
		$res = q("
	SELECT * 
	FROM `news_cat`
	WHERE `id` = '1'
");
		$row = $res->fetch_assoc();
		$news = q("
	SELECT *
	FROM `news`
	WHERE `cat` = '".$row['name']."'
	
");
	}elseif($_GET['cat'] == 'criminal'){
		$res = q("
	SELECT * 
	FROM `news_cat`
	WHERE `id` = '2'
");
		$row = $res->fetch_assoc();
		$news = q("
	SELECT *
	FROM `news`
	WHERE `cat` = '".$row['name']."'
	
");
	}elseif($_GET['cat'] == 'sciense'){
		$res = q("
	SELECT * 
	FROM `news_cat`
	WHERE `id` = '3'
");
		$row = $res->fetch_assoc();
		$news = q("
	SELECT *
	FROM `news`
	WHERE `cat` = '".$row['name']."'
	
");
	}

}else {
	$news = q("
	SELECT * 
	FROM `news`
	ORDER BY `id` DESC 
");
}