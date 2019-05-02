
<div class="modules_all">
	<a href="/admin/news/add" class="news_a">ДОБАВИТЬ НОВОСТЬ</a><br>
	<hr>
	<br>
	<?php



	if(isset($info)){ ?>

	<h1><?php echo $info; ?> </h1>

	<?php }?>
	<div class="news_menu" ><a href="/admin/news" class="news_a">Все существующие новости </a> </div>
	<div class="news_menu" ><a href="/admin/news/main?cat=politic" class="news_a"> Новости  политики</a> </div>
	<div class="news_menu"><a  href="/admin/news/main?cat=criminal" class="news_a">Новости криминальные</a> </div>
	<div class="news_menu" ><a href="/admin/news/main?cat=sciense" class="news_a">Новости науки</a> </div>
<br>

	<div class="clearfix">

</div>
<form action="" method="post">
<?php
	while($row = $news->fetch_assoc()){ ?>
<div>
	<div class="clearfix">
		<div class="news_title">
			<strong><?php
				if(isset($row['title']))
				echo hc( $row['title']) ?></strong>
		</div>
		<img class="news_img" src="<?php echo $row['img']  ?>">
		<div class="news_des">
			<em><?php
				if(isset($row['description'])){
				echo hc( $row['description']);} ?></em>
		</div>

		<div>
		<input type="checkbox" name="ids[]" value="<?php
		if(isset($row['id']))
		echo (int) $row['id'];?>">
		<a class="news_a" href="/admin/news/main/delete/<?php echo $row['id'];?>">Удалить новость </a>
			<br>
		<a class="news_a" href="/admin/news/edit/<?php echo $row['id'];?>">Отредактировать новость </a>
	</div>

		<?php  echo (int) $row['date']; ?> </div><br>
	<a class="news_a" href="/admin/news/new/<?php echo hc( $row['id']);?>"> Подробнее</a>

</div>
<hr>
<?php
	}?>
	<input type="submit" name="delete" value="Удалить записи">
</form>
	<?php

	for($i=1;$i<=$pages;$i++){
		echo '<a href="/admin/news/main?pag='.$i.'">'.$i.'</a>||';

	}
	?>

</div>
