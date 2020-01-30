<div class="reg2 modules_all">
	<?php
	if(!isset($_SESSION['user'])) {
		if(!isset($_SESSION['regok'])) { ?>
			<form action="/cab/reg" method="post">

				<table>
					<tr>
						<td width="85">Логин *</td>
						<td><input type="text" name="login" value="<?php echo @hc($_POST['login']); ?> "></td>
						<td> <?php echo @$errors['login']; ?></td>
					</tr>
					<tr>
						<td>Пароль *</td>
						<td><input type="password" name="password"</td>
						<td> <?php echo @$errors['password']; ?></td>
					</tr>
					<tr>
						<td>e-mail *</td>
						<td><input type="text" name="email" value="<?php echo @hc($_POST['email']); ?>"</td>
						<td><?php echo @$errors['email']; ?></td>
					</tr>
					<tr>
						<td>Возраст</td>
						<td><input type="text" name="age" value="<?php echo @(int)$_POST['age']; ?>"</td>
						<td></td>
					</tr>
				</table>
				<p class="p_reg">* - Обязательно заполните</p>
				<input type="submit" name="sendreg" value="Зарегистрироваться">

			</form>
			<a href="/cab/auth">Авторизоваться</a>

		<?php } else {
			unset($_SESSION['regok']); ?>
			<div>Вы успешно зарегистрировались!</div>
		<?php }
	}else echo 'Вы уже зарегистрированы и авторизованы на сайте.'
		?>
</div>