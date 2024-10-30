<?php
/*
Plugin Name: Collapsible FAQs
Plugin URI: http://wpgurus.net/
Description: Helps you create an aesthetically pleasing FAQ (Frequently Asked Questions) page.
Version: 1.0
Author: Hassan Akhtar
Author URI: http://wpgurus.net/
License: GPL2
*/

/**********************************************
*
* Core functionality
*
***********************************************/

function wpcfaq_item($atts, $content = null){
	global $wpcfaq_shortcode_used;
	$wpcfaq_shortcode_used = true;
	return '<div class="wpcfaq-item">'.do_shortcode($content).'</div>';
}
add_shortcode( 'wpcf_item', 'wpcfaq_item' );

function wpcfaq_question($atts, $content = null){
	global $wpcfaq_shortcode_used;
	$wpcfaq_shortcode_used = true;
	return '<a class="wpcfaq-question" href="#">'.$content.'</a>';
}
add_shortcode( 'wpcf_question', 'wpcfaq_question' );

function wpcfaq_answer($atts, $content = null){
	global $wpcfaq_shortcode_used;
	$wpcfaq_shortcode_used = true;
	return '<div class="wpcfaq-answer" style="display:none;">'.$content.'</div>';
}
add_shortcode( 'wpcf_answer', 'wpcfaq_answer' );

function wpcfaq_register_script() {
	wp_register_script( 'wpcfaq_script', plugins_url( 'static/js/scripts.js', __FILE__ ), array('jquery') );
}
add_action('init', 'wpcfaq_register_script');

function wpcfaq_print_script() {
	global $wpcfaq_shortcode_used;
	if(!$wpcfaq_shortcode_used) return;
	wp_print_scripts('wpcfaq_script');
}
add_action('wp_footer', 'wpcfaq_print_script');