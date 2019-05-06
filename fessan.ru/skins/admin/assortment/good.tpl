
<div class="modules_all">

		<a href="/admin/assortment">Верунуться к списку товаров</a>

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
	<a class="shop_a"  href="/admin/assortment/edit/<?php echo $row['id'];?>">Отредактировать Товар. </a>
	<br>
	<a class="shop_a"  href="/admin/assortment/main/delete/<?php echo $row['id'];?>">Удалить Товар. </a>
	<br>
</div>


