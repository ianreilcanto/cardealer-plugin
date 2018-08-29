<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<?php 
	error_reporting(0);
	
 	$car = file_get_contents("http://data.bytbil.com/sellers/satramotorcenter/xml/satramotorcenter.xml");
	
	
	if($cars)
	{
		$xml = simplexml_load_string($cars);
		

	}else{

		$cars = file_get_contents(plugins_url().'/linohalm-bytbil/assets/satramotorcenter.xml');
		$xml = simplexml_load_string($cars);

	}

		$carJson = json_encode($xml);
		$cars = json_decode($carJson,TRUE);

		// include_once "PortalInfo.php";
		// $carInfo = new PortalInfo($cars["car"]);

		// $carbrands = $carInfo->GetCarBrands();
		//$carmodels = $carInfo->GetCarModels();


			
?>
<style type="text/css">
	.thumbnail-container{	
		position: relative;
	}
	.thumbnail{
		min-height: 326px !important;
	}

	.btn-select{
		height: 37px !important;
	    background: #fff !important;
	    overflow: hidden;
	    color: #8c8c8c !important;
	    font: 13px/35px "Trebuchet MS",Arial,Helvetica,sans-serif;
	    border: none !important;
	    text-align: left !important;
	    padding: 6px 12px;
	    width: 100%;
	    /*border-radius: 5px;*/
	    margin-bottom: 5px;
	    box-shadow: 2px 2px 5px #888888;
	}
	/*.btn-search{
	    font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif !important;
	    font-size: 14px !important;
	    border: 1px solid #08c !important;
	    background-color: #08c !important;
	    border-radius: 4px !important;
	    padding: 5px !important;
	    width: 87%;
	    color: #fff;
	    margin-top:5px;
	}
	.arrange{
		width: 100%
	}*/
	/*.select-order{
		margin-left: 25px;
	    background: #fff;
	    -webkit-border-radius: 3px;
	    overflow: hidden;
	    -moz-border-radius: 3px;
	    border-radius: 3px;
	    position: relative;
	    cursor: default;
	    height: 37px;
	    padding-left: 15px;
	    border: 1px solid #fff;
	    float: left;
	    color: #8c8c8c;
	    font: 13px/35px "Trebuchet MS", Arial, Helvetica, sans-serif;
	    box-shadow: 0 1px 0 rgba(255,255,255,.09), 0 1px 3px rgba(0,0,0,.36) inset;
	    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.09), 0 1px 3px rgba(0,0,0,.36);
	}
	.select-option, .select-engine, .select-year, .select-miles, .select-price ,.select-yearTo, .select-milesTo, .select-priceTo, .select-fuel{
		height: auto;
		max-height: 200px !important;
		width: 156px;
		background: #fff !important;
		overflow: scroll;
		text-align: left;
		display: none;
		position: absolute;
		z-index: 1;
		overflow-x: hidden;
		margin: 0 !important;
	}
	input[type='checkbox'] { 
		width: 20px !important;
	 }*/
