<div class="modules_all">
	<?php

	if(!isset($_SESSION['user'])|| $_SESSION['user']['access'] !=5 ){
		exit('Вам нет доступа к данной странице');
	}else {
	?>
	<img src="<?php echo $row['img'] ?>">
	<form action="" method="post" enctype="multipart/form-data">
		<div>
			ФИО автора: <input  type="text" name="name" value="<?php echo @hc($row['author']);?>">
			<span class="span_err"><?php echo @$errors['name'];?></span>
		</div>


		<div>
			Дата рождения автора: <input  type="number" name="age" value="<?php echo @hc($row['age']);?>">
			<span class="span_err"><?php echo @$errors['age'];?></span>
		</div>


		<div>
			Категория новости:

			<select name="cat">
				<?php
				$cat = ['Художественная','Фантастика','Мистика','Фентези'];
				foreach($cat as $v) {
					if($v == $row['cat'] ){
						echo '<option selected >'.$row['cat'].'</option>';
					}else
						echo '<option >'.$v.'</option>';
				}
				?>;
			</select>
			<span class="span_err"><?php echo @$errors['cat'];?></span>
		</div>


		<div>
			Краткое описание автора:<br>
			<textarea class="input_com"  name="description"><?php echo @hc($row['description']);?></textarea>
			<span class="span_err"><?php echo @$errors['description'];?></span>
		</div>

		<div>
			Биография автора:<br>
			<textarea class="input_com"  name="biografi"> <?php echo hc($row['description']);?></textarea>
			<span class="span_err"><?php echo @$errors['biografi'];?></span>
		</div>

		<div>
			<input type="file" name="file" accept="image/png,image/jpg,image/gif,image/jpeg">
			<span class="span_err"><?php echo @$errors['img'];?></span>
		</div>
		<input type="submit" name="ok" value="Отредактировать Автора">
	</form>


</div>
<?php } ?>
