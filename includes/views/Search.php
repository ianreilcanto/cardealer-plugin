<?php

/**
* 
*/
class Search
{
	private $searchResult = array();
	private $cars = array();
	private $brand = array();
	private $model = array(); 
	private $gearboxtype = null;
	private $fuel = null;
	private $yearFrom = null;
	private $yearTo = null;
	private $milesFrom = null;
	private $milesTo = null;
	private $priceFrom = null;
	private $priceTo = null;
	private $bodytype = null;

	
	function __construct($cars, $searchItems){

		$this->cars = $cars;
		$this->SetSearchItems($searchItems);
		$this->SearchCarsByBrand();
		$this->SearchCarsByModel();
		$this->SearchCarsByFuelType();
		$this->SearchCarsByGearBox();
		$this->SearchCarsByYearModel();
		$this->SearchCarsByMiles();
		$this->SearchCarsByPrice();
		$this->SearchCarsByBodyType();

	}

	public function SetSearchItems($searchItems){


		$this->brand = explode(",", $searchItems["brandValue"]);
		$this->model =  explode(",", $searchItems["modelValue"]);
		$this->fuel = $searchItems["fuelValue"];
		$this->gearboxtype = $searchItems["engineValue"];
		$this->yearFrom = $searchItems["yearFrom"];
		$this->yearTo =  $searchItems["yearTo"];
		$this->milesFrom =  $searchItems["milesFrom"] ;
		$this->milesTo = $searchItems["milesTo"] ;
		$this->priceFrom = $searchItems["priceFrom"];
		$this->priceTo =  $searchItems["priceTo"];	
		$this->bodytype = explode(",",$searchItems["bodytypeValue"]);

	}

	private function SearchCarsByBrand(){

	if(!empty($this->brand[0])){

			$this->searchResult = array_filter($this->cars, function ($cars) use ($brand) { 

								if(in_array($cars["brand"], $this->brand)){
									return $cars;
								}
						} ); 
		}else{

			$this->searchResult = $this->cars;

		}
	}

	private function SearchCarsByModel(){

		if(!empty($this->model[0])){
			$this->searchResult = array_filter($this->searchResult, function($searchResult) use ($model){

									if(in_array($searchResult["model"], $this->model)){
										return $searchResult;
									}

								});
		}
	}

	private function SearchCarsByFuelType(){
		//ucwords
		if($this->fuel != "none"){
			$this->searchResult = array_filter($this->searchResult, function($searchResult) use ($fuel){

									if(ucwords($searchResult["fueltype"]) == ucwords($this->fuel)){
										return $searchResult;
									}

								});
		}

	}

	private function SearchCarsByGearBox(){

		//ucwords
		if($this->gearboxtype != "none"){
			$this->searchResult = array_filter($this->searchResult, function($searchResult) use ($gearboxtype){

									if(ucwords($searchResult["gearboxtype"]) == ucwords($this->gearboxtype)){
										return $searchResult;
									}

								});
		}

	}

	private function SearchCarsByYearModel(){

		
		if( $this->yearFrom != "none" || $this->yearTo != "none"){


			$this->searchResult = array_filter($this->searchResult, function($searchResult) use ($yearFrom,$yearTo){

					$min = 0;
					$max = 0;
		

					if($this->yearFrom == "none"){
						$min = 1979;
					}else{
						$min = (int) $this->yearFrom;
					}

					if($this->yearTo == "none"){
						$max =  2018;
					}else{
						$max = (int) $this->yearTo;
					}

					$carModelyear = (int) $searchResult["yearmodel"];
										
									if(($carModelyear >= $min) && ($carModelyear <= $max)){

										return $searchResult;
									}							

								});

		}
}

private function SearchCarsByMiles(){

	if( $this->milesFrom != "none" || $this->milesTo != "none"){


			$this->searchResult = array_filter($this->searchResult, function($searchResult) use ($milesFrom,$milesTo){

					$min = 0;
					$max = 0;
		

					if($this->milesFrom == "none"){
						$min = 0;
					}else{
						$min = (int) $this->milesFrom;
					}

					if($this->milesTo == "none"){
						$max =  35000;
					}else{
						$max = (int) $this->milesTo;
					}

					$carMiles = (int) $searchResult["miles"];
										
									if(($carMiles >= $min) && ($carMiles <= $max)){

										return $searchResult;
									}							

								});

		}
}

private function SearchCarsByPrice(){

	if( $this->priceFrom != "none" || $this->priceTo != "none"){


			$this->searchResult = array_filter($this->searchResult, function($searchResult) use ($priceFrom,$priceTo){

					$min = 0;
					$max = 0;
		

					if($this->priceFrom == "none"){
						$min = 0;
					}else{
						$min = (int) $this->priceFrom;
					}

					if($this->priceTo == "none"){
						$max =  500000;
					}else{
						$max = (int) $this->priceTo;
					}

					$carPrice = (int) str_replace(".", "", $searchResult["price-sek"]);

										
									if(($carPrice >= $min) && ($carPrice <= $max)){

										return $searchResult;
									}							

								});

		}

}

private function SearchCarsByBodyType(){

	if(!empty($this->bodytype[0])){
			$this->searchResult = array_filter($this->searchResult, function($searchResult) use ($bodytype){

				//print_r($this->bodytype);

									if(in_array($searchResult["bodytype"], $this->bodytype)){
										return $searchResult;
									}

								});
		}

}



public function GetSearchResult(){
	return $this->searchResult;
}



}