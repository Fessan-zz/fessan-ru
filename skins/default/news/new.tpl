<div class="modules_all">
	<a href="/news">Список Новостей</a>


	<div>
		<div class="clearfix">
			<div class="news_title">
				<strong><?php
					if(isset($row['title'])){
						echo hc( $row['title']);} ?></strong>
			</div>
			<img class="news_img" src="<?php
			if(isset($row['img'])){
				echo $row['img']; } ?>">
			<div class="news_des">
				<em><?php
					if(isset($row['description'])){
						echo hc ($row['description']);} ?></em>
			</div>

			<div class="news_text" >
				<p><?php
					if(isset($row['text'])){
						echo hc ($row['text']);} ?></p>
			</div>

			<?php
			if($row['date']){
				echo (int) $row['date'];} ?> </div><br>

	</div>


