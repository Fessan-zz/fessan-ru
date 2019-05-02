<div class="modules_all">
	<?php


	if(!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
		exit('Вам нет доступа к данной странице');
	}
	else {
		?>


		<a href="/admin/books" class="shop_a">Вернуться к списку </a>
		<form action="/admin/books/addauthor" method="post" enctype="multipart/form-data">

			<div>
				ФИО автора: <input type="text" name="name" value="<?php
				if(isset($_POST['name'])){
					echo hc($_POST['name']);
				}?>">
				<span class="span_err"><?php
					if(isset($errors['name'])) {
						echo $errors['name'];
					} ?></span>
			</div>

			<div>
				Дата рождения автора: <input type="date" name="age" value="<?php
				if(isset($_POST['age'])) {
					echo hc($_POST['age']);
				}?>">
				<span class="span_err"><?php
					if(isset($errors['age'])) {
						echo $errors['age'];
					} ?></span>
			</div>


			<div>
				Категория новости:

				<select name="cat">
					<?php
					$cat = ['Художественная', 'Фантастика', 'Мистика', 'Фентези'];
					foreach($cat as $v) {
						if($v == $_POST['cat']) {
							echo '<option selected >'.$_POST['cat'].'</option>';
						}
						else
							echo '<option >'.$v.'</option>';
					}
					?>;
				</select>
				<span class="span_err"><?php
					if(isset($errors['cat'])) {
						echo $errors['cat'];
					} ?></span>
			</div>

			<div>
				Краткое описание автора:<br>
				<textarea class="input_com" name="description"><?php
					if(isset($_POST['description'])){

					echo hc($_POST['description']);} ?></textarea>
				<span class="span_err"><?php
					if(isset($errors['description'])) {
						echo $errors['description'];
					} ?></span>
			</div>

			<div>
				Биография автора:<br>
				<textarea class="input_com" name="biografi"><?php
					if(isset($_POST['biografi'])){

						echo hc($_POST['biografi']);} ?></textarea>
				<span class="span_err"><?php
					if(isset($errors['biografi'])) {
						echo $errors['biografi'];
					} ?></span>
			</div>

			<input type="file" name="file" accept="image/png,image/jpg,image/gif,image/jpeg">
			<span class="span_err"><?php
				if(isset($errors['img'])) {
					echo $errors['img'];
				} ?></span>
			<input type="submit" name="add" value="Добавить автора">
		</form>
	<?php }; ?>
</div>