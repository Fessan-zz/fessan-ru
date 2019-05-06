



<?php
if(isset($_SESSION['user'])AND $_SESSION['user']['access'] == 5 ){

?>
	<div class="modules_all">
<span>Главная страница админки</span>
	</div>
<?php }else
	include './skins/default/cab/auth.tpl';
?>

