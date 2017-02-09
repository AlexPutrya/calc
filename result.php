<div>
		<h3>Цена с растаможкой <span><?= ($price+$dues+$excise+$nds) ?>€</span></h3>
		В том числе:
		<p>НДС: <span><?= $nds?>€</span></p>
		<p>Пошлина: <span><?= $dues?>€</span></p>
		<p>Акциз: <span><?= $excise?>€</span></p>
		<h3>Итого только растаможка: <span><?= ($dues+$excise+$nds) ?>€</span></h3>
		<h2>Дополнительные расходы:</h2>
		<p>Налог в пенсионный фонд: <span><?= $pf?>€</span></p>
	</div>