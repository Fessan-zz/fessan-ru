<div class="modules_all ">

	<?php

	$res = q( "SELECT * FROM `comments` ORDER BY `id` DESC ");

	if($res->num_rows){
		while($row = $res->fetch_assoc()){

			echo '<span class="comments_login">Логин:<b>'.hc( $row['login']) .' </b></span><br> <br>';
			echo '<span class="comments_date">Дата :<b>'.hc( $row['date']).'</b></span><br>';
			echo '<div class="comments"> Коментарий :<br>'.hc( $row['comments']).'<br><br></div>';

		}
	}
	?>


	<?php if(isset($_SESSION['user']) && $_SESSION['user']['access'] != 1 or 3) { ?>
	<form action="/comments" method="post" class="comments_form">

		<span class="com_log_text"> Логин :<b><?php echo hc($_SESSION['user']['login']) ?></b></span>


<div class="com_text">Комментарий *</div>

		<textarea type="text" name="comments"  placeholder="Комментарий" class="input_com"></textarea>
		<span> <?php echo @$errors['comments']; ?> </span>
		<input type="submit" name="coments_submit" value="Опубликовать">

	</form>
	<span class="span_text"> * - Обязательны для заполнения</span>

</div>
<?php }
else { ?>
<span> Вам необходимо <a href="/cab/auth">авторизоваться</a> </span>
<?php } ?>
