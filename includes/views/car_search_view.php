<?php session_start();
	get_header();


	$cars = file_get_contents("http://data.bytbil.com/sellers/satramotorcenter/xml/satramotorcenter.xml");
	
	
	if($cars)
	{
		$xml = simplexml_load_string($cars);
		

	}

		$carJson = json_encode($xml);
		$cars = json_decode($carJson,TRUE)["car"];


	if($_POST){

		$_SESSION["data"] = $_POST;
	
	}

	$data = $_SESSION["data"];

	include_once "Search.php";
	include_once "PortalInfo.php";

	$search = new Search($cars, $data);
	$carInfo = new PortalInfo($cars);

	$carbrands = $carInfo->GetCarBrands();
	$carmodels = $carInfo->GetCarModels();


	
	$searchResult = $search->GetSearchResult();


	if(empty($searchResult)){

		$searchResult = $cars;
	}

?>
<style type="text/css">
	.thumbnail-container{	
		position: relative;
	}
	.thumbnail{
		min-height: 335px !important;
	}
.ng-binding{
	top: 165px;
	text-align: center;
	width: 90px;
	padding: 10px 10px;
	position: absolute;
	color: #fff;
}
.thumbnail .carTitle{margin-top: 20px;}
.ng-binding-full{
	border-radius: 0px 10px 10px 0px;
} 
	.fieldContainer{
		margin-top: 20px !important;
	}
	.btn-select , .form-control{
		padding: 0px 19px !important;
		height: 37px !important;
	    background: #eee !important;
	    overflow: hidden;
	    color: #000000 !important;
	    font: 13px/35px "Trebuchet MS",Arial,Helvetica,sans-serif;
	    border: 1px solid #ccc !important;
	    text-align: left !important;
	    padding: 6px 12px;
	    width: 100%;
	    border-radius: 3px !important;
	    margin-top: 8px !important;
	    margin-bottom: 5px !important;
	    display: inline !important;
	}
	.btn-search{
	    font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif !important;
	    font-size: 14px !important;
	    height: 37px !important;
	    border: 1px solid #007edb !important;
	    background-color: #007edb !important;
	    border-radius: 4px !important;
	    padding: 5px !important;
	    width: 87%;
	    color: #fff;
	    margin-top:5px;
	}
	.arrange{
		width: 100%
	}
	.select-order{
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
	.select-option{
		height: auto !important;
    	right: 2px !important;
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
	 }

	 .loader-bg{
		position: fixed;
		display: none;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		z-index: 99;
		width: 100%;
		height: 100%;
		background: #fff;
		opacity: 0.5;
	}
	.loader{
		  position: fixed;
		  z-index: 999;
		  height: 4em;
   		  width: 4em;
   		  border-radius: 50%;
		  overflow: show;
		  margin: auto;
		  top: 0;
		  left: 0;
		  bottom: 0;
		  right: 0;
		  display: block;
		  background: #fff;
	}
	.carTitle{
		color: #007edb !important;
	}
	.spinner{
		content: '';
		display: block;
		margin: 0 auto;
		margin-top: 42%;
		font-size: 10px;
		width: 1em;
		height: 1em;
		z-index: 9999;
		
		-webkit-animation: spinner 1500ms infinite linear;
	    -moz-animation: spinner 1500ms infinite linear;
	    -ms-animation: spinner 1500ms infinite linear;
	    -o-animation: spinner 1500ms infinite linear;
	    animation: spinner 1500ms infinite linear;
	    border-radius: 0.5em;
	    -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
	     box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
	}

	.filterButtonContainer{
	min-height: 20px;
    padding: 10px 30px;
    text-align: right;
    background: #eee;
    margin-bottom: 20px;
    display: none;
    color: #000;
	}
	.filterButtonContainer a{
		color: #000;
		padding: 20px 0px 20px 30px;
		background-size: 20px !important;
		background: url("https://peugeotsatra.se/wp-content/plugins/linohalm-bytbil/includes/views/filter.png") no-repeat center left;
	}
#collapseButton:after {
   		content: '▼';
   		font-size: 10px;
    	margin-left: 5px;
    	height: 10px;
    	width: 10px;
  		color: #000;
	}
	a[aria-expanded=false]:after{
   	content: '►' !important;
	}
	@media (max-width: 992px){
				.filterButtonContainer{
						display: block;
				}
			.set2 .btn-select{
				width: 48% !important;
				float: left;
			}

			.set2 .btn-select:first-child{
				margin-right: 4%;
			}
			.carImage .col1 , .carImage .col2{
				width: 50%;
    			float: left;
   				min-height: 51px;
    			margin-bottom: 10px;

			}
			.carImage{
  			  min-height: 10px;
  			  float: none !important;
  			  width: 90% !important;
  			  margin: 0 auto 20px !important;
  			  overflow: hidden;
			}

			.button-container{
				width: 90% !important;
				margin:10px auto 40px !important;	
				float: none !important;
			}

			.button-container button{
				width: 200px;
				margin: 0 auto;
				display: block;
			}
			.fieldContainer{
				width: 90% !important;
				margin: 0 auto;
				height: 360px;
			}
			.set2{
				
			}
			.set2 select:first-child{
				margin-right: 4% !important;
			}
			.set2 select{
				width: 48% !important;
				float: left;
			}
	}

	/* Animation */

	@-webkit-keyframes spinner {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}
	@-moz-keyframes spinner {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}
	@-o-keyframes spinner {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}
	@keyframes spinner {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}
