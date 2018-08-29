<?php 
/*
Plugin Name: Bytbil Import
Description: A plugin that import satramotorcenter.xml
Version: 1.0
Author: Ian Reil Canto
*/

include_once "includes/Ln-Import.php";

$import = new Import();



add_filter( 'page_template',"GetTemplate");

function GetTemplate($page_template)
{
    if ( is_page( 'car-info' ) ) {

        $page_template = plugin_dir_path( __FILE__ ) . 'includes/views/car_info_view.php';
    }

    return $page_template;
}

add_filter( 'page_template',"GetTemplateSearch");

function GetTemplateSearch($page_template)
{
    if ( is_page( 'car-search' ) ) {

        $page_template = plugin_dir_path( __FILE__ ) . 'includes/views/car_search_view.php';
    }

    return $page_template;
}




