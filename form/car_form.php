<h2>Легковые авто</h2>
	<form action="" method="post">
		Цена транспорта
		<input type="number" name ="price" value="<?php echo empty($_POST['price']) ? '20000': $_POST['price']; ?>">
		<select name="currency">
			<option value="2">€</option>
		</select><br>
		Двигатель
		<select name="motor">
			<?php
			for($i = 0.5; $i <= 20.1; $i += 0.1){
			?>	
				<option value="<?= $i*1000 ?>"><?= number_format($i, 1) ?></option>	
			
			<?php } ?>
		</select>
		<select name="fuel">
			<option value="1">бензин</option>
			<option value="2">дизель</option>
		</select><br>
		Возраст транспорта
		<select name="age">
			<option value="1"> новое</option>
			<option value="2"> до 5 лет</option>
			<option value="3"> 5-8 лет</option>
			<option value="4"> от 8 лет</option>
		</select><br>
		<input type="submit" value="Посчитать">
	</form>