</style>
<div class="filterButtonContainer">
<a data-toggle="collapse" id="collapseButton" href="#" data-target="#searchForm">Filtrera</a>
</div>
<div  style="position: relative;"  class="row collapse in" id="searchForm">
		<form method="POST" action="" id="form-search">
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
		</form>
		<div class="col-lg-10 col-md-10 fieldContainer" style="margin: 0 auto;float:none;">
			<div class="col-lg-1 col-md-1"></div>
			<div style="text-align: center" class="col-lg-2 col-md-2">
				<select class="form-control select-brand" name="brand">
									<option value="">Bilmärken</option>
						<?php foreach ($carbrands as $key => $value) { ?>
									<option value="<?php echo($value); ?>"><?php echo($value); ?></option>
						<?php } ?>	
				</select>
	
				<select class="form-control select-model" name="model">
									<option value="">Modell</option>
						<?php foreach ($carmodels as $key => $value) { $models = explode("-", $value); ?>
									<option class="<?php echo($models[0]); ?> sort" value="<?php echo($models[1]); ?>"><?php echo($models[1]); ?></option>
						<?php } ?>	
				</select>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2">
				<select class="form-control select-engine" name="engine">
					<option value="none">Växellåda</option>
					<option value="Automatisk">Automatisk</option>
					<option value="Manuell">Manuell</option>
					<option value="Sekventiell">Sekventiell</option>
				</select>
				<select class="form-control select-fuel" name="fuel" >
					<option value="none">Drivmedel</option>
					<option value="Bensin">Bensin</option>
					<option value="Ethanol">Bensin/Ethanol</option>
					<option value="Gas">Bensin/Gas</option>
					<option value="Diesel">Diesel</option>
					<option value="El">El</option>
				</select>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2 set2">
				<select class="form-control select-year" name="year">
					<option value="none">Årsmodell från</option>
					<?php for($i =  date('Y') ; $i >= 1979; $i--){ ?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php } ?>
				</select>
				<select class="form-control select-yearTo" name="yearTo">
					<option value="none">Årsmodell till</option>
					<?php for($i =  date('Y') ; $i >= 1979; $i--){ ?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php } ?>
				</select>
			</div>

			<div style="text-align: center" class="col-lg-2 col-md-2 set2">
				<select class="form-control select-miles" name="miles">
					<option value="none">Mil från</option>
					<?php for($i =  1000 ; $i <= 35000; $i++){ 

						if($i % 1000 === 0){
						?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php
						}
						} ?>
				</select>
				<select class="form-control select-milesTo" name="milesTo">
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

			<div style="text-align: center" class="col-lg-2 col-md-2 set2">
				<select class="form-control select-price" name="price">
					<option value="none">Pris från</option>
					<?php for($i =  10000 ; $i <= 500000; $i++){ 

						if($i % 10000 === 0){
						?>
						<option value="<?php echo($i); ?>"><?php echo($i); ?></option>
					<?php
						}
						} ?>
				</select>
				<select class="form-control select-priceTo" name="priceTo">
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
			<div class="col-lg-1 col-md-1"></div>
		</div>

		<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1" style="margin-bottom: 40px">
			<div class="col-md-12 col-lg-12 carImage" style="margin-top: 40px;margin-bottom: 40px">
				<div class="col-md-2 col-lg-2 col1">
					<img isSelected="false" bodytype="Cab" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/Cab.png">
				</div>
				<div class="col-md-2 col-lg-2 col2">
					<img isSelected="false" bodytype="Halvkombi" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/Halvkombi.png">
				</div>
				<div class="col-md-2 col-lg-2 col1">
					<img isSelected="false" bodytype="Kombi" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/Kombi.png">
				</div>
				<div class="col-md-2 col-lg-2 col2">
					<img isSelected="false" bodytype="Sedan" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/Sedan.png">
				</div>
				<div class="col-md-2 col-lg-2 col1">
					<img isSelected="false" bodytype="SUV" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/SUV.png">
				</div>
				<div class="col-md-2 col-lg-2 col2">
					<img isSelected="false" bodytype="Transport" class="img-select img-responsive center-block" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/transport.png">
				</div>
			</div>
			<div class="col-md-3 col-lg-3 pull-right button-container">
				<button class="btn-search">
					Starta sökning
				</button>
			</div>
		</div>
