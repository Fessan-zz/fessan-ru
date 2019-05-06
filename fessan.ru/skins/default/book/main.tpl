<div class="modules_all">
	<?php
	if(isset($info)) { ?>

		<h1><?php echo $info; ?> </h1>
	<?php }
	/////////// вывод авторов....///////
	?>
<div class="clearfix">
	<div class="news_menu"><a href="/book" class="news_a">Все авторы </a></div>
	<div class="news_menu"><a href="/book/books" class="news_a">Все книги </a></div>
</div>

		<?php
		while($row = $author->fetch_assoc()) {
		$res = q("
  SELECT *
  FROM `books2books_author`
  WHERE `author_id` = ".$row['id']."
");
		while($res2 = $res->fetch_assoc()) {
			$id[] = $res2['book_id'];
		}
		if(isset($id)) {
			$q = q("
		SELECT *
		FROM `books`
		WHERE `id` IN (".implode(",", $id).")
			
		");
		}

		?>


			<div class="">
				<div class="book_author ">
					<strong><?php echo hc($row['author']) ?></strong>
				</div>
				<div class="book">
					<img class="book_img" src="<?php echo $row['img'] ?>">
				</div>
				<div class="book ">
					<i>Дата рождения :<?php echo (int)$row['age'] ?></i>
				</div>
				<div class="book ">
					<p> Книги автора  :<br>
						<?php
						if(isset($q)) {
							while($row2 = $q->fetch_assoc()) {
								echo '<br><a href="/book/book/'.$row2['id'].'">'.$row2['name'].'</a> <br>';
							}
						}
						unset($id);
						unset($q);

						?></p><br>
				</div>
				<div class="book ">
					<span>	Жанр Литературы :<br>	<i><?php echo hc($row['cat']) ?></i></span><br>
				</div>

				<div class="book_desk " > Краткое описание книги :
					<p><?php echo hc($row['description']) ?></p>
				</div>

				<div class="book_desk " > Краткая биография автора :
					<p><?php echo hc($row['biografi']) ?></p>
				</div>


				<br>
				<a class="news_a" href="/book/author/<?php echo hc($row['id']); ?>"> Подробнее</a>

			</div>
			<hr>
			<?php }

			DB::close();

			?>


</div>
