<?php
/* Widget Register / UN-register */
function doctor_manage_widgets() {

	/* Contact Info */
	require_once("contactinfo.php");
	
	/* Working Time */
	require_once("workingtime.php");
	
	/* Accordion */
	require_once("accordion.php");
	
	/* Blog Post Tab */
	require_once("blogpost.php");
	
	register_widget( 'Doctor_Widget_ContactInfo' );
	
	register_widget( 'Doctor_Widget_WorkingTime' );
	
	register_widget( 'Doctor_Widget_PostTab' );
	
	register_widget( 'Doctor_Widget_Accordion' );
	
}
add_action( 'widgets_init', 'doctor_manage_widgets' );