</div>
<form id="form-car" action="../car-info" method="GET">
	<input id="car-value-id" action="../car-info" type="hidden" name="cardata" value="">
</form>
<div style="position: relative;z-index: 1" class="main-contianer col-lg-12 col-md-12" ng-app="carPortal" ng-controller="xmlImportController as ctrl">
<?php foreach ($searchResult as $key => $value) { ?>
<div class="col-md-3 thumbnail-container" >
    <div class="thumbnail" >
      <span style="cursor: pointer;" data-car='<?php echo(json_encode($value)) ?>' href="#" class="goToInfo">
        <img src="<?php echo $searchResult[$key]["images"]["image"][0] ?>" alt="Fjords" style="width:100%">
               <?php if( !preg_match("/TRANSPORT/", strtoupper($searchResult[$key]["bodytype"]))){ ?>
	        <div class="ng-binding <?php echo ($searchResult[$key]["price-extra"]) ? 'ng-binding-left' : 'ng-binding-full';  ?>" style="left:3.3%;background: #007edb;text-decoration:<?php echo ($searchResult[$key]["price-extra"]) ? 'line-through' : '';  ?>">
	        	<?php echo str_replace(".", " ", $searchResult[$key]["price-sek"]); ?>:-
	        </div>
	        <div class="ng-binding ng-binding-right" style="<?php echo (strpos($searchResult[$key]["price-extra"],'ex'))?"font-size:9px;line-height: 10px":""; ?>;left:90px; color:#333; border-radius: 0px 10px 10px 0px ;background: #f5f5f5;display:<?php echo ($searchResult[$key]["price-extra"]) ? 'inline' : 'none';  ?>">
	        	<?php echo str_replace(".", " ", $searchResult[$key]["price-extra"]); ?>
	        </div>
        <?php }else{ ?>
        		<?php if( $searchResult[$key]["price-extra"] && !empty($searchResult[$key]["exkl_moms"])){ ?>
			        	<div class="ng-binding ng-binding-left " style="left:3.3%;background: #007edb;text-decoration:<?php echo ($searchResult[$key]["price-extra"]) ? 'line-through' : '';  ?>">
			        	<?php echo str_replace(".", " ", $searchResult[$key]["price-sek"]); ?>:-
				        </div>
				        <div class="ng-binding ng-binding-right" style="font-size: 9px; line-height: 10px;left:90px; color:#333; border-radius: 0px 10px 10px 0px  ;background: #f5f5f5;display:<?php echo ($searchResult[$key]["price-extra"]) ? 'inline' : 'none';  ?>">
				        	<?php echo str_replace(".", " ", $searchResult[$key]["price-extra"]); ?>
				        </div>
			     <?php }else{ 
			     		$newPrice = (0.8 * str_replace(".", "", $searchResult[$key]["price-sek"]));
			     	?>
			     		<div class="ng-binding ng-binding-left" style="left:3.3%; background: #007edb;">
				        	<?php echo str_replace(".", " ", $searchResult[$key]["price-sek"]); ?>:-
				        </div>
				        <div class="ng-binding ng-binding-right" style="left:90px; color:#333; border-radius: 0px 10px 10px 0px  ;background: #f5f5f5; font-size: 11px; line-height: 10px;">
				        	<?php echo number_format( round($newPrice), 0, ',', ' ' )." kr (ex moms)"; ?>
				        </div>
			     <?php } ?>
        <?php } ?>
        <div class="caption">
          <p>
          	<h4 class="carTitle"><?php echo($searchResult[$key]["brand"]." ".$searchResult[$key]["model"]." ".$searchResult[$key]["modeldescription"]); 
//." ".$searchResult[$key]["modeldescription"]); 
          		?></h4>
          	<span style="font-size: 12px;">Årsmodell: <?php echo($searchResult[$key]["yearmodel"]); ?></span> <span style="font-size: 12px;">Miltal:<?php echo !empty($searchResult[$key]["miles"]) ? $searchResult[$key]["miles"] : "0"; ?>
          </p>
        </div>
      </span>
    </div>
 </div>
 <?php }?>
