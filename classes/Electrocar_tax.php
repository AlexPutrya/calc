<?php
// Расчет налога на легковые авто(бензиновые и дизельные)
class Electrocar_tax extends Transport_tax {
	
	public function __construct($price, $power)
	{
		parent::__construct();
		$this->price = $price;
		$this->power = $power;
		$this->type = 'electrocar';
	}

	public function calculate_dues()
	{
		$percent = $this->rates->get_percent_dues($this->type);
		$this->taxes['dues'] = $this->price * $percent;
	}

	public function calculate_excise()
	{
		$this->taxes['excise'] = $this->rates->get_excise_electrocar();
	}
}