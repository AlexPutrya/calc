<?php
spl_autoload_register(function($class_name)
{
	include 'classes/' . $class_name . '.php';
});

$calculator = new Calculator();
$type = empty($_GET['type']) ? 'car' : $_GET['type'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="calculator">
		<nav class="transport">
			<ul>
				<li><a href="index.php?type=car">Легковые<br><img src="img/car.png"></a></li>
				<li><a href="index.php?type=electrocar">Электро<br><img src="img/electrocar.png"></a></li>
				<li><a href="index.php?type=motocycle">Мото<br><img src="img/moto.png"></a></li>
				<li><a href="index.php?type=truck">Грузовые<br><img src="img/truck.png"></a></li>
				<li><a href="index.php?type=bus">Автобусы<br><img src="img/bus.png"></a></li>
			</ul>
		</nav>
		<?php $calculator->$type(); ?>
	</div>
</body>
</html>