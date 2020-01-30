<div class="modules_all">


	<a href="/admin/assortment" class="shop_a">Вернуться к списку товаров</a>
	<form action="/admin/assortment/add" method="post" enctype="multipart/form-data">

		<div class="shop_add">
			Название товара : <input  type="text" name="title" value="<?php
			if(isset($_POST['title'])){
			echo hc($_POST['title']);}?>">
			<span class="span_err"><?php
				if(isset($errors['title'])) {
					echo $errors['title'];
				} ?></span>
		</div>

		<div class="shop_add">
			Код Товара: <input  type="text" name="code" value="<?php if(isset($_POST['code'])){
			echo hc($_POST['code']);}?>">
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
					if($v == $_POST['nal'] ){
						echo '<option selected >'.$_POST['nal'].'</option>';
					}else
						echo '<option >'.$v.'</option>';
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
					if($v == $_POST['cat'] ){
						echo '<option selected >'.$_POST['cat'].'</option>';
					}else
						echo '<option >'.$v.'</option>';
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
			if(isset($_POST['price'])){
				echo (int)$_POST['price'];
			}
			?>">
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
				if(isset($_POST['description'])){
				echo hc($_POST['description']);}?></textarea>
		</div>
		<div class="shop_add">
			Полное описание товара:<br> <span class="span_err"><?php
				if(isset($errors['text'])) {
					echo $errors['text'];
				} ?></span>
			<textarea class="input_com"  name="text"><?php
				if(isset($_POST['text'])){
				echo @hc($_POST['text']);}?></textarea>
		</div>
		<input type="file" name="file" accept="image/png,image/jpg,image/gif,image/jpeg">
		<?php
		if(isset($errors['img'])) {
			echo $errors['img'];
		} ?>
		<input type="submit" name="add" value="Добавить Товар">
	</form>

</div>