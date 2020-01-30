<div class="modules_all">

	<?php
	if(isset($info)){ ?>

		<h1><?php echo $info; ?> </h1>

	<?php }?>
	<div class="shop_div">Все Товары : </div>

	<div>
		<?php
		while($row = $assortment->fetch_assoc()){ ?>
			<div>
				<div class="shop">
					<img src="<?php echo $row['img'] ?>">

					<br>
					<br>
					<div class="shop_div">  <b><?php echo $row['title'] ?></b></div>

					<div class="shop_div"> <b><?php echo $row['code'] ?></b></div>

					<div class="shop_div"> Категория : <?php echo $row['cat'] ?>   </div>
					<div class="shop_div"> <?php echo $row['text'] ?>   </div>
					<div class="shop_div"> Цена: <?php echo $row['price'] ?> рублей.  </div>
					<div class="shop_div"> Товар:<?php echo $row['nal'];
?>
					<span class="span_text"> <?php  echo $row['date']; ?></span>
						<br>
						<a href="/assortment/good/<?php echo $row['id'];?>"> Посмотреть подробности о товаре</a>


					</div>
			</div>

		<?php	}?>
	</div>
</div>