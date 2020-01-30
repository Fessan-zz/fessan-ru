<div class="form modules_all">



	<h1>Авторизация.</h1>

	<?php
	if(isset($error)){
		echo $error;
	}

	if(!isset($status) || $status != 'ok'){

	 ?>
	<br><br>
	<form action="" method="post">
		<div>
			Введите логин:	<input type="text" name="login" placeholder="Введите логин">
		</div>
		<br>
		<div>
			Введите пароль: <input type="password" name="password" placeholder="Введите пароль">
		</div>
		<div>
			<br>
			<label>	Запомнить? <input type="checkbox" name="check"> </label>

		</div>
		<br>
		<div class="submit"><input type="submit" name="submit" value="Авторизироваться." ></div>


		<br>
		<br>
		</form>
		<a href="/cab/reg">Регистрация</a>
<?php } else { ?>
		<h2>Поздравляю, Вы авторизованы </h2>
		<a href="/">На главную страницу</a>
<?php } ?>
</div>
