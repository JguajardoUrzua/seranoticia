<?php

// Widget Settings

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Left Navigation',
		'before_widget' => '<div class="left-widget">', 
	'after_widget' => '</div>', 
	'before_title' => '<div class="widget-header">', 
	'after_title' => '</div>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Navigation',
		'before_widget' => '<div class="right-widget">', 
	'after_widget' => '</div>', 
	'before_title' => '<div class="widget-header">', 
	'after_title' => '</div>', 
	));



?>