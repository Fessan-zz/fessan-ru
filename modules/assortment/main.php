<?php
Core::$META['title'] = 'Товары';

if(isset($_POST['delete'])) {

	foreach($_POST['ids'] as $k=>$v) {
		$_POST['ids'][$k] = (int)$v;
	}
	$ids = implode(',', $_POST['ids']);

	q( "
	DELETE FROM `assortment`
	WHERE `id` IN (".$ids.")
") ;

	$_SESSION['info'] = 'Товары были удалены';
	header("Location:/assortment");
	exit();

}


if(isset($_GET['key1'],$_GET['key2']) && $_GET['key1'] == 'delete'){
	q( "
	DELETE FROM `assortment`
    WHERE `id` = ".(int)$_GET['key2']."
		");
	$_SESSION['info'] = 'Товар был удален';
	header("Location:/assortment ");
	exit();
}


$assortment= q("
	SELECT * 
	FROM `assortment`
	ORDER BY `id` DESC 
") ;

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}

DB::close();