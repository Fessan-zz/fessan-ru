


<div class="modules_all">
	<?php

	if(!isset($_SESSION['user'])|| $_SESSION['user']['access'] !=5 ){
		exit('Вам нет доступа к данной странице');
	}else {
	?>
	<img src="<?php
	if(isset($row['img'])){
	echo $row['img']; }?>">
	<form action="" method="post" enctype="multipart/form-data">
		<div>
			Заголовок новости: <input  type="text" name="title" value="<?php
			if(isset($row['title'])){
			echo  hc($row['title']);} ?>">
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
					if($v == $row['cat'] ){
						echo '<option selected >'.$row['cat'].'</option>';
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
				if(isset($row['description'])){
				echo hc($row['description']);}
			?></textarea>
			<span class="span_err"><?php
				if(isset($errors['description'])) {
					echo $errors['description'];
				} ?></span>
		</div>
		<div>
			Полный текст новости:<br>
			<textarea class="input_com"  name="text"><?php
				if(isset($row['text'])){
				echo hc($row['text']);} ?></textarea>
			<span class="span_err"><?php
				if(isset($errors['text'])) {
					echo $errors['text'];
				} ?></span>
		</div>
		<div>
		<input type="file" name="file" accept="image/png,image/jpg,image/gif,image/jpeg">
		<span class="span_err"><?php
			if(isset($errors['img'])) {
				echo $errors['img'];
			} ?></span>
		</div>
		<input type="submit" name="ok" value="Отредактировать Новость">
	</form>


</div>
<?php } ?>
