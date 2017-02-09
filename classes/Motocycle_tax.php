<?php
// Расчет налога на легковые авто(бензиновые и дизельные)
class Motocycle_tax extends Transport_tax {
	
	public function __construct($price, $motor)
	{
		parent::__construct();
		$this->price = $price;
		$this->motor = $motor;
		$this->type = 'motocycle';
	}

	public function calculate_dues()
	{
		$percent = $this->rates->get_percent_dues($this->type);
		$this->taxes['dues'] = $this->price * $percent;
	}

	public function calculate_excise()
	{
		$coeficient = $this->rates->get_excise_motocycle($this->motor);
		$this->taxes['excise'] = $this->motor * $coeficient; 
	}
}