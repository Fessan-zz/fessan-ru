
<div class="modules_all">
	<a href="/assortment">Список Товаров</a>

	<img src="<?php echo $row['img'] ?>">


	<div>
		Название товара : <?php echo  hc($row['title']); ?>
	</div>
	<div>
		Категория товара : <?php echo hc($row['cat']); ?>
	</div>
	<div>
		Описание товара : <br>
		<p><?php echo hc($row['description']); ?><p>
	</div>
	<div>Полные описание товара:<br>
		<p><?php echo hc($row['text']); ?><p>
	</div>

</div>


