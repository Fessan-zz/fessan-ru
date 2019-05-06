


<div class="modules_all">
	<?php
	if(isset($_SESSION['user']['id']) && $_SESSION['user']['id'] == $_GET['key1']){

	echo @$_SESSION['info'];
	?>
<br>
	<img src="<?php echo $row['avatar'] ?>">



<br>
	<a href="/">Вернуться на главную</a>

	<form action="" method="post" enctype="multipart/form-data">

		<table>
			<tr>
				<td width="200">Логин :</td>
				<td><?php echo  hc($row['login']); ?> </td>
			</tr>
			<tr>
				<td>Введите новый  пароль :</td>
				<td> <input  type="password" name="password"></td>
				<td> <?php   echo @$errors['password'];  ?></td>
			</tr>
			<tr>
				<td>Почта :</td>
				<td><input type="text" name="email" value="<?php echo hc($row['email']); ?>"> </td>
				<td><?php   echo @$errors['email'];  ?></td>
			</tr>
			<tr>
				<td>Возраст :</td>
				<td><input type="text" name="age" value="<?php echo hc($row['age']); ?>"> </td>
				<td></td>
			</tr>
		</table>

		<div>
			<span >Права доступа - <?php
				if($row['access'] == 1 ){
					echo 'Не активированый пользователь';
				}elseif($row['access'] == 2){
					echo 'Активированый пользователь';
				}elseif($row['access'] == 3){
					echo 'Забанен!';
				}elseif($row['access'] == 5){
					echo 'Администратор';
				}
				?><br> </span>
		</div>
		<input type="file" name="file" accept="image/png,image/jpg,image/gif,image/jpeg" >
		<?php echo @$errors['img'];?>
		<br>


		<input type="submit" name="ok" value="Отредактировать Пользователя"><br>
	</form>
<a href="/cab/exit">Сменить пользователя</a>

	<?php
		unset ($info);
	}else {
		header('Location:/');
		exit();
	}
	?>

</div>


