<?php
/* 
Класс расчета налога на покупку машины
	$price; Цена
	$age; Возраст
	$fuel; Топливо
	$motor; Обьем двигателя
	$rates; Класс ставок налогов
	$taxes; Массив посчитанных налогов
	$power; Мощность(для электро)
	$type; Тип транспорта
*/
abstract class Transport_tax {
	protected $price;
	protected $age;
	protected $fuel;
	protected $motor;
	protected $rates;
	protected $taxes;
	protected $type;

	public function __construct()
	{
		$this->rates = new Rates();
	}
	// Расчет пошлины по типу, возрасту и обьему
	abstract public function calculate_dues();

	//Рассчитываем акциз для разных типов траспортных средств в потомках
	abstract public function calculate_excise();

	// Расчет НДС- зависит от метода акциза
	public function calculate_nds()
	{	
		$nds = $this->rates->get_nds();
		$this->taxes['nds'] = ($this->price + $this->taxes['dues'] + $this->taxes['excise']) * $nds;
	}

	// Расчет налога в ПФ - зависит от метода акциза
	public function calculate_pf()
	{
		$pf = $this->rates->get_pf();
		$this->taxes['pf'] = ($this->price + $this->taxes['dues'] + $this->taxes['excise']) * $pf;
	}

	//Полная калькуляция для разных типов траспортных средств в потомках
	abstract public function get_taxes();

}