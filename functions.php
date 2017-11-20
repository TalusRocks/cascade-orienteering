<?php

//set time zone
date_default_timezone_set('America/Los_Angeles');

//add_filter( 'show_admin_bar', '__return_false' );

add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

// Function below will control excerpt length of blog/news posts
function coc_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'coc_excerpt_length', 999 );

function register_theme_menus() {

	register_nav_menus(
		array(
			'main-nav-menu' => __( 'Main Nav Menu' )
			)
	);
}
add_action( 'init', 'register_theme_menus' );


function coc_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

coc_create_widget( 'Event Sidebar', 'event', 'Displays in the sidebar of event pages' );
coc_create_widget( 'News Sidebar', 'news', 'Displays in the sidebar of event pages' );
coc_create_widget( 'Map Sidebar', 'map', 'Displays in the sidebar of the Map page' );
coc_create_widget( 'Series Sidebar', 'series', 'Displays in the sidebar of the series pages' );
//coc_create_widget( 'Results Sidebar', 'results', 'Displays in the sidebar of the single results page' );
coc_create_widget( 'Contact Sidebar', 'contact', 'Displays in the sidebar of the contact page' );
coc_create_widget( 'All Results Sidebar', 'allresults', 'Displays in the sidebar of the All Results page' );
//coc_create_widget( 'Season Standings', 'season', 'Displays in the sidebar of the Season Standings page' );
coc_create_widget( 'Newcomers', 'newcomers', 'Displays in the sidebar of the Newcomers page' );
coc_create_widget( 'Skills', 'skills', 'Displays in the sidebar of the Skills page' );
coc_create_widget( 'Faq', 'faq', 'Displays in the sidebar of the FAQ page' );
coc_create_widget( 'Volunteer', 'volunteer', 'Displays in the sidebar of the Volunteer page' );
coc_create_widget( 'Info', 'info', 'Displays in the sidebar of any Info page' );
coc_create_widget( 'Permanent Course', 'perm', 'Displays in the sidebar of the permanent courses page' );


coc_create_widget( 'Series Menu Widget', 'series-only', 'Displays a small menu on the Events page' );
coc_create_widget( 'Special Events Menu Widget', 'special-only', 'Displays a small menu on the Events page' );
coc_create_widget( 'Regional Menu Widget', 'regional-only', 'Displays a small menu on the Events page' );
coc_create_widget( 'World Menu Widget', 'world-only', 'Displays a small menu on the Events page' );


coc_create_widget( 'Social Area 1', 'social-1', 'First widget to display in social area' );
coc_create_widget( 'Social Area 2', 'social-2', 'Second widget to display in social area' );
coc_create_widget( 'Social Area 3', 'social-3', 'Third widget to display in social area' );
coc_create_widget( 'Social Area 4', 'social-4', 'Fourth widget to display in social area' );
coc_create_widget( 'Social Area 5', 'social-5', 'Fifth widget to display in social area' );
coc_create_widget( 'Social Area 6', 'social-6', 'Sixth widget to display in social area' );




function coc_theme_styles() {
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'coc_theme_styles' );


function coc_theme_js() {
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
}
add_action ( 'wp_enqueue_scripts', 'coc_theme_js' );








?>