</style>
<!-- <div style="position: relative; z-index: 1"  class="row">
		<form method="POST" action="car-search" id="form-search">
			<input id="id-brandValue" type="hidden" name="brandValue" value="">
			<input id="id-yearFrom" type="hidden" name="yearFrom" value="">
			<input id="id-yearTo" type="hidden" name="yearTo" value="">
			<input id="id-milesFrom" type="hidden" name="milesFrom" value="">
			<input id="id-milesTo" type="hidden" name="milesTo" value="">
			<input id="id-priceFrom" type="hidden" name="priceFrom" value="">
			<input id="id-priceTo" type="hidden" name="priceTo" value="">
			<input id="id-engine" type="hidden" name="engineValue" value="">
			<input id="id-fuel" type="hidden" name="fuelValue" value="">
			<input id="id-model" type="hidden" name="modelValue" value="">
			<input id="id-bodytype" type="hidden" name="bodytypeValue" value="">

			<input id="id-cars" type="hidden" name="cars" value="">
		</form>
		<div class="col-lg-10 col-md-10 col-md-offset-2 col-lg-offset-2">
			<div style="text-align: center; position: relative;" class="col-lg-2 col-md-2" class="dropdown">
				<button id="" class="btn btn-default btn-select btn-brand">Bilmärken</button>
				<ul class="select-brand select-option">
					<?php foreach ($carbrands as $key => $value) { ?>
						<li>
							<input type="checkbox" name="brand[]" value="<?php echo($value); ?>"><?php echo($value); ?></input>
						</li>
					<?php } ?>
											
				</ul>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-engine">Växellåda</button>
				<select class="select-engine" name="engine" style="display: none">
					<option value="none">Växellåda</option>
					<option value="Automatisk">Automatisk</option>
					<option value="Manuell">Manuell</option>
					<option value="Sekventiell">Sekventiell</option>
				</select>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-year">Årsmodell från</button>
				<select class="select-year" name="year" style="display: none">
					<option value="none">Årsmodell från</option>
					<?php for($i =  date('Y')+1 ; $i >= 1979; $i--){ ?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php } ?>
				</select>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-miles">Mil från</button>
				<select class="select-miles" name="miles" style="display: none">
					<option value="none">Mil från</option>
					<?php for($i =  1000 ; $i <= 35000; $i++){ 

						if($i % 1000 === 0){
						?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php
						}
						} ?>
				</select>

			</div>
			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-price">Pris från</button>
				<select class="select-price" name="price" style="display: none">
					<option value="none">Pris från</option>
					<?php for($i =  10000 ; $i <= 500000; $i++){ 

						if($i % 10000 === 0){
						?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php
						}
						} ?>
				</select>
			</div>
		</div>
		<div class="col-lg-10 col-md-10 col-md-offset-2 col-lg-offset-2">
			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-model">Modell</button>
				<ul class="select-model select-option">
				<?php foreach ($carmodels as $key => $value) { ?>
						<?php 
							$models = explode("-", $value)
						?>
						 <li style="display: none;" class="<?php echo($models[0]); ?>">
							<input type="checkbox" name="model[]" value="<?php echo($models[1]); ?>"><?php echo($models[1]); ?></input>
						</li>
					
				<?php } ?>						
				</ul>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-fuel">Drivmedel</button>
				<select class="select-fuel" name="fuel" style="display: none">
					<option value="none">Drivmedel</option>
					<option value="Bensin">Bensin</option>
					<option value="Ethanol">Bensin/Ethanol</option>
					<option value="Gas">Bensin/Gas</option>
					<option value="Diesel">Diesel</option>
					<option value="El">El</option>
				</select>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-yearTo">Årsmodell till</button>
				<select class="select-yearTo" name="yearTo" style="display: none">
					<option value="none">Årsmodell till</option>
					<?php for($i =  date('Y')+1 ; $i >= 1979; $i--){ ?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php } ?>
				</select>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-milesTo">Mil till</button>
				<select class="select-milesTo" name="milesTo" style="display: none">
					<option value="none">Mil till</option>
					<?php for($i =  1000 ; $i <= 35000; $i++){ 

						if($i % 1000 === 0){
						?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php
						}
						} ?>
				</select>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2">
				<button class="btn-select btn btn-default btn-priceTo">Pris till</button>
				<select class="select-priceTo" name="priceTo" style="display: none">
					<option value="none">Pris till</option>
					<?php for($i =  10000 ; $i <= 500000; $i++){ 

						if($i % 10000 === 0){
						?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php
						}
						} ?>
				</select>
			</div>
		</div>

		<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" style="margin-bottom: 40px">
			<div class="col-md-12 col-lg-12" style="margin-top: 40px;margin-bottom: 40px">
				<div class="col-md-2 col-lg-2">
					<img isSelected="false" bodytype="Cab" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/Cab.png">
				</div>
				<div class="col-md-2 col-lg-2">
					<img isSelected="false" bodytype="Halvkombi" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/Halvkombi.png">
				</div>
				<div class="col-md-2 col-lg-2">
					<img isSelected="false" bodytype="Kombi" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/Kombi.png">
				</div>
				<div class="col-md-2 col-lg-2">
					<img isSelected="false" bodytype="Sedan" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/Sedan.png">
				</div>
				<div class="col-md-2 col-lg-2">
					<img isSelected="false" bodytype="SUV" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/SUV.png">
				</div>
				<div class="col-md-2 col-lg-2">
					<img isSelected="false" bodytype="Transport" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/transport.png">
				</div>
			</div>
			<div class="col-md-3 col-lg-3 pull-right">
				<button class="btn-search">
					Starta sökning
				</button>
			</div>
		</div>
	
</div> -->

<div style="position: relative; z-index: 1" class="main-contianer col-lg-12 col-md-12" ng-app="carPortal" ng-controller="xmlImportController as ctrl">

<div class="col-md-3 thumbnail-container" ng-repeat="car in ctrl.carJson.car | shuffle | startFrom: currentPage*pageSize | limitTo:pageSize">
<form id="form-car" action="car-info" method="POST">
	<input id="car-value-id" action="car-info" type="hidden" name="cardata" value="">
	<input id="cars-value-id" action="car-info" type="hidden" name="carsdata" value="">
