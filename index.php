<?php
error_reporting(-1);
ini_set('display_errors','on');
header('Content-Type: text/html; charset=utf-8');
session_start();


//Конфиг
include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

// роутер




ob_start();
	include './'.Core::$CONT.'/allpages.php';
    if(!file_exists('./'.Core::$CONT.'/'.$_GET['module'].'/'.$_GET['page'].'.php') || !file_exists('./skins/'.Core::$SKIN.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl') ){
		header("Location: /404");
		exit();
	}
	include './'.Core::$CONT.'/'.$_GET['module'].'/'.$_GET['page'].'.php';
	include './skins/'.Core::$SKIN.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl';
	$content = ob_get_contents();
ob_end_clean();

include'./skins/'.Core::$SKIN.'/index.tpl';

exit();