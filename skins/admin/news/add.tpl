<div class="modules_all">
	<?php


	if(!isset($_SESSION['user'])|| $_SESSION['user']['access'] !=5 ){
		exit('Вам нет доступа к данной странице');
	}else {
	?>


		<a href="/admin/news" class="shop_a">Вернуться к списку новостей</a>
	<form action="/admin/news/add" method="post" enctype="multipart/form-data">
		<div>
			Заголовок новости: <input  type="text" name="title" value="<?php
			if(isset($_POST['title'])){
			echo hc($_POST['title']);}?>">
			<span class="span_err"><?php
				if(isset($errors['title'])) {
					echo $errors['title'];
				} ?></span>
		</div>
		<div>
			Категория новости:

			<select name="cat">
				<?php
				$cat = ['Politic','Criminal','Science'];
				foreach($cat as $v) {
					if($v == $_POST['cat'] ){
						echo '<option selected >'.$_POST['cat'].'</option>';
					}else
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
			Описание новости:<br>
			<textarea class="input_com"  name="description"><?php
				if(isset($_POST['description'])){
				echo hc($_POST['description']);}?></textarea>
			<span class="span_err"><?php
				if(isset($errors['description'])) {
					echo $errors['description'];
				} ?></span>
		</div>
		<div>
			Полный текст новости:<br>
			<textarea class="input_com"  name="text"><?php
				if(isset($_POST['text'])) {
					echo $_POST['text'];
				} ?></textarea>
			<span class="span_err"><?php
				if(isset($errors['text'])) {
					echo $errors['text'];
				} ?></span>			</div>
		<input type="file" name="file" accept="image/png,image/jpg,image/gif,image/jpeg">
		<span class="span_err"><?php
			if(isset($errors['img'])) {
				echo $errors['img'];
			} ?></span>
		<input type="submit" name="add" value="Добавить Новость">
	</form>
<?php }; ?>
</div>