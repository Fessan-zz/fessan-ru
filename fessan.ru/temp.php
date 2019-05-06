<?php


session_start();
function wtf($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}

echo 'куки <pre>';

wtf($_COOKIE,1);
echo ' сессия<br>';
wtf($_SESSION,1);
echo 'file';
wtf($_FILES,1);
print_r($_FILES['file']);
echo '</pre>';
