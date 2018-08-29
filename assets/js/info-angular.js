var app = angular.module("carPortal", []); 

app.controller("carInfoXmlController", function($scope) {
	    
    var vm = this;

	  var bodytype = $(".bodytype").val(); 
	  var status = $(".status").val();



	  if( status == 0 ){

	    if(bodytype.includes('Transport')){

	      //set default
	      jQuery("#downpayment").val(20);
	      jQuery("#terms").val(36);
	      jQuery("#duebalance").val(50);

	    }else{

	      //set default 
	      jQuery("#downpayment").val(20);
	      jQuery("#terms").val(60);
	      jQuery("#duebalance").val(20);

	    }

	  }else{

	    if(bodytype.includes('Transport')){

	      //set default
	      jQuery("#downpayment").val(20);
	      jQuery("#terms").val(36);
	      jQuery("#duebalance").val(50);

	    }else{

	       //set default
	      jQuery("#downpayment").val(20);
	      jQuery("#terms").val(12);
	      jQuery("#duebalance").val(0);

	    }

	  }


    
}).directive('myCalculator', function() {

 	var bodytype = $(".bodytype").val(); 
    var status = $(".status").val();

	//add hidden field for value	
	if(status == 0){

		if(bodytype.includes('Transport')){
			return {
			    restrict: 'E',
			    template:  '<div id="label-insats">Instats: </div>'
			    				+'<div id="slider-trans"></div>'
			    				+'<br>'
			    				+'<div id="label-lånetid">Lånetid: </div>'
			    				+'<div id="slider1-trans"></div>'
			    				+'<br>'
			    				+'<div id="label-restvärde">Restvärde: </div>'
			    				+'<div id="slider2-trans"></div>'
								+'<div class="price-per-month">'
									+'<label class="monthly"></label>'
									+'<label class="note"> Månadskostnaden visas exkl.moms </label>'
								+'</div>'
			}
		}else {
			return {
			    restrict: 'E',
			    template: '<div id="label-newCar">Please slide !</div>'
			    				+'<div id="slider-newCar"></div>'
			    				+'<br>'
			    				+'<div id="label-lånetid">Lånetid: </div>'
			    				+'<div id="slider1-newCar"></div>'
			    				+'<br>'
			    				+'<div id="label-restvärde">Restvärde: </div>'
			    				+'<div id="slider2-newCar"></div>'
					+'<div class="price-per-month">'
						+'<label class="monthly"></label>'
						+'<label class="note"> Månadskonstnad vid 20% kontantinsats </label>'
					+'</div>'
		  	}
	   }

	}else{

		if(bodytype.includes('Transport')){
			return {
			    restrict: 'E',
			    template:  '<div id="label-insats">Instats: </div>'
			    				+'<div id="slider-trans"></div>'
			    				+'<br>'
			    				+'<div id="label-lånetid">Lånetid: </div>'
			    				+'<div id="slider1-trans"></div>'
			    				+'<br>'
			    				+'<div id="label-restvärde">Restvärde: </div>'
			    				+'<div id="slider2-trans"></div>'
								+'<div class="price-per-month">'
									+'<label class="monthly"></label>'
									+'<label class="note">Månadskostnaden visas exkl.moms</label>'
								+'</div>'
			}
		}else {
			return {
			    restrict: 'E',
			    template:  '<div id="label-oldCar">Instats: </div>'
			    				+'<div id="slider-oldCar"></div>'
			    				+'<br>'
			    				+'<div id="label-lånetid">Lånetid: </div>'
			    				+'<div id="slider1-oldCar"></div>'
			    				+'<br>'
			    				+'<div id="label-restvärde">Restvärde: </div>'
			    				+'<div id="slider2-oldCar"></div>'
								+'<div class="price-per-month">'
									+'<label class="monthly"></label>'
									+'<label class="note"> Månadskonstnad vid 20% kontantinsats </label>'
								+'</div>'
			}
		}

	}

	

  

});
