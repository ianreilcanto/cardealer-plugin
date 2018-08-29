 jQuery(function() {


   var labelArr = new Array("20%", "30%","40%","50%","60%");
   var valueArr = new Array(20,30,40,50,60);
   jQuery( "#slider-oldCar" ).slider({
      value:0,
      min: 0,
      max: 4,
      step: 1,
      create: function( eveny, ui){

          jQuery("#label-oldCar").html('Insats: '+ labelArr[0]);

          var interest = percentToDecimal(jQuery("#oldcarInterest").val());
          var monthlyPayment =  calculation(interest);

          jQuery(".monthly").html(monthlyPayment + ".-/ Mån");

      },
      slide: function( event, ui ) {

          jQuery("#label-oldCar").html('Insats: '+labelArr[ui.value]);
          jQuery("#downpayment").val(labelArr[ui.value]);

          var interest = percentToDecimal(jQuery("#newcarInterest").val());
          var monthlyPayment =  calculation(interest);;


          jQuery(".monthly").html(monthlyPayment + ".-/ Mån");
          

      }
  });

  
   var labelArr1 = new Array("12 mån", "24 mån","36 mån","48 mån","60 mån","72 mån","84 mån");
   var valueArr1 =  new Array(12,24,36,48,60,72,84);
   jQuery( "#slider1-oldCar" ).slider({
      value:0,
      min: 0,
      max: 6,
      step: 1,
      create: function( eveny, ui){

          jQuery("#label-lånetid").html('Lånetid: ' +labelArr1[0]);
          var interest = percentToDecimal(jQuery("#oldcarInterest").val());
          var monthlyPayment =  calculation(interest);

          jQuery(".monthly").html(monthlyPayment + ".-/ Mån");

      },
      slide: function( event, ui ) {

          jQuery("#label-lånetid").html('Lånetid: '+ labelArr1[ui.value]);
          jQuery("#terms").val(valueArr1[ui.value]);

          var interest = percentToDecimal(jQuery("#oldcarInterest").val());
          var monthlyPayment =  calculation(interest);

          jQuery(".monthly").html(monthlyPayment + ".-/ Mån");

      }
  });
  

    var labelArr2 = new Array("0 %", "10 %","20 %","30 %","40 %","50 %");
    var valueArr2 =  new Array(0,10,20,30,40,50);
    jQuery( "#slider2-oldCar" ).slider({
      value:0,
      min: 0,
      max: 5,
      step: 1,
      create: function( eveny, ui){

          jQuery("#label-restvärde").html("Restvärde: "+labelArr2[0]);
          var interest = percentToDecimal(jQuery("#oldcarInterest").val());
          var monthlyPayment =  calculation(interest);

          jQuery(".monthly").html(monthlyPayment + ".-/ Mån");

      },
      slide: function( event, ui ) {


        jQuery("#label-restvärde").html("Restvärde: "+labelArr2[ui.value]);
        jQuery("#duebalance").val(labelArr2[ui.value]);

        var interest = percentToDecimal(jQuery("#oldcarInterest").val());
        var monthlyPayment =  calculation(interest);

        jQuery(".monthly").html(monthlyPayment + ".-/ Mån");


      }
  });


  function percentToDecimal(percentValue){
    return parseFloat(percentValue) / 100.0 ;
  }

   function pmt(rate, nper, pv, fv, type) {
      if (!fv) fv = 0;
      if (!type) type = 0;

      if (rate == 0) return -(pv + fv)/nper;
      
      var pvif = Math.pow(1 + rate, nper);
      var pmt = rate / (pvif - 1) * -(pv * pvif + fv);

      if (type == 1) {
        pmt /= (1 + rate);
      };

      return Math.round(pmt);
    }

    function GetRemainingBalance(balance,duebalance,terms,interest){

      var newbalance = balance;

      var dividend = Math.pow(1+interest/12 ,terms);

      var newduebalance = duebalance / dividend;

      newbalance -= newduebalance;


      return newbalance;

    }


    function calculation(interest){


      var carprice =  parseFloat(jQuery(".carprice").val());
      var downpayment = carprice * percentToDecimal(jQuery("#downpayment").val());
      var duebalance = carprice * percentToDecimal(jQuery("#duebalance").val());
      var terms = jQuery("#terms").val();

      var balance = GetRemainingBalance(carprice - downpayment,duebalance,terms,interest);


      return pmt(interest/12, terms, balance) * -1;
    }
    
});