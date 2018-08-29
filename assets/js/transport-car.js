 jQuery(function() {

   var labelArr = new Array("0%","20%", "30%","40%","50%");
   var valueArr = new Array(0,20,30,40,50);
   jQuery( "#slider-trans" ).slider({
      value:1,
      min: 0,
      max: 3,
      step: 1,
      create: function( eveny, ui){

          jQuery("#label-insats").html('Insats: '+ labelArr[1]);
          var interest = percentToDecimal(jQuery("#transcarInterest").val());
          var monthlyPayment =  calculation(interest);

           jQuery(".monthly").html(monthlyPayment + ".- / Mån");


        
      },
      slide: function( event, ui ) {

        jQuery("#label-insats").html('Insats: '+labelArr[ui.value]);
        jQuery("#downpayment").val(labelArr[ui.value]);

        var interest = percentToDecimal(jQuery("#transcarInterest").val());
        var monthlyPayment =  calculation(interest);;


        jQuery(".monthly").html(monthlyPayment + ".- / Mån");

      }
  });

   var labelArr1 = new Array("12 mån", "24 mån","36 mån","48 mån");
   var valueArr1 =  new Array(12,24,36,48);
   jQuery( "#slider1-trans" ).slider({
      value:2,
      min: 0,
      max: 3,
      step: 1,
      create: function( eveny, ui){

          jQuery("#label-lånetid").html('Lånetid: ' +labelArr1[2]);
          var interest = percentToDecimal(jQuery("#transcarInterest").val());
          var monthlyPayment =  calculation(interest);

          jQuery(".monthly").html(monthlyPayment + ".- / Mån");

      },
      slide: function( event, ui ) {

          jQuery("#label-lånetid").html('Lånetid: '+ labelArr1[ui.value]);
          jQuery("#terms").val(valueArr1[ui.value]);

          var interest = percentToDecimal(jQuery("#transcarInterest").val());
          var monthlyPayment =  calculation(interest);

         jQuery(".monthly").html(monthlyPayment + ".- / Mån");

      }
  });
  
    var labelArr2 = new Array("0 %", "10 %","20 %","30 %","40 %","50 %");
    var valueArr2 =  new Array(0,10,20,30,40,50);
    jQuery( "#slider2-trans" ).slider({
      value:5,
      min: 0,
      max: 5,
      step: 1,
      create: function( eveny, ui){

           jQuery("#label-restvärde").html("Restvärde: "+labelArr2[5]);
           var interest = percentToDecimal(jQuery("#transcarInterest").val());
           var monthlyPayment =  calculation(interest);

           jQuery(".monthly").html(monthlyPayment + ".- / Mån");

      },
      slide: function( event, ui ) {

          jQuery("#label-restvärde").html("Restvärde: "+labelArr2[ui.value]);
          jQuery("#duebalance").val(valueArr2[ui.value]);

          var interest = percentToDecimal(jQuery("#transcarInterest").val());
          var monthlyPayment =  calculation(interest);

           jQuery(".monthly").html(monthlyPayment + ".- / Mån");

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

      var tax = jQuery(".exkl_moms").val();

      var balance = GetRemainingBalance(carprice - downpayment,duebalance,terms,interest);
      


      return pmt(interest/12, terms, 0.8 * balance) * -1;
    }
  
});