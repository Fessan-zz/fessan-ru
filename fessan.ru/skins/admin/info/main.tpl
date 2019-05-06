<div class=" modules_all">
	Админ панель
<br>
	<?php
	if( isset($_SESSION['user']['access'])  &&   $_SESSION['user']['access'] ==  5 ){
		echo '<a href="/admin"> Вернутся на главную </a>';

		echo '<pre>'.print_r($_SERVER,1).'</pre>';
		phpinfo();

	}else {

		exit('Вам нет доступа к данной странице');
	}
	?>






</div>
