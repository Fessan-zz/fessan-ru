<?php

Core::$META['title'] = 'Файловый менеджер';

if(isset($_GET['link'])){
	$dir = $_GET['link'];
} else $dir = '.';



$info = scandir($dir);

foreach ($info as $value){
	if(is_dir($value) || is_dir(isset($dir) ? $dir.'/'.$value : $value)) {
		echo ' <a href="/file&link='.(isset($dir) ? $dir.'/'.$value : $value).'"> <img src ="/img/dir.png" alt = ""> '.$value.'</a>';
	}
	else
		echo '<p><img src ="/img/file.png" alt = "" > '.$value.'</p>';

};


