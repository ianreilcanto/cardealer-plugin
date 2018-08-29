<?php 

class Import {
	 function __construct ()
	{
		add_action( 'admin_menu', array( $this , 'car_portal' ));
		add_shortcode( 'carportal', array( $this , 'carportal_client_view') );
		add_action("admin_init", array($this, "Car_Info_Page" ));
		add_action("admin_init", array($this, "Car_Search_Page" ));

        //Activate custom settings
        add_action("admin_init", array( $this ,"finance_custom_settings"));
		
	}


    function finance_custom_settings(){
        register_setting("finance-settings-group", "interestNewCar");
        register_setting("finance-settings-group", "interestOldCar");
        register_setting("finance-settings-group", "interestTrans");
        register_setting("finance-settings-group", "onetimeFee");
        register_setting("finance-settings-group", "adminFee");
        add_settings_section("finance-settings-options", "Finance Settings", array($this ,"finance_settings_view") ,"car-portal");

        add_settings_field("finance-interestNewCar", "Ny Bil Ränta", array($this,"finance_settings_interestNewCar"),"car-portal","finance-settings-options");

        add_settings_field("finance-interestOldCar", "Gammal Bil Ränta", array($this,"finance_settings_interestOldCar"),"car-portal","finance-settings-options");

         add_settings_field("finance-interestTrans", "Transportbil Ränta", array($this,"finance_settings_interestTrans"),"car-portal","finance-settings-options");

        add_settings_field("finance-onetime", "Uppläggningsavgift", array($this,"finance_settings_onetime"),"car-portal","finance-settings-options");

        add_settings_field("finance-adminFee", "Aviavgift", array($this,"finance_settings_adminFee"),"car-portal","finance-settings-options");
    }

    
    function finance_settings_view(){
       // echo "Finance Settings Values";
    }

    function finance_settings_interestNewCar(){
        $interestNewCar = esc_attr( get_option("interestNewCar") );
        echo "<input type='text' name='interestNewCar' value='".$interestNewCar."' placeholder=' %' />";
    }

    function finance_settings_interestOldCar(){
        $interestOldCar = esc_attr( get_option("interestOldCar") );
        echo "<input type='text' name='interestOldCar' value='".$interestOldCar."' placeholder=' %' />";
    }

     function finance_settings_interestTrans(){
        $interestTrans = esc_attr( get_option("interestTrans") );
        echo "<input type='text' name='interestTrans' value='".$interestTrans."' placeholder=' %' />";
    }

    function finance_settings_onetime(){
        $onetimeFee = esc_attr( get_option("onetimeFee") );
        echo "<input type='text' name='onetimeFee' value='".$onetimeFee."' placeholder='' />";
    }

    function finance_settings_adminFee(){
        $adminFee = esc_attr( get_option("adminFee") );
        echo "<input type='text' name='adminFee' value='".$adminFee."' placeholder='' />";
    }


	function Car_Info_Page() {

        $pages = get_pages(); 	
            $pdfView_page= array(	'slug' => 'car-info',	'title' =>'Car Info'	);

        foreach ($pages as $page) { 
                $apage = $page->post_name; 
                switch ( $apage ){ 
                    case 'car-info' :   	$pdfView_found= '1';		break;			
                    default:			$no_page;			
                }		
            }

            if($pdfView_found != '1'){
                $page_id = wp_insert_post(array(
                    'post_title' => $pdfView_page['title'],
                    'post_type' =>'page',		
                    'post_name' => $pdfView_page['slug'],
                    'post_status' => 'publish',
                    'post_excerpt' => 'Car Info Page ! '	
                ));
            }
    }

    function Car_Search_Page() {

        $pages = get_pages(); 	
            $pdfView_page= array(	'slug' => 'car-search',	'title' =>'Car Search'	);

        foreach ($pages as $page) { 
                $apage = $page->post_name; 
                switch ( $apage ){ 
                    case 'car-search' :   	$pdfView_found= '1';		break;			
                    default:			$no_page;			
                }		
            }

            if($pdfView_found != '1'){
                $page_id = wp_insert_post(array(
                    'post_title' => $pdfView_page['title'],
                    'post_type' =>'page',		
                    'post_name' => $pdfView_page['slug'],
                    'post_status' => 'publish',
                    'post_excerpt' => 'Car Search Page ! '	
                ));
            }
    }


	function car_portal()
	{
	    add_menu_page(
	        'Finance',     // page title
	        'Finance',     // menu title
	        'manage_options',   // capability
	        'car-portal',     // menu slug
	         array($this, 'portal_view')// callback function
	    );
	}

	function portal_view()
	{
	   include_once "views/carportal.php";
	}

	function carportal_client_view( $atts)
	{
		ob_start();
			include_once "views/carportal_template.php";
		return ob_get_clean();
	}


}