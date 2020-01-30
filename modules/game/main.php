<?php
Core::$META['title'] = 'Игра';

if(!isset($_SESSION['client'])){
	$_SESSION['client'] = 10;
};
if(!isset($_SESSION['server'])){
	$_SESSION['server'] = 10;
};


if(isset($_POST['num']) && $_POST['num'] != 0) {
	$allowed = [1, 2, 3];
		if(!in_array($_POST['num'], $allowed) && (!empty($_POST['num']))) {
	 	exit('Вы ввели недопустимое значение');


	}elseif($_POST['num'] == rand(1,3)){
		$_SESSION['client'] = $_SESSION['client'] - rand(1,4);
	}else
		$_SESSION['server'] = $_SESSION['server'] - rand(1,4);

};

if( $_SESSION['server'] <= 0){
	unset($_SESSION['server']);
	header("Location: /game/gameover");
	exit();
}elseif($_SESSION['client'] <=0){
	unset($_SESSION['client']);
	header("Location: /game/gameover");
	exit();
};