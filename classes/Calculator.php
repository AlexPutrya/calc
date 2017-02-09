<?php
//Калькулятор для разных типов транспортных средств
//Вsводит формы для заполнения и результат
class Calculator {
	
	public function car(){
		include "form/car_form.php";
		if(!empty($_POST))
		{
			extract($_POST, EXTR_OVERWRITE);
			$car = new Car_tax($price, $age, $fuel, $motor);
			$taxes = $car->get_taxes();
			extract($taxes, EXTR_OVERWRITE);
			include "result.php";
		}
	}

	public function electrocar(){
		include "form/electrocar_form.php";
		if(!empty($_POST))
		{
			extract($_POST, EXTR_OVERWRITE);
			$electrocar = new Electrocar_tax($price, $power);
			$taxes = $electrocar->get_taxes();
			extract($taxes, EXTR_OVERWRITE);
			include "result.php";
		}
	}

	public function motocycle(){
		include "form/motocycle_form.php";
		if(!empty($_POST))
		{
			extract($_POST, EXTR_OVERWRITE);
			$moto = new Motocycle_tax($price, $motor);
			$taxes = $moto->get_taxes();
			extract($taxes, EXTR_OVERWRITE);
			include "result.php";
		}
	}

	public function truck(){
		include "form/truck_form.php";
		if(!empty($_POST))
		{
			extract($_POST, EXTR_OVERWRITE);
			$truck = new Truck_tax($price, $age, $fuel, $motor);
			$taxes = $truck->get_taxes();
			extract($taxes, EXTR_OVERWRITE);
			include "result.php";
		}
	}

	public function bus(){
		include "form/bus_form.php";
		if(!empty($_POST))
		{
			extract($_POST, EXTR_OVERWRITE);
			$bus = new Bus_tax($price, $age, $fuel, $motor);
			$taxes = $bus->get_taxes();
			extract($taxes, EXTR_OVERWRITE);
			include "result.php";
		}
	}
}