</div>

<div class="loader-bg">
	<div class="loader">
		<div class="spinner"></div>
		<div style="font-weight: 700;font-size: 12px;margin-top: 20px;text-align: center;">Loading..</div>
	</div>
</div>

</div>

<script type="text/javascript">
	jQuery(function(){
		jQuery(".select-model option").css('display','none');
		jQuery(".goToInfo").on("click",function(){
			//console.log(jQuery(this).data("car"));
			$("#car-value-id").val(jQuery(this).data("car").id);

			$(".loader-bg").show();

			 $("#form-car").submit();
		});

	$('.select-brand').change(function(){	
		//load model
		var s_brand = jQuery("select[name='brand']");

		if(s_brand.length > 1 && s_brand.length != 0)
		{
			jQuery.each(s_brand, function( index, value ) {
			  
			 jQuery.each(s_brand, function( index, value ) {
				  
				  	jQuery("."+value.value).toggle();

				  	jQuery("."+value.value).prop('disabled', function(i, v) { return !v; });
				});

			});

		}else if(s_brand.length == 1){

			
			jQuery.each(s_brand, function( index, value ) {
			  
			 jQuery.each(s_brand, function( index, value ) {
				  
				  	jQuery(".select-model option").css('display','none');
				  	jQuery(".select-model ."+value.value).toggle();
				});

			});
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
				
				jQuery(".btn-milesTo").text("Mil Till");

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

			var selected_brand = jQuery("select[name='brand']").val();
			var engine = jQuery(".select-engine").val();
			var yearFrom = jQuery(".select-year").val();
			var yearTo = jQuery(".select-yearTo").val();
			var milesFrom = jQuery(".select-miles").val();
			var milesTo = jQuery(".select-milesTo").val();
			var priceFrom = jQuery(".select-price").val();
			var priceTo = jQuery(".select-priceTo").val();
			var fuel = jQuery(".select-fuel").val();

			var selected_model = jQuery("select[name='model']").val();
			
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

			jQuery("#form-search").submit();

		});


		var mylist = jQuery('.select-model');
		var listitems = mylist.children('option.sort').get();
		listitems.sort(function(a, b) {
		   return jQuery(a).text().toUpperCase().localeCompare(jQuery(b).text().toUpperCase());
		})
		jQuery.each(listitems, function(idx, itm) { mylist.append(itm); });


	});
</script>

<?php 
	
	get_footer();
?>