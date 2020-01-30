<div class="modules_all">

	<?php
	if(isset($info)) { ?>

		<h1><?php echo $info; ?> </h1>

	<?php }

	/////////// вывод книг....///////
	?>


	<div class="news_menu"><a href="/book" class="news_a">Все авторы </a></div>
	<div class="news_menu"><a href="/book/books" class="news_a">Все книги </a></div>
	<div class="clearfix">

	</div>
	<form action="" method="post">
		<?php
		while($row = $books->fetch_assoc()) {
			$res = q("
			SELECT *
			FROM `books2books_author` 
			WHERE `book_id`	=".$row['id']."
			
			");
			while($res2 = $res->fetch_assoc()) {
				$id[] = $res2['author_id'];
			}
			if(isset($id)) {
				$q = q("
					SELECT *
					FROM `books_author`
					WHERE `id` IN (".implode(",", $id).")
					");
			}

			?>
			<div class="books">
				<div class="clearfix">
					<div class="news_title">
						<strong><?php echo hc($row['name']) ?></strong>
					</div>
					<img class="news_img" src="<?php echo $row['img'] ?>">

					<div>
						<i>Цена: <?php echo (int)$row['coast'] ?></i>
					</div>


					<div class="book_desk">
						<em><?php echo hc($row['description']) ?></em>
					</div>

					<div>
						<p> Авторы :
							<?php
							if(isset($q)) {
								while($row2 = $q->fetch_assoc()) {
									echo '<br><a href="/book/author/'.$row2['id'].'">'.$row2['author'].'</a><br> ';
								}
							}
							unset($id);
							unset($q);

							?></p><br>
					</div>


					Дата публикации книги: <?php echo $row['date']; ?> </div>
				<br>
				<a class="news_a" href="/book/book/<?php echo hc($row['id']); ?>"> Подробнее</a>

			</div>
			<hr>
		<?php }
		DB::close();

		?>

	</form>
</div>
