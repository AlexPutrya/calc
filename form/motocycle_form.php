<h2>Мотоциклы</h2>
	<form action="" method="post">
		<div class="field">
			<label>Цена транспорта</label>
			<input type="number" name ="price" value="<?php echo empty($_POST['price']) ? '20000': $_POST['price']; ?>">
			<select name="currency">
				<option value="2">€</option>
			</select><br>
		</div>
		<div class="field">
			<label>Двигатель</label>
			<input type="input" name ="motor" value="<?php echo empty($_POST['motor']) ? '100': $_POST['motor']; ?>"><br>	
		</div>
		<button type="submit">Посчитать</button>
	</form>