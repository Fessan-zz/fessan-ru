<div class="form modules_all">
	<h1>Регистрация.</h1>
	<div class="reg"> <?php echo'Добро пожаловать  '. $login?></div>
	<br><br>
	<form action="/auth" method="post">
		<div>
			Введите логин:	<input type="text" name="login" placeholder="Введите логин">
		</div>
		<br>
		<div>
			Введите пароль: <input type="password" name="password" placeholder="Введите пароль">
		</div>
		<br>
		<div>
			Введите почту: <input type="text" name="email" placeholder="Введите почту">
		</div>
		<br>
		<div class="submit"><input type="submit" name="submit" value="Зарегестрироваться" ></div>
		<br>
		<div class="submit">
			<input type="reset" name="reset" value="Очистить.">
		</div>
		<br><br>

		<a href="/auth/exit" class="button_auth">Выход</a>


	</form>


</div>
