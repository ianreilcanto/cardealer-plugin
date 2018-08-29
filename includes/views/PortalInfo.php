<?php

/**
* 
*/
class PortalInfo
{

	private $cars = array();
	private $carbrands = array();
	private $carmodels = array();
	private $modelValue = array();
	
	function __construct($cars)
	{
		$this->cars = $cars;
		$this->SetBrands();
		$this->SetModel();
	}

	private function SetBrands(){
	
		foreach ($this->cars as $key => $value) {

			if(!in_array($this->cars[$key]["brand"], $this->carbrands)){
					array_push($this->carbrands, $this->cars[$key]["brand"]);
				}
		}

	}

	private function SetModel(){

		

		foreach ($this->cars as $key => $value) {

				array_push($this->carmodels, array( $this->cars[$key]["brand"] => $this->cars[$key]["model"]) );

			}

		foreach ($this->carmodels as $key => $model) {

					foreach ($model as $index => $val) {

						if(count($this->modelValue) == 0){
							array_push($this->modelValue, $index."-".$val);
						}else{

							if(!in_array($index."-".$val, $this->modelValue))
							{
								array_push($this->modelValue, $index."-".$val);
							}

						}
						
					}
				}

	}

	public function GetCarBrands(){
		return $this->carbrands;
	}


	public function GetCarModels(){
		return $this->modelValue;  
	}
}