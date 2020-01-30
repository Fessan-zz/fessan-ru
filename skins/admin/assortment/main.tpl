<div class="modules_all">
		<a href="/admin">Вернутся в админку</a>
	<?php
	if(isset($info)){ ?>

		<h1><?php echo $info; ?> </h1>

	<?php }?>

	<div class="shop_div">Все Товары : </div>
	<div>

	<a href="/admin/assortment/add" class="shop_a">ДОБАВИТЬ Товар.</a>

	</div>
	<form action="" method="post">
		<?php
		while($row = $assortment->fetch_assoc())
		{ ?>
			<div>
				<div class="shop">
					<img src="<?php echo $row['img'] ?>">
					<br>
					<input type="checkbox" name="ids[]" value="<?php echo $row['id'];?>">


					<a class="shop_a"  href="/admin/assortment/main/delete/<?php echo $row['id'];?>">Удалить Товар. </a>
					<br>
					<br>
					<a class="shop_a"  href="/admin/assortment/edit/<?php echo $row['id'];?>">Отредактировать Товар. </a>
					<br>
					<br>
					<div class="shop_div"> <b><?php echo hc ($row['title']) ?></b></div>

					<div class="shop_div"> <b><?php echo hc( $row['code']) ?></b></div>

					<div class="shop_div"> Категория : <?php echo hc ($row['cat']) ?>   </div>
					<div class="shop_div"> <?php echo hc( $row['text']) ?>   </div>
					<div class="shop_div"> Цена: <?php echo (int) $row['price'] ?> рублей.  </div>
					<div class="shop_div"> Товар:<?php echo hc( $row['nal']);

?>
					<span class="span_text"> <?php  echo (int) $row['date']; ?></span>
						<a href="/admin/assortment/good/<?php echo $row['id'];?>"> Посмотреть подробности о товаре</a>


					</div>
			</div>

		<?php	}?>
		<input type="submit" name="delete" value="Удалить записи">
	</form>
</div>