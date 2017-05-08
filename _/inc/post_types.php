<?php

/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Projects' ),
		'parent_item_colon'   => __( 'Parent Project' ),
		'all_items'           => __( 'All Projects' ),
		'view_item'           => __( 'View Project' ),
		'add_new_item'        => __( 'Add New Project' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit Project' ),
		'update_item'         => __( 'Update Project' ),
		'search_items'        => __( 'Search Projects' ),
		'not_found'           => __( 'Not Found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'projects' ),
		'description'         => __( 'Project showcase' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'category' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'projects', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );
