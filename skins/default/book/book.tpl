<div class="modules_all">
	<a href="/book">Список Авторов</a>


	<div>
		<div class="clearfix">
			<div class="news_title">
				<strong><?php echo hc($row['name']) ?></strong>
			</div>
			<img class="news_img" src="<?php echo $row['img'] ?>">


			<div class="news_des">
				<em><?php echo hc($row['description']) ?></em>
			</div>

			<div class="news_text">
				<p><?php echo hc($row['coast']) ?></p>
			</div>

			<?php echo 'Дата публикации '.(int)$row['date']; ?> </div>
		<br>

		<div class="news_text"> Авторы :
			<p><?php
				while($row2 = $q->fetch_assoc()){
					echo '<br><a href="/book/author/'.$row2['id'].'">'. $row2['author'].'</a> <br>';
				}


				@hc($row['biografi']) ?></p>
		</div>


	</div>
