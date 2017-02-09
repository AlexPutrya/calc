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
				<li><a href="index.php?type=car">Легковые</a></li>
				<li><a href="index.php?type=electrocar">Электро</a></li>
				<li><a href="index.php?type=motocycle">Мото</a></li>
				<li><a href="index.php?type=truck">Грузовые</a></li>
				<li><a href="index.php?type=bus">Автобусы</a></li>
			</ul>
		</nav>
		<?php $calculator->$type(); ?>
	</div>
</body>
</html>