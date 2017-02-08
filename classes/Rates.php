<?php
// Класс ставок налога
class Rates {
	
	// 0 = все старые машины, 1 только абсолютно новые и больше 3л, 2-электро, 3- автобус >10литров
	private $percent_dues =  array('standard'=>0.1, 'new_car'=>0.06,'electrocar' => 0.08, 'bus_more10' => 0.2);
	private $percent_nds = 0.2;//НДС
	private $percent_pf = 0.05;//взнос в пенсионный

	//Указывать за 1cм3 кроме электроавто
	private $coeff_excise = array
	(
		'car_diesel' => array('0/1500' => 0.103, '1500/2500' => 0.327, '2500/20000' => 2.209),
		'car_petrol' => array('0/1000' => 0.102,'1000/1500' => 0.063, '1500/2200' => 0.267, '2200/3000' => 0.267, '3000/20000' => 2.209),
		'electrocar' => 109.129,
		'motocycle' => array('0/500' => 0.062, '500/800' => 0.443, '800/20000' => 0.447),
		'truck' => array(1 => 0.013, 2 => 0.026, 3 => 1.04, 4 => 1.3),
		'bus' => array(1 => 0.013, 2 => 0.026, 3 => 1.04, 4 => 1.3)
	);

	//Отдаем процент НДС
	public function get_nds()
	{
		return $this->percent_nds;
	}

	//Отдаем процент ПФ
	public function get_pf()
	{
		return $this->percent_pf;
	}

	// Процент пошлины в зависимости от возраста машины, типа и обьема
	public function get_percent_dues($type, $age = NULL, $motor = NULL, $fuel = NULL)
	{
		switch ($type) {
			case 'car':
				if($age == 1 && $motor > 3000)
				{
					return $this->percent_dues['new_car'];
				}
				else
				{
					return $this->percent_dues['standard'];
				}
			case 'electrocar':
					return $this->percent_dues['electrocar'];
			case 'bus':
					if($fuel == 2 && $motor > 5000)
					{
						return $this->percent_dues['bus_more10'];
					}
			default:
					return $this->percent_dues['standard'];
		}
	}

	//Возврат коэфициента при попадании в диапазон
	public function check_range($range, $motor)
	{
		foreach ($range as $key => $value)
				{
					$numbers = explode("/", $key);
					if($motor>=$numbers[0] && $motor<$numbers[1])
					{
						return $value;
					}
				}
	}

	//Акциз на авто в зависимости от типа топлива и обема двигателя
	public function get_excise_car($fuel, $motor)
	{
		switch ($fuel) {
			case 1:
				return $this->check_range($this->coeff_excise['car_petrol'], $motor);
			case 2:
				return $this->check_range($this->coeff_excise['car_diesel'], $motor);
		}
	}
	//Акциз на электро
	public function get_excise_electrocar()
	{
		return $this->coeff_excise['electrocar'];
	}

	//Акциз на мото в зависимости от обьема двигателя
	public function get_excise_motocycle($motor)
	{
		return $this->check_range($this->coeff_excise['car_motocycle'], $motor);
	}

	//Акциз на грузовики
	public function get_excise_truck($age)
	{
		return $this->coeff_excise['truck'][$age];
	}

	public function get_excise_bus($age)
	{
		return $this->coeff_excise['bus'][$age];
	}
}