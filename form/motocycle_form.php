<h2>Мотоциклы</h2>
	<form action="" method="post">
		Цена транспорта
		<input type="number" name ="price" value="<?php echo empty($_POST['price']) ? '20000': $_POST['price']; ?>">
		<select name="currency">
			<option value="2">€</option>
		</select><br>
		Двигатель
		<input type="input" name ="motor" value="<?php echo empty($_POST['motor']) ? '100': $_POST['motor']; ?>"><br>
		<input type="submit" value="Посчитать">
	</form>