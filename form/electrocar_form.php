<h2>Электроавтомобили</h2>
	<form action="" method="post">
		<div class="field">
			<label>Цена транспорта</label>
			<input type="number" name ="price" value="<?php echo empty($_POST['price']) ? '20000': $_POST['price']; ?>">
			<select name="currency">
				<option value="2">€</option>
			</select><br>
		</div>
		<div class="field">
			<label>Мощность</label>
			<input type="input" name ="power" value="100"><br>
		</div>
		<button type="submit">Посчитать</button>
	</form>