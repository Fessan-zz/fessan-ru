<div class="modules_all">
	<?php



	if(!isset($_SESSION['user'])|| $_SESSION['user']['access'] !=5 ){
		exit('Вам нет доступа к данной странице');
	}else {
		?>


		<a href="/admin/books" class="shop_a">Вернуться к списку </a>
		<form action="" method="post" enctype="multipart/form-data">

			<div>
				Название книги: <input  type="text" name="name" value="<?php
				if(isset($_POST['name'])){
					echo hc($_POST['name']);
				}?>">
				<span class="span_err"><?php
					if(isset($errors['name'])) {
						echo $errors['name'];
					} ?></span>
			</div>

			<div>
				Краткое описание книги:<br>
				<textarea class="input_com"  name="description"><?php
					if(isset($_POST['description'])) {
						echo hc($_POST['description']);
					}?></textarea>
				<span class="span_err"><?php
					if(isset($errors['description'])) {
						echo $errors['description'];
					} ?></span>
			</div>

			<div>
				Цена <input  type="number" name="coast" value="<?php if(isset($_POST['coast'])){
				echo hc($_POST['coast']);}?>"> рублей.
				<span class="span_err"><?php
					if(isset($errors['coast'])) {
						echo $errors['coast'];
					} ?></span>
			</div>

			<div>
				Автор:
				<?php
				while($row = $author->fetch_assoc()){ ?>
				<input type="checkbox" name="author[]" value="<?php echo $row['author'] ?>"> <?php echo $row['author'] ?>
			<?php } ?>
				<span class="span_err"><?php
					if(isset($errors['author'])) {
						echo $errors['author'];
					} ?></span>
			</div>


			<input type="file" name="file" accept="image/png,image/jpg,image/gif,image/jpeg">
			<span class="span_err"><?php
				if(isset($errors['img'])) {
					echo $errors['img'];
				} ?></span>
			<input type="submit" name="add" value="Добавить книгу">
		</form>
	<?php }; ?>
</div>