</form>

    <div class="thumbnail" >
      <a href="#" data-car="{{ car }}" ng-click="carInfo(this)">
        <img ng-show="car.images.image[0]" ng-src="{{ car.images.image[0] }}" alt="Fjords" style="width:100%">
        <div style="position: absolute;left:7%;top:37%;background: #3ba7e0; color: #fff; padding: 10px;">
        	{{ car["price-sek"].replace(".", " ") }}:-
        </div>
        <div class="caption">
          <p>
          	<h4>{{ car.brand }} {{ car.model }} {{ car.modeldescription }}</h4>
          	<span style="font-size: 12px;">Årsmodell: {{ car.yearmodel }}</span> <span style="font-size: 12px;">Miltal: {{ car.miles }}</span> <span style="font-size: 12px;">
          </p>
        </div>
      </a>
    </div>
 </div>

    <!-- <div style="margin-left:20px;position: absolute;top: 100%;left: 40%">
	    <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
	            F&ouml;reg&aring;ende
	    </button>
	    <button ng-disabled="currentPage == numberOfPages - 1" ng-click="currentPage=currentPage+1">
	        N&auml;sta
	    </button>
    </div> -->
</div>

<script type="text/javascript">
		var app = angular.module("carPortal", []); 

		app.controller("xmlImportController", function($scope, $http) {
			    
			    var vm = this;
			    vm.carJson = <?php echo $carJson; ?>;

			    $scope.pageSize = 12;
                $scope.numberOfPages;
                $scope.currentPage = 0;

			    function init()
			    {	 
			    	console.log(vm.carJson);   	
			    }

			    $scope.carInfo = function(item)
			    {
			    	$("#car-value-id").val(JSON.stringify(item.car));
			    	$("#cars-value-id").val(JSON.stringify(vm.carJson));

			    	$("#form-car").submit();
			    }


			init();

		});

		  app.filter('startFrom', function() {
                        return function(input, start) {

                            if (!input || !input.length) {
                                return;
                            }
                            start = +start; //parse to int
                            return input.slice(start);
                        }
                    });
		  app.filter('shuffle', function() {
		    var shuffledArr = [],
		        shuffledLength = 0;
		    return function(arr) {
		        var o = arr.slice(0, arr.length);
		        if (shuffledLength == arr.length) return shuffledArr;
		        for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		        shuffledArr = o;
		        shuffledLength = o.length;
		        return o;
		    };
		});
</script>

