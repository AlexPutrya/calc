<h2>Электроавтомобили</h2>
	<form action="" method="post">
		Цена транспорта
		<input type="number" name ="price" value="<?php echo empty($_POST['price']) ? '20000': $_POST['price']; ?>">
		<select name="currency">
			<option value="2">€</option>
		</select><br>
		Мощность
		<input type="input" name ="power" value="100"><br>
		<input type="submit" value="Посчитать">
	</form>