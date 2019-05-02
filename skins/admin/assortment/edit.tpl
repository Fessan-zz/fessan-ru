<div class="modules_all">


	<a href="/admin/assortment" class="shop_a"   >Вернуться к списку товаров</a>
	<img src="<?php echo $row['img'] ?>">
	<form action="" method="post" enctype="multipart/form-data" >

		<div class="shop_add">
			Название товара : <input  type="text" name="title" value="<?php
			if(isset($row['title'])){
			echo hc($row['title']);} ?>">
			<span class="span_err"><?php
				if(isset($errors['title'])) {
					echo $errors['title'];
				} ?> </span>
		</div>

		<div class="shop_add">
			Код Товара: <input  type="text" name="code" value="<?php
			if(isset($row['code'])){
			echo hc($row['code']);} ?>">
			<span class="span_err"><?php
				if(isset($errors['code'])) {
					echo $errors['code'];
				} ?></span>
		</div>
		<div class="shop_add">
			Наличие товара Товара:
			<select name="nal">
				<?php
				$nal = ['Есть в  наличии','Нет в наличии'];
				foreach($nal as $v) {
					if(isset($_POST['nal'])) {
						if($v == $_POST['nal']) {
							echo '<option selected >'.$_POST['nal'].'</option>';
						}
						else
							echo '<option >'.$v.'</option>';
					}else {
						if($v == $row['nal']) {
							echo '<option selected >'.$row['nal'].'</option>';
						}
						else
							echo '<option >'.$v.'</option>';

					}
				}
				?>;

			</select>
			<span class="span_err"><?php
				if(isset($errors['nal'])) {
					echo $errors['nal'];
				} ?></span>
		</div>
		<div class="shop_add">
			Выберите категорию товара :
			<select  name="cat">
				<?php
				$cat = ['Оперативная память','Пылесосы','Снегоуборщики'];
				foreach($cat as $v) {
					if(isset($_POST['cat'])) {
						if($v == $_POST['cat']) {
							echo '<option selected >'.$_POST['cat'].'</option>';
						}
						else
							echo '<option >'.$v.'</option>';
					}else {
						if($v == $row['cat']) {
							echo '<option selected >'.$row['cat'].'</option>';
						}
						else
							echo '<option >'.$v.'</option>';
					}
				}
				?>
			</select>
			<span class="span_err"><?php
				if(isset($errors['cat'])) {
					echo $errors['cat'];
				} ?></span>
		</div>
		<div >
			Цена Товара: <input  type="text" name="price" value="<?php
			if(isset($row['price'])){
			echo @hc($row['price']);} ?>">
			<span class="span_err"><?php
				if(isset($errors['price'])) {
					echo $errors['price'];
				} ?></span>
		</div>

		<div class="shop_add">
			Описание Товара:<br> <span class="span_err"><?php
				if(isset($errors['description'])) {
					echo $errors['description'];
				} ?></span>
			<textarea class="input_com"  name="description"><?php
				if(isset($row['description'])){
				echo hc($row['description']);}?></textarea>
		</div>
		<div class="shop_add">
			Полное описание товара:<br> <span class="span_err"> <?php
				if(isset($errors['text'])) {
					echo $errors['text'];
				} ?></span>
			<textarea class="input_com"  name="text"><?php
				if(isset($row['text'])){
				echo hc($row['text']);} ?></textarea>
		</div>

		<input type="file" name="file" accept="image/png,image/jpg,image/gif,image/jpeg">

		<br>

		<input type="submit" name="add" value="Отредактировать  Товар">



	</form>






</div>