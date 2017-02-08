<?php
// Расчет налога на легковые авто(бензиновые и дизельные)
class Bus_tax extends Transport_tax {
	
	public function __construct($price, $age, $fuel, $motor)
	{
		parent::__construct();
		$this->price = $price;
		$this->age = $age;
		$this->fuel = $fuel;
		$this->motor = $motor;
		$this->type = 'bus';
	}

	public function calculate_dues()
	{
		$percent = $this->rates->get_percent_dues($this->type, $this->age, $this->motor, $this->fuel);
		$this->taxes['dues'] = $this->price * $percent;
	}

	public function calculate_excise()
	{
		$coefficient = $this->rates->get_excise_bus($this->age);
		$this->taxes['excise'] = $this->motor * $coefficient;
	}

	public function get_taxes()
	{
		$this->calculate_dues();
		$this->calculate_excise();
		$this->calculate_nds();
		$this->calculate_pf();
		return $this->taxes;
	}
}