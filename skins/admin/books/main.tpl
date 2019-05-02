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

	/////////// вывод авторов....///////
	?>


	<div class="news_menu"><a href="/admin/books" class="news_a">Все авторы </a></div>
	<div class="news_menu"><a href="/admin/books/books" class="news_a">Все книги </a></div>
	<div class="clearfix">

	</div>
	<form action="" method="post">
		<?php  while($row = $author->fetch_assoc()){

			?>


		<div>
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
					<span>	Жанр Литературы :	<i><?php echo hc($row['cat']) ?></i></span>
				</div>

				<div class="book_desk " > Краткое описание автора :<br>
					<em><?php echo hc($row['description']) ?></em>
				</div>

				<div class="book_desk " > Биография автора : <br>
					<p><?php echo hc($row['biografi']) ?></p>
				</div>



				<div class="book">
					<input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
					<a class="news_a" href="/admin/books/main/delete/<?php echo $row['id']; ?>">Удалить автора </a>
					<br>
					<a class="news_a" href="/admin/books/editauthor/<?php echo $row['id']; ?>">Отредактировать
						автора </a>
				</div>


				<br>
				<a class="news_a" href="/admin/books/author/<?php echo hc($row['id']); ?>"> Подробнее</a>

			</div>
			<?php

			}
			?>
	</form>
</div>
