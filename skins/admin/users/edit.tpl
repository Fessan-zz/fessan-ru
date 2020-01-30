


<div class="modules_all">
	<?php
	if(isset($info)){ ?>

		<h1><?php echo $info;
			unset($info);
			?> </h1>

	<?php }?>


	<?php if(!isset($_SESSION['user'])|| $_SESSION['user']['access'] !=5 ){
		exit('Вам нет доступа к данной странице');
	}else {
	?>
	<a href="/admin/users">Вернуться к списку пользователей</a><br>
	<img src="<?php echo $row['avatar'] ?>">
	<form action="" method="post">

		<table>
			<tr>
				<td width="200">Удалить аватар :</td>
				<td><input type="checkbox" name="del_ava"></td>
			</tr>
			<tr>
				<td width="200">Отредактировать логин :</td>
				<td><input  type="text" name="login" value="<?php echo  hc($row['login']); ?>"> </td>
				<td><span class="span_err"> <?php
					if(isset($errors['login'])){
						echo $errors['login'];}  ?></span></td>
			</tr>
			<tr>
				<td>Введите новый  пароль :</td>
				<td> <input  type="password" name="password"></td>
				<td> <span class="span_err"><?php
					if(isset($errors['password'])){
						echo $errors['password'];}  ?></span></td>
			</tr>
			<tr>
				<td>Отредактировать почту :</td>
				<td><input type="text" name="email" value="<?php echo hc($row['email']); ?>"> </td>
				<td><span class="span_err"><?php
					if(isset($errors['email'])){
						echo $errors['email'];}  ?></span></td>
			</tr>
			<tr>
				<td>Отредактировать возраст :</td>
				<td><input type="text" name="age" value="<?php echo hc($row['age']); ?>"> </td>
				<td><span class="span_err">
					<?php
					if(isset($errors['age'])){
						echo $errors['age'];
					}
					?></span>
				</td>
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
			Отредактировать права :
			<input type="radio" name="access" value="5" <?php if($row['access'] == 5 ){
				echo 'checked';} ?>  >  админ
			<input type="radio" name="access" value="1" <?php if($row['access'] == 1 ){
				echo 'checked';} ?>> не активированый пользователь
			<input type="radio" name="access" value="2" <?php if($row['access'] == 2 ){
				echo 'checked';} ?>> активированый пользователь
			<input type="radio"  name="access" value="3" <?php if($row['access'] == 3 ){
				echo 'checked';} ?>> забаненый пользователь



		</div>

		<input type="submit" name="add" value="Отредактировать Пользователя">
	</form>


</div>
<?php } ?>

