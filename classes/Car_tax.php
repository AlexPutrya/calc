<?php
// Расчет налога на легковые авто(бензиновые и дизельные)
class Car_tax extends Transport_tax {
	
	public function __construct($price, $age, $fuel, $motor)
	{
		parent::__construct();
		$this->price = $price;
		$this->age = $age;
		$this->fuel = $fuel;
		$this->motor = $motor;
		$this->type = 'car';
	}

	public function calculate_dues()
	{
		$percent = $this->rates->get_percent_dues($this->type, $this->age, $this->motor);
		$this->taxes['dues'] = $this->price * $percent;
	}

	public function calculate_excise()
	{
		$coefficient = $this->rates->get_excise_car($this->fuel, $this->motor);
		$this->taxes['excise'] = $this->motor * $coefficient;
	}
}