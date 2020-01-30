
<div class="modules_all">
	<a href="/admin"> Вернутся в админку</a>
	<br>

	Все существующие пользователи :
	<br>
	<form action="" method="post">
		<input type="text" name="search_text" value="<?php
		if(isset($_POST['search_text'])){
		echo $_POST['search_text'];} ?>">
		<input type="submit" name="search" value="Найти пользователя">

		<?php
		if(isset($_POST['search_text']) && $_POST['search']){
		while($row = $search->fetch_assoc()){ ?>
		<div>
			<b> Найденые пользователи.</b>
			<br>
			<a href="/admin/users/main/delete/<?php echo $row['id'];?>">Удалить пользователя </a><br>
			<a href="/admin/users/edit/<?php echo $row['id'];?>">Отредактировать пользователя </a>
			<br>
			<img src="<?php echo $row['avatar'] ?>">
<br>
			Логин : <b><?php echo hc( $row['login']) ?></b><br>
			Почта : <b><?php echo hc ($row['email']) ?></b><br>
			Возраст : <b><?php echo hc($row['age']) ?></b><br>
			Дата последней активности : <?php echo (int)$row['date']; ?> </div>
		<br>
		Уровень прав : <b><?php echo (int)$row['access'] ?></b><br>



<hr>
<?php }
}else {
			while($row =$users->fetch_assoc()){ ?>
				<div>
					<b>Все пользователи</b>
					<div>
						<input type="checkbox" name="ids[]" value="<?php echo $row['id'];?>">
						<a href="/admin/users/main/delete/<?php echo $row['id'];?>">Удалить пользователя </a><br>
						<a href="/admin/users/edit/<?php echo $row['id'];?>">Отредактировать пользователя </a>
						<br>
						Логин   :	<b><?php echo hc ($row['login']) ?></b><br>
						Почта   :	<b><?php echo hc ($row['email']) ?></b><br>
						Возраст :	<b><?php echo (int)$row['age'] ?></b><br>
						Дата последней активности :	<?php  echo (int)$row['date']; ?> </div><br>
					Уровень прав   :	<b> <?php
						if($row['access'] == 1 ){
							echo 'Не активированый пользователь';
						}elseif($row['access'] == 2){
							echo 'Активированый пользователь';
						}elseif($row['access'] == 3){
							echo 'Забанен!';
						}elseif($row['access'] == 5){
							echo 'Администратор';
						} ?></b><br>


				</div>
				<hr>
			<?php	}
		}
		?>

		<input type="submit" name="delete" value="Удалить записи">
	</form>
</div>
