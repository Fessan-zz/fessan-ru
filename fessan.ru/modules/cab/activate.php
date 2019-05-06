<?php
Core::$META['title'] = 'Активация';

if(isset($_GET['hash'],$_GET['id'])){
	q("
	UPDATE `users` SET `active` = 1
	WHERE `id` = ".(int)$_GET['id']." AND
	`hash` ='".trimALL(es($_GET['hash']))."' 
	
	");

	$info = 'Вы активировали аккаунт';

}else {
	$info = 'Вы прошли по неверной ссылке';
}
DB::close();