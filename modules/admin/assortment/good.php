<?php


$assortment = q("
	SELECT *
	FROM `assortment`
	WHERE `id` = ".(int)$_GET['key2']."
  	LIMIT 1
") ;

$row =$assortment->fetch_assoc();

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
	header("Location:/admin/assortment");
	exit();
}


if(isset($_GET['key2'],$_GET['key3']) && $_GET['key2'] == 'delete'){
	q( "
	DELETE FROM `assortment`
    WHERE `id` = ".(int)$_GET['key3']."
		");
	$_SESSION['info'] = 'Товар был удален';
	header("Location:/admin/assortment ");
	exit();
}

if(isset($_SESSION['info'])){
	$info = $_SESSION['info'];
	unset($_SESSION['info']);
}
