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
</head>
<body>
	<div>
		<ul>
			<li><a href="index.php?type=car">Легковые авто</a></li>
			<li><a href="index.php?type=electrocar">Электроавтомобили</a></li>
			<li><a href="index.php?type=motocycle">Мотоциклы</a></li>
			<li><a href="index.php?type=truck">Грузовые авто</a></li>
			<li><a href="index.php?type=bus">Автобусы</a></li>
		</ul>
		<?php $calculator->$type(); ?>
	</div>
</body>
</html>