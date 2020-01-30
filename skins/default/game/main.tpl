<div class="form_game modules_all">

		<form method="post" action="/game">
		<input type="text" name="num" placeholder="Введите число">

		<p> В поле выбора можно ввести только числа от 1 до 3 (включительно).</p>
		<br>
		<br>
		<input type="submit" name="submit" value="Ударить">

	</form>
	<br>
	<div>  <?php echo 'У Вашего персонажа осталось '.$_SESSION['client']. ' жизни.' ?> </div>
	<br>
	<div>  <?php echo 'У  персонажа компьютера осталось '.$_SESSION['server']. ' жизни.' ?> </div>

</div>