<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<title><?php echo hc(Core::$META['title']); ?></title>
	<meta name="description" content=" <?php echo hc(Core::$META['description']); ?>">
	<meta name="keywords" content="<?php echo hc(Core::$META['keywords']);?> ">
	<link href="/css/normalize.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/module.css" rel="stylesheet">
	<?php if(count(Core::$CSS)) {echo  implode("\n",Core::$CSS); }?>
	<?php if(count(Core::$JS)) {echo  implode("\n",Core::$JS); }?>


</head>

<body>

<header>
	<div class="nav-line">
		<nav class="my-nav clearfix ">
			<a href="/" class="logo">
				<h1>Langerba</h1>
			</a>
			<a href="/news" class="active">Новости</a>
			<a href="/book">Книги</a>
			<div>
				<a href="#"> Modules</a>
				<div class="drop-menu">
					<div class="m2">
						<!--
						<a href="#">Modules<span class="img-menu"></span> </a>
						<div class="drop-menu2">
							<div class="drp2 border-drp2">
															</div>
							<div class="drp2">
								<a href="/index.php?module=auth">Authorization</a>
							</div>
							<div class="drp2">
								<a href="/index.php?module=game">Game</a>
							</div>
							<div class="drp2">
								<a href="/index.php?module=file">File Manager</a>
							</div>
							<div class="drp2">
								<a href="/index.php?module=comments">Comments</a>
							</div>
							<div class="drp2 border-drp2-1">
								<a href="/index.php?module=cab&page=reg">Регистрация</a>
							</div>
						</div>
						-->
					</div>
					<div class="drp2 border-drp2">
						 <a href="/admin">Adminka</a>

					</div>
					<div class="drp2">
						<a href="/cab/auth">Authorization</a>
					</div>
					<div class="drp2">
						<a href="/game">Game</a>
					</div>
					<div class="drp2">
						<a href="/file">File Manager</a>
					</div>
					<div class="drp2">
						<a href="/comments">Comments</a>
					</div>
					<div class="drp2 border-drp2-1">
						<a href="/cab/reg">Регистрация</a>
					</div>
					<div class="drp2 border-drp2-1">
						<a href="/assortment">Товары</a>
					</div>
					<div class="drp2 border-drp2-1">
						<a href="/news">Новости</a>
					</div>
				</div>
			</div>

			<a href="/contact">Contact us </a>

			<div class="login">

					<?php
					if(isset($_SESSION['user']))	{
						echo   'Приветствую <a href="/cab/user/'.$_SESSION['user']['id'].'">'.$_SESSION['user']['login'].'</a>';
						echo '<a href="/cab/exit">Выход</a>';

					}else echo 'Приветсвую <a href="/cab/auth">Гость</a>  <a href="/cab/auth">Войти</a> ';

					?>
			</div>
		</nav>
	</div>

</header>
<div class="content_1">

<?php echo $content;?>

</div>
<footer>
	<div class="foter clearfix">
		<div class="my-fot clearfix ">
			<a href="/" class="logo">
				<h1>Langerba</h1>
			</a>
			<a href="/" class="active">Home</a>
			<a href="/static/aboutus">About Uss</a>
			<a href="/static/courses"> Courses</a>
			<a href="/static/gallery">Gallery</a>
			<a href="//static/contact">Contact us </a>
			<div class="footer-img">
				<a href="#" class="fb"></a>
				<a href="#" class="tw"></a>
				<a href="#" class="gogle"></a>
				<a href="#" class="inst"></a>
				<a href="#" class="in"></a>

			</div>
		</div>
		<hr>
		<div class="footer-text">
			<?php
			if(Core::$DATE == date("Y")){
				echo Core::$DATE;
			}else{
				echo Core::$DATE.'-'.date("Y");
			};
			?>
			. All Langerba financings are subject to eligibility, credit and underwriting approval. The programs advertised on this page are not a commitment or guarantee from Langerba to provide funds. Programs, rates and other terms & conditions on this page are subject to change without notice.<a href="#">Privacy Policy</a></div>
	</div>

</footer>


</body>