<!-- <script type="text/javascript">
	jQuery(function(){

		//load model
		var s_brand = jQuery("input[name='brand[]']:checked");

		if(s_brand.length > 1 && s_brand.length != 0)
		{
			jQuery.each(s_brand, function( index, value ) {
			  
			 jQuery.each(s_brand, function( index, value ) {
				  
				  	jQuery("."+value.value).toggle();
				});

			});

		}else if(s_brand.length == 1){

			
			jQuery.each(s_brand, function( index, value ) {
			  
			 jQuery.each(s_brand, function( index, value ) {
				  
				  	jQuery("."+value.value).toggle();
				});

			});
		}

		//brand
		jQuery(".btn-brand").bind("click",function(){
			jQuery(".select-brand").toggle();
			jQuery(".select-brand").prop("size",5);

			var selected_brand = jQuery("input[name='brand[]']:checked");

			//console.log(selected_brand[0].value);	

			if(selected_brand.length > 1 && selected_brand.length != 0)
			{
				jQuery(".btn-brand").text(selected_brand.length+" valda");

				jQuery.each(selected_brand, function( index, value ) {
				  
				  	jQuery("."+value.value).toggle();
				});

			}else if(selected_brand.length == 1)
			{
				jQuery(".btn-brand").text(selected_brand[0].value);

				jQuery.each(selected_brand, function( index, value ) {
				  
				  jQuery("."+value.value).toggle();

				});
			}
			else{
				jQuery(".btn-brand").text("Bilmärken");
			} 

		});

		//engine
		jQuery(".btn-engine").bind("click",function(){
			jQuery(".select-engine").toggle();
			jQuery(".select-engine").attr("size",4);

			var val = jQuery(".select-engine").val();

			if(val == "none"){
				
				jQuery(".btn-engine").text("Växellåda");

			}else{

				jQuery(".btn-engine").text(val);
			}

		});

		//year
		jQuery(".btn-year").bind("click",function(){
			jQuery(".select-year").toggle();
			jQuery(".select-year").attr("size",6);

			var val = jQuery(".select-year").val();

			if(val == "none"){
				
				jQuery(".btn-year").text("Årsmodell från");

			}else{

				jQuery(".btn-year").text(val);
			}

		});

		jQuery(".btn-yearTo").bind("click",function(){
			jQuery(".select-yearTo").toggle();
			jQuery(".select-yearTo").attr("size",6);

			var val = jQuery(".select-yearTo").val();

			if(val == "none"){
				
				jQuery(".btn-yearTo").text("Årsmodell till");

			}else{

				jQuery(".btn-yearTo").text(val);
			}

		});

		//Miles
		jQuery(".btn-miles").bind("click",function(){
			jQuery(".select-miles").toggle();
			jQuery(".select-miles").attr("size",6);

			var val = jQuery(".select-miles").val();

			if(val == "none"){
				
				jQuery(".btn-miles").text("Mil från");

			}else{

				jQuery(".btn-miles").text(val);
			}

		});

		jQuery(".btn-milesTo").bind("click",function(){
			jQuery(".select-milesTo").toggle();
			jQuery(".select-milesTo").attr("size",6);

			var val = jQuery(".select-milesTo").val();

			if(val == "none"){
				
				jQuery(".btn-milesTo").text("Mil från");

			}else{

				jQuery(".btn-milesTo").text(val);
			}

		});

		//price
		jQuery(".btn-price").bind("click",function(){
			jQuery(".select-price").toggle();
			jQuery(".select-price").attr("size",6);

			var val = jQuery(".select-price").val();

			if(val == "none"){
				
				jQuery(".btn-price").text("Pris från");

			}else{

				jQuery(".btn-price").text(val);
			}

		});

		jQuery(".btn-priceTo").bind("click",function(){
			jQuery(".select-priceTo").toggle();
			jQuery(".select-priceTo").attr("size",6);

			var val = jQuery(".select-priceTo").val();

			if(val == "none"){
				
				jQuery(".btn-priceTo").text("Pris till");

			}else{

				jQuery(".btn-priceTo").text(val);
			}

		});

		//fuel
		jQuery(".btn-fuel").bind("click",function(){
			jQuery(".select-fuel").toggle();
			jQuery(".select-fuel").attr("size",4);

			var val = jQuery(".select-fuel").val();

			if(val == "none"){
				
				jQuery(".btn-fuel").text("Drivmedel");

			}else{

				jQuery(".btn-fuel").text(val);
			}

		});

		//model
		jQuery(".btn-model").bind("click",function(){
			jQuery(".select-model").toggle();
			jQuery(".select-model").prop("size",5);

			var selected_model = jQuery("input[name='model[]']:checked");

			//console.log(selected_brand[0].value);	

			if(selected_model.length > 1 && selected_model.length != 0)
			{
				jQuery(".btn-model").text(selected_model.length+" valda");
			}else if(selected_model.length == 1)
			{
				jQuery(".btn-model").text(selected_model[0].value);
			}
			else{
				jQuery(".btn-model").text("Modell");
			} 

		});

		//choose body type
		jQuery(".img-select").bind("click",function(){

			var selectedImage = jQuery(this);
			var plugins_img_url = "<?php echo(plugins_url())."/linohalm-bytbil/assets/img/"; ?>";



			if(selectedImage.attr("isSelected") == "false")
			{			
				selectedImage.attr("src",plugins_img_url+selectedImage.attr("bodytype")+"_vald"+".png");
				selectedImage.attr("isSelected", true);

			}else{

				selectedImage.attr("src",plugins_img_url+selectedImage.attr("bodytype")+".png");
				selectedImage.attr("isSelected", false);
			}

		});

		//button search

		jQuery(".btn-search").bind("click",function(){

			var selected_brand = jQuery("input[name='brand[]']:checked");
			var engine = jQuery(".select-engine").val();
			var yearFrom = jQuery(".select-year").val();
			var yearTo = jQuery(".select-yearTo").val();
			var milesFrom = jQuery(".select-miles").val();
			var milesTo = jQuery(".select-milesTo").val();
			var priceFrom = jQuery(".select-price").val();
			var priceTo = jQuery(".select-priceTo").val();
			var fuel = jQuery(".select-fuel").val();

			var selected_model = jQuery("input[name='model[]']:checked");
			


			selected_brand = jQuery("input[name='brand[]']:checked").map(function() {
		        return this.value;
		    }).get().join(',');

		    selected_model = jQuery("input[name='model[]']:checked").map(function() {
		        return this.value;
		    }).get().join(',');

		    var selected_image = jQuery(".img-select").map(function(){

		    	var val = jQuery(this);


		    	if(val.attr("isSelected") == "true")
		    	{
		    		return val.attr("bodytype");
		    	}

		    }).get().join(',');

		    
			jQuery("#id-brandValue").val(selected_brand);
			jQuery("#id-yearFrom").val(yearFrom);
			jQuery("#id-yearTo").val(yearTo);
			jQuery("#id-engine").val(engine);
			jQuery("#id-fuel").val(fuel);
			jQuery("#id-milesFrom").val(milesFrom);
			jQuery("#id-milesTo").val(milesTo);
			jQuery("#id-priceFrom").val(priceFrom);
			jQuery("#id-priceTo").val(priceTo);
			jQuery("#id-model").val(selected_model);
			jQuery("#id-bodytype").val(selected_image);

			jQuery("#id-cars").val(JSON.stringify(<?php echo($carJson); ?>));

			jQuery("#form-search").submit();

		});

	});
</script> -->