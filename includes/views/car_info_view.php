
<?php get_header();  

	session_start();

	$temp = stripslashes($_GET["cardata"]);

	$cars = file_get_contents("http://data.bytbil.com/sellers/satramotorcenter/xml/satramotorcenter.xml");
	
	
	if($cars)
	{
		$xml = simplexml_load_string($cars);
		

	}

		$carJson = json_encode($xml);
		$carsXml = json_decode($carJson,TRUE);


	$cars = $carsXml;


	foreach ($cars as $key => $value) {
		foreach ($value as $k => $v) {	
			if($temp == $v["id"])
				$car = $v;
		}
	}

	$info = explode(",", $car["info"]);



?>
<div style="margin-top: 40px" class="container info-container">
	<script type="text/javascript" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/jquery.bxslider.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.bxslider').bxSlider({
	       
             autoControls: true,
             controls: true,
             infiniteLoop: true,
             responsive: true
		  });
		});
	</script>
	<style type="text/css">
		.bx-wrapper{position:relative;margin-bottom:60px;padding:0;-ms-touch-action:pan-y;touch-action:pan-y;-moz-box-shadow:0 0 5px #ccc;-webkit-box-shadow:0 0 5px #ccc;box-shadow:0 0 5px #ccc;border:5px solid #fff;background:#fff}.bx-wrapper img{max-width:100%;display:block}.bxslider{margin:0;padding:0}ul.bxslider{list-style:none}.bx-viewport{-webkit-transform:translatez(0)}.bx-wrapper .bx-controls-auto,.bx-wrapper .bx-pager{position:absolute;bottom:-30px;width:100%}.bx-wrapper .bx-loading{min-height:50px;background:url(<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/bx_loader.gif) center center no-repeat #fff;height:100%;width:100%;position:absolute;top:0;left:0;z-index:2000}.bx-wrapper .bx-pager{text-align:center;font-size:.85em;font-family:Arial;font-weight:700;color:#666;padding-top:20px}.bx-wrapper .bx-pager.bx-default-pager a{background:#666;text-indent:-9999px;display:block;width:10px;height:10px;margin:0 5px;outline:0;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px}.bx-wrapper .bx-pager.bx-default-pager a.active,.bx-wrapper .bx-pager.bx-default-pager a:focus,.bx-wrapper .bx-pager.bx-default-pager a:hover{background:#000}.bx-wrapper .bx-controls-auto .bx-controls-auto-item,.bx-wrapper .bx-pager-item{display:inline-block;vertical-align:bottom}.bx-wrapper .bx-pager-item{font-size:0;line-height:0}.bx-wrapper .bx-prev{left:10px;background:url(<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/controls.png) 0 -32px no-repeat}.bx-wrapper .bx-prev:focus,.bx-wrapper .bx-prev:hover{background-position:0 0}.bx-wrapper .bx-next{right:10px;background:url(<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/controls.png) -43px -32px no-repeat}.bx-wrapper .bx-next:focus,.bx-wrapper .bx-next:hover{background-position:-43px 0}.bx-wrapper .bx-controls-direction a{position:absolute;top:50%;margin-top:-16px;outline:0;width:32px;height:32px;text-indent:-9999px;z-index:1}.bx-wrapper .bx-controls-direction a.disabled{display:none}.bx-wrapper .bx-controls-auto{text-align:center}.bx-wrapper .bx-controls-auto .bx-start{display:block;text-indent:-9999px;width:10px;height:11px;outline:0;background:url(<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/controls.png) -86px -11px no-repeat;margin:0 3px}.bx-wrapper .bx-controls-auto .bx-start.active,.bx-wrapper .bx-controls-auto .bx-start:focus,.bx-wrapper .bx-controls-auto .bx-start:hover{background-position:-86px 0}.bx-wrapper .bx-controls-auto .bx-stop{display:block;text-indent:-9999px;width:9px;height:11px;outline:0;background:url(<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/img/controls.png) -86px -44px no-repeat;margin:0 3px}.bx-wrapper .bx-controls-auto .bx-stop.active,.bx-wrapper .bx-controls-auto .bx-stop:focus,.bx-wrapper .bx-controls-auto .bx-stop:hover{background-position:-86px -33px}.bx-wrapper .bx-controls.bx-has-controls-auto.bx-has-pager .bx-pager{text-align:left;width:80%}.bx-wrapper .bx-controls.bx-has-controls-auto.bx-has-pager .bx-controls-auto{right:0;width:35px}.bx-wrapper .bx-caption{position:absolute;bottom:0;left:0;background:#666;background:rgba(80,80,80,.75);width:100%}.bx-wrapper .bx-caption span{color:#fff;font-family:Arial;display:block;font-size:.85em;padding:10px}
	</style>
	    <style>

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

	        .table-container{
	        	padding: 10px;
	        	/*box-shadow: 2px 4px 7px 2px #888888;*/
	        	/*margin-top:20px;*/
	        	width: 100%;
	        }
	        table tr td{
	        	width: 10%;
	        	text-align: left;
	        	border: 0;
	        	color: #000;
	        }

	        .thumbnail-container{	
			position: relative;
		}
		.thumbnail{
			min-height: 330px !important;
		}


		.related-header{
			margin: 40px 0 40px !important;
		    font: 3.44em/0.84em 'Montserrat', "Trebuchet MS", Arial, Helvetica, sans-serif !important;
		    font-weight: bold !important;
		    text-transform: uppercase !important;
		    color: #45a9dc !important;
		    text-shadow: 1px 1px 1px #27617f !important;
		    letter-spacing: -1px !important;
		    position: relative !important;
		    text-align: center !important;
		}


		.calculator-container{
			padding: 20px;
    		border: 1px #dadad4 solid;
		}

		.price-per-month{
			margin-top: 10px;
			padding: 20px;
			width: 100%;
			background: #007edb;
			color:#fff;
		}
		.monthly{
			width: 100%;
			text-align: center;
			font-size: 40px;
		}
		.note{
			font-size: 12px;
			width: 100%;
			text-align: right;
		}

		.thumbnail h4{
			color: #133d5f !important;
			margin-top: 15px !important;
		}

		
	 </style>
	<div class="raw">
		<div class="col-md-7 col-lg-7">
		    <ul class="bxslider">
			  <?php for ($i = 0; $i< count($car["images"]["image"]); $i++) { ?>
		           
		            	<?php if(preg_match("/jpeg/", $car["images"]["image"][$i]) || preg_match("/jpg/", $car["images"]["image"][$i]) || preg_match("/png/", $car["images"]["image"][$i])){ ?>
		            	 	<li>
		             			<img data-u="image" src="<?php echo $car["images"]["image"][$i] ?>" />
		             		 </li>
		             	<?php }else{ break; } ?> 
		           
		        <?php } ?>
			</ul>
		</div>
		<div class="col-md-5 col-lg-5">
			<div style="padding-top: 0px;" class="table-container">
			<h3 style=" margin-top: 0px !important ;font-size: 20px !important; font-weight: bold !important; line-height: 25px;"><?php echo($car["brand"]." ".$car["model"]." ".$car["modeldescription"]); ?></h3>
			<table class="infoCarTable nonmobileviewTable">

				<?php 

					
					if($car["price-extra"] && empty($car["exkl_moms"])){
						$price = str_replace(".","",$car["price-extra"]);
					}else if($car["price-extra"] && !empty($car["exkl_moms"])){
						$price = str_replace(".","",trim(explode("kr",$car["price-extra"])[0]));
					}else{
						$price = str_replace(".", "", $car["price-sek"]);
					}

					$tax = empty($car["exkl_moms"]) ? "0" : "1";

				?>

				<input type="hidden" name="tax" class="exkl_moms" value="<?php echo $tax; ?>">
				<input type="hidden" name="carPrice" class="carprice" value="<?php echo $price; ?>">
				<input type="hidden" name="bodyType" class="bodytype" value="<?php echo($car["bodytype"]); ?>">
				<input type="hidden" name="status" class="status" value="<?php echo($car["status"]); ?>">
					<tr>
						<td>Årsmodell: <span><?php echo($car["yearmodel"]); ?></span></td>
						
						<?php if( !preg_match('/TRANSPORT/' , strtoupper($car["bodytype"]))){ ?>
					
						<td>Pris: <span style="text-decoration:<?php echo ($car["price-extra"]) ? 'line-through' : '';  ?>" ><?php echo str_replace(".", " ", $car["price-sek"])." :-"; ?></span>
						<span style="display:<?php echo ($car["price-extra"]) ? 'inline' : 'none';  ?>"><?php echo str_replace(".", " ", $car["price-extra"])." :-"; ?></span><div style="height:5px; width: 100%"></div>
						</td>

						<?php }else{ ?>
							<td> Pris:
								<?php 
									if($car["price-extra"] && !empty($car["exkl_moms"])){
										?>
											<span style="text-decoration:<?php echo ($car["price-extra"]) ? 'line-through' : '';  ?>" ><?php echo str_replace(".", " ", $car["price-sek"])." :-"; ?></span><br>
											<span style="font-size:12px;display:<?php echo ($car["price-extra"]) ? 'inline' : 'none';  ?>;"><?php echo str_replace(".", " ", $car["price-extra"])." :-"; ?></span><div style="height:5px; width: 100%"></div>
										<?php
										$price = str_replace(".","",trim(explode("kr",$car["price-extra"])[0]));
									}else{
										$newPrice = (0.8 * str_replace(".", "", $car["price-sek"]));
										?>
											<span><?php echo str_replace(".", " ", $car["price-sek"])." :-"; ?></span><br>
											<span style="font-size:12px"><?php echo number_format( round($newPrice), 0, ',', ' ' )." kr (ex moms)"; ?></span>
										<?php
									}
								?>
							</td>
						<?php } ?>
					</tr>
					<tr>
						<td>Reg nr: <span><?php echo($car["regno"]); ?></span></td>
						<td>Färg: <span><?php echo($car["color"]); ?></span></td>
					</tr>
					<tr>
						<td>Miltal: <span><?php echo($car["miles"]); ?></span></td>
						<td>Växellåda: <span><?php echo($car["gearboxtype"]); ?></span></td>
					</tr>
					<tr>
						<td>Fordonstyp: <span><?php echo($car["bodytype"]); ?></span></td>
						<td>Märke: <span><?php echo($car["brand"]); ?></span></td>
					</tr>
					<tr>
						<td>Drivmedel: <span><?php echo($car["fueltype"]); ?></span></td>
						<td>Modell: <span><?php echo($car["model"]); ?></span></td>
					</tr>
				</table>

				<table class="infoCarTable mobileviewTable">
					<tr>
						<td>Årsmodell: <span><?php echo($car["yearmodel"]); ?></span></td>
						<!-- <td >Mil</td><td></td> -->
					</tr>
					<tr>	
						<td>Pris: <span><?php echo str_replace(".", " ", $car["price-sek"])." :-"; ?></span></td>
					</tr>
					<tr>
						<td>Reg nr: <span><?php echo($car["regno"]); ?></span></td>
					</tr>
					<tr>					
						<td>Färg: <span><?php echo($car["color"]); ?></span></td>
					</tr>
					<tr>
						<td>Miltal: <span><?php echo($car["miles"]); ?></span></td>
					</tr>
					<tr>
						<td>Växellåda: <span><?php echo($car["gearboxtype"]); ?></span></td>
					</tr>
					<tr>
						<td>Fordonstyp: <span><?php echo($car["bodytype"]); ?></span></td>
					</tr>
					<tr>
						<td>Märke: <span><?php echo($car["brand"]); ?></span></td>
					</tr>
					<tr>
						<td>Drivmedel: <span><?php echo($car["fueltype"]); ?></span></td>
					</tr>
					<tr>
						<td>Modell: <span><?php echo($car["model"]); ?></span></td>
					</tr>
				</table>
			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script type="text/javascript" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/js/info-angular.js"></script>
			<script type="text/javascript" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/js/new-car.js"></script>
			<script type="text/javascript" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/js/transport-car.js"></script>
			<script type="text/javascript" src="<?php echo(plugins_url()); ?>/linohalm-bytbil/assets/js/old-car.js"></script>
			<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css">

			<div class="calculator-container" ng-app="carPortal" ng-controller="carInfoXmlController as ctrl"> 
				<input id="newcarInterest" type="hidden" name="newcarInterest" value="<?php echo get_option("interestNewCar"); ?>">
				<input id="oldcarInterest" type="hidden" name="oldcarInterest" value="<?php echo get_option("interestOldCar"); ?>">
				<input id="transcarInterest" type="hidden" name="transcarInterest" value="<?php echo get_option("interestTrans"); ?>">
				<input id="downpayment" type="hidden" name="downpayment" value="">
				<input id="terms" type="hidden" name="terms" value="">
				<input id="duebalance" type="hidden" name="duebalance" value="">
				<my-calculator> 
				</my-calculator> 
			</div>
		</div>
		<div class="col-md-12 col-lg-12">
			<h3 style="color:#007edb;font-size: 20px !important; font-weight:bold !important">Utrustning</h3>
			<h4>Reservation för ev felskrivningar</h4>
			<?php for ($i=0; $i < count($info) ; $i++) { ?>
				<div class="col-md-3"> <span style="color:#0071d9;font-weight: 700"> > </span> <?php echo($info[$i]); ?></div>
			<?php } ?>
		</div>
		<div class="col-md-12 col-lg-12">
		<h1 class="related-header" style="margin-top: 30px !important; padding-top: 30px; border-top: 1px solid #eee;color:#007edb !important">LIKNANDE BILAR</h1>
			<?php 

				$count = 0;	
				for ($i=0; $i < count($cars["car"]); $i++) { 
			?>
				<?php 
					if($count == 4){ break; }
					if ($car["bodytype"] == $cars["car"][$i]["bodytype"]) { 
				?>

					<div class="col-md-3 thumbnail-container">
						<form id="form-car" action="car-info" method="GET">
							<input id="car-value-id" action="" type="hidden" name="cardata" value="">
						</form>

						    <div class="thumbnail" >
						      <span  style="cursor: pointer;" data-car='<?php echo(json_encode($cars["car"][$i] )) ?>' class="goToInfo">
						        <img src="<?php echo($cars["car"][$i]["images"]["image"][0]) ?>" alt="Fjords" style="width:100%">
						        <div style="width: 40%;position: absolute;left: 3.3%;text-align:center;top: 152px;background: #007edb;color: #fff;padding: 10px;border-radius: 0px 10px 10px 0px;">
						        	<?php echo str_replace(".", " ", $cars["car"][$i]["price-sek"])." :-"; ?>
						        </div>
						        <div class="caption">
						          <p>
						          	<h4 class='carsearchName'><?php echo($cars["car"][$i]["brand"]." ".$cars["car"][$i]["model"]." ".$cars["car"][$i]["modeldescription"]); ?></h4>
						          	<span style="font-size: 12px;">Årsmodell: <?php echo($cars["car"][$i]["yearmodel"]) ?></span> <span style="font-size: 12px;">Miltal: <?php echo($cars["car"][$i]["miles"]) ?></span> <span style="font-size: 12px;">
						          </p>
						        </div>
						      </span>
						    </div>
					 </div>


				<?php $count++;  } ?>
			<?php } ?>
		</div> 
		</div>
	</div>	
</div>
<div class="loader-bg">
	<div class="loader">
		<div class="spinner"></div>  
		<div style="font-weight: 700;font-size: 12px;margin-top: 20px;text-align: center;">Loading..</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function(){

		jQuery(".goToInfo").on("click",function(){
				//console.log(jQuery(this).data("car"));
				$("#car-value-id").val(jQuery(this).data("car").id);

				 $(".loader-bg").show();

				$("#form-car").submit();
		});

	});
</script>
 <?php get_footer(); ?>