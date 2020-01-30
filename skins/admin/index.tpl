<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title><?php echo hc(Core::$META['title']); ?></title>
	<meta name="description" content=" <?php echo hc(Core::$META['description']); ?>">
	<meta name="keywords" content="<?php echo hc(Core::$META['keywords']); ?> ">
	<link href="/css/normalize.css" rel="stylesheet">
	<link href="/skins/admin/css/admin.css" rel="stylesheet">
	<link href="/module.css" rel="stylesheet">


	<?php if(count(Core::$CSS)) {
		echo implode("\n", Core::$CSS);
	} ?>
	<?php if(count(Core::$JS)) {
		echo implode("\n", Core::$JS);
	} ?>


</head>

<body>

<header>


	<div class="nav-line">
		<nav class="my-nav clearfix ">

			<div class="logo">
			<a href="/" >
				<h1>Langerba</h1>
			</a>
				</div>
			<?php
			if(isset($_SESSION['user']['access']) && $_SESSION['user'] ['access'] == 5 ){
			?>
			<div class="content_admin">
			<div class="nav_admin">
				<a href="/admin/assortment"> Магазин. </a>
			</div>
			<div class="nav_admin">
				<a href="/admin/books"> Книги. </a>
			</div>
			<div class="nav_admin">
				<a href="/admin/news"> Новости.</a>
			</div>
				<div class="nav_admin">
					<a href="/admin/users"> Пользователи.</a>
				</div>
			<div  class="nav_admin"><a href="/admin/info">PHPinfo.</a></div>

		</div>
			<?php }?>

			<div class="login">
				<?php
				if(isset($_SESSION['user']))	{
					echo   'Приветствую <a href="/cab/user/'.$_SESSION['user']['id'].'">'.$_SESSION['user']['login'].'</a>';
					echo '<div><a href="/cab/exit">Сменить пользователя</a></div>';

				}else echo '
<div >Приветствую <a href="/cab/auth">Гость</a></div> ';

				?>
			</div>


		</nav>
	</div>

</header>
<div class="content_1">

	<?php echo $content; ?>

</div>
<footer>
	<div class="foter clearfix">


		<div class="footer-text">
			<?php
			if(Core::$DATE == date("Y")) {
				echo Core::$DATE;
			}
			else {
				echo Core::$DATE.'-'.date("Y");
			};
			?>
			. All Langerba financings are subject to eligibility, credit and underwriting approval. The programs
			advertised on this page are not a commitment or guarantee from Langerba to provide funds. Programs, rates
			and other terms & conditions on this page are subject to change without notice.<a href="#">Privacy
				Policy</a></div>
	</div>

</footer>


</body>