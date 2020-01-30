<?php
Core::$META['title'] = 'Админ панель';

echo '<a href="/admin"> Вернутся на главную </a>';

echo '<pre>'.print_r($_SERVER,1).'</pre>';
phpinfo();


if($_SERVER['REMOTE_ADDR'] != '127.0.0.112') {
	exit('Вам нет доступа');
};
