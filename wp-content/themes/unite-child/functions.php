<?php 

/**
 * Implement the function for get taxonomy list.
 */
require get_stylesheet_directory() . '/inc/common-functions.php';

add_action( 'wp_enqueue_scripts', 'unite_child_enqueue_styles' );
function unite_child_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

function films() {
    register_post_type( 'films',
        array(
            'labels' => array(
                'name' => 'Films',
                'singular_name' => 'Films',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Films',
                'edit' => 'Edit',
                'edit_item' => 'Edit Films',
                'new_item' => 'New Films',
                'view' => 'View',
                'view_item' => 'View Films',
                'search_items' => 'Search Films',
                'not_found' => 'No Films found',
                'not_found_in_trash' => 'No Films found in Trash',
                'parent' => 'Parent Films'
            ),
            'public' => true,
        	'publicly_queryable' => true,
	        'show_ui' => true,
	        'query_var' => true,
		    'rewrite' => true,
        	'capability_type' => 'post',
		    'hierarchical' => false,  
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields' ),
            // 'taxonomies' => array( 'genre', 'country', 'Years', 'Actors' ),
            // 'menu_icon' => 'F',
            // 'menu_icon' => plugins_url().'/images/films.png',
            'has_archive' => true
        )
    );
    register_taxonomy('films_genre', 'films', array('hierarchical' => true, 'label' => 'Genre', 'singular_name' => 'Genre', "rewrite" => true, "query_var" => true));
    register_taxonomy('films_country', 'films', array('hierarchical' => true, 'label' => 'Country', 'singular_name' => 'Country', "rewrite" => true, "query_var" => true));
    register_taxonomy('films_year', 'films', array('hierarchical' => true, 'label' => 'Year', 'singular_name' => 'Year', "rewrite" => true, "query_var" => true));
    register_taxonomy('films_actors', 'films', array('hierarchical' => true, 'label' => 'Actors', 'singular_name' => 'Actors', "rewrite" => true, "query_var" => true));
}
add_action( 'init', 'films' );

// function create_taxonimies() {
// 	wp_insert_term(
// 		'Genre',
// 		'films_category',
// 		array(
// 		  'description'	=> 'This is a Genre category.',
// 		  'slug' 		=> 'genre'
// 		)
// 	);
// 	wp_insert_term(
// 		'Country',
// 		'films_category',
// 		array(
// 		  'description'	=> 'This is a Country category.',
// 		  'slug' 		=> 'country'
// 		)
// 	);
// 	wp_insert_term(
// 		'Years',
// 		'films_category',
// 		array(
// 		  'description'	=> 'This is a Years category.',
// 		  'slug' 		=> 'years'
// 		)
// 	);
// 	wp_insert_term(
// 		'Actors',
// 		'films_category',
// 		array(
// 		  'description'	=> 'This is a Actors category.',
// 		  'slug' 		=> 'actors'
// 		)
// 	);
// }
// add_action( 'init', 'create_taxonimies' );
?>