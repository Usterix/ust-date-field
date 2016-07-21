<?php
/**
 * @package Ust_Date_Field
 * @version 1.0
 */
/*
Plugin Name: Date Field
Plugin URI: https://usterix.com
Description: This plugin allows you to display a date picker field as a widget on your site.
Author: Usterix <william@usterix.com>
Version: 1.0
Author URI: https://usterix.com
Text Domain: ust_date_field
*/

// Block direct requests
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

//Registers the widget
add_action( 'widgets_init', function () {
	require_once 'inc/date-field.php';
	register_widget( 'Date_Field' );
} );

//Enqueues the Javascript for the widget
function ust_enqueue_scripts() {
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_script( 'ust-date-picker',
		plugins_url( 'ust-date-field/assets/js/date-picker.js' ),
		array( 'jquery', 'jquery-ui-core' ), false, false );
}

//Enqueues the CSS for the widget.
function ust_enqueue_styles() {
	wp_enqueue_style( 'datepicker-css',
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css' );
}

add_action( 'wp_enqueue_scripts', 'ust_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'ust_enqueue_styles' );
