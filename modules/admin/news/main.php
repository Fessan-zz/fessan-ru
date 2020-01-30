<?php
Core::$META['title'] = 'Новости';
// удаление нексольких новостей
if(isset($_POST['delete'])) {

	foreach($_POST['ids'] as $k => $v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',', $_POST['ids']);
	q("
	DELETE FROM `news`
	WHERE `id` IN (".$ids.")
");

	$_SESSION['info'] = 'Новости были удалены';
	header("Location:/admin/news ");
	exit();
}

// удаление 1 новости

if(isset($_GET['key2'], $_GET['key3']) && $_GET['key2'] == 'delete') {
	q("
	DELETE FROM `news`
    WHERE `id` = ".(int)$_GET['key3']."
		");
	$_SESSION['info'] = 'Новость была удалена';
	header("Location:/admin/news ");
	exit();
}
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
	///  ПАГИНАЦИЯ ////////
	///
	$result = q("
	SELECT COUNT(*)
	FROM `news`

");
	$limit = 3;
	$post = $result->fetch_row();
	$max =$post[0];
	$pages=ceil($max/$limit);



	if(isset($_GET['pag'])){
		$page = $_GET['pag'];
	}else $page = 1;



	$num = ($page*$limit) - $limit;

	$news = q("
     	SELECT *
		 FROM `news`
 		LIMIT $num,$limit
 		");


}

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}



