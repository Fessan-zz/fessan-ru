<div class="modules_all">



	<hr>
	<a href="/admin/books/addauthor">Добавить автора</a>
	<br>
	<hr>
	<a href="/admin/books/addbook">Добавить книгу</a>
	<br>
	<hr>

	<?php
	if(isset($info)) { ?>

		<h1><?php echo $info; ?> </h1>

	<?php }

	/////////// вывод книг....///////
	?>


	<div class="news_menu"><a href="/admin/books" class="news_a">Все авторы </a></div>
	<div class="news_menu"><a href="/admin/books/books" class="news_a">Все книги </a></div>
	<div class="clearfix">

	</div>
	<form action="" method="post">
		<?php
		while($row = $books->fetch_assoc()) {



			?>
			<div class="books">
				<div class="clearfix">
					<div class="news_title">
						<strong><?php echo hc($row['name']) ?></strong>
					</div>
					<img class="news_img" src="<?php echo $row['img'] ?>">

					<div >
						<i>Цена: <?php echo (int)$row['coast'] ?></i>
					</div>


					<div class="book_desk">
						<em><?php echo hc($row['description']) ?></em>
					</div>


					<div>
						<input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
						<a class="news_a" href="/admin/books/books/delete/<?php echo $row['id']; ?>">Удалить книгу </a>
						<br>
						<a class="news_a" href="/admin/books/book/<?php echo $row['id']; ?>">Отредактировать
							автора </a>
					</div>

					Дата публикации книги: <?php echo $row['date']; ?> </div>
				<br>
				<a class="news_a" href="/admin/books/book/<?php echo hc($row['id']); ?>"> Подробнее</a>

			</div>
			<hr>
		<?php }


		?>
		<input type="submit" name="delete" value="Удалить записи">
	</form>
</div>
