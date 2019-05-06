<?php
if(isset($_SESSION['client'])){
	$win = 'Игрок';
} elseif(isset($_SESSION['server'])) {
	$win = 'Компьютер';
};
session_unset();
session_destroy();