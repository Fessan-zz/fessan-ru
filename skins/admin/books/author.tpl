<div class="modules_all">
	<a href="/admin/books">Список Авторов</a>

	<div>
		<div class="clearfix">
			<div class="news_title">
				<strong><?php echo hc($row['author']) ?></strong>
			</div>
			<img class="news_img" src="<?php echo $row['img'] ?>">

			<div class="news_des">
				Дата рождения автора : <?php echo (int)$row['age'] ?>
			</div>

			<div class="news_des">
				<em><?php echo hc($row['description']) ?></em>
			</div>

			<div class="news_text">
				<p><?php echo hc($row['biografi']) ?></p>
			</div>

			<?php echo 'Дата публикации '.(int)$row['date']; ?> </div>
		<br>

		<div class="news_text"> Книги автора :
			<p><?php
				while($row2 = $q->fetch_assoc()){
					echo '<br><a href="/admin/books/book/'.$row2['id'].'">'. $row2['name'].'</a> <br>';
				}

				@hc($row2['name']) ?></p>
		</div>


	</div>

	<input type="checkbox" name="ids[]" value="<?php echo $row['id']; ?>">
	<a class="news_a" href="/admin/books/main/delete/<?php echo $row['id']; ?>">Удалить автора </a>
	<br>
	<a class="news_a" href="/admin/books/editauthor/<?php echo $row['id']; ?>">Отредактировать автора</a>
