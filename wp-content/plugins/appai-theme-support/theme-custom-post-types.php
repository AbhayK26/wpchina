<?php 

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}

class AppaiCustomPosts {

	function __construct()
	{
		add_action( 'init', array( $this, 'appai_portfolio') );
		add_action( 'init', array( $this, 'appai_portfolio_category') );
		add_action( 'init', array( $this, 'appai_portfolio_tags') );
	}



	/**
	 *
	 * Spark Portfolio Custom Post Type
	 *
	 */
	public function appai_portfolio()
	{

		$labels = array(
			'name'               => _x( 'Portfolio' , 'post type general name', 'maxive' ),
			'singular_name'      => _x( 'Portfolio', 'post type singular name', 'maxive' ),
			'menu_name'          => _x( 'Portfolio' , 'admin menu', 'maxive' ),
			'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'maxive' ),
			'add_new'            => __( 'Add New Portfolio', 'maxive' ),
			'add_new_item'       => __( 'Add New Portfolio', 'maxive' ),
			'new_item'           => __( 'New Portfolio', 'maxive' ),
			'edit_item'          => __( 'Edit Portfolio', 'maxive' ),
			'view_item'          => __( 'View Portfolio', 'maxive' ),
			'all_items'          => __( 'All Portfolios', 'maxive' ),
			'search_items'       => __( 'Search Portfolios', 'maxive' ),
			'parent_item_colon'  => __( 'Parent :', 'maxive' ),
			'not_found'          => __( 'No Portfolios found.', 'maxive' ),
			'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'maxive' )
		);

		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', 'maxive' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_icon'          => 'dashicons-businessman',
			'rewrite'            => array( 'slug' => 'Portfolio', 'with_front' => true, 'pages' => true, 'feeds' => true ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'menu_icon'	 	     => 'dashicons-admin-appearance',
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
		);

		register_post_type('portfolio', $args);
	}


	public function appai_portfolio_category()
	{
	   	$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'maxive' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'maxive' ),
			'search_items'      => __( 'Search Categories', 'maxive' ),
			'all_items'         => __( 'All Categories', 'maxive' ),
			'parent_item'       => __( 'Parent Category', 'maxive' ),
			'parent_item_colon' => __( 'Parent Category:', 'maxive' ),
			'edit_item'         => __( 'Edit Category', 'maxive' ),
			'update_item'       => __( 'Update Category', 'maxive' ),
			'add_new_item'      => __( 'Add New Category', 'maxive' ),
			'new_item_name'     => __( 'New Category Name', 'maxive' ),
			'menu_name'         => __( 'Category', 'maxive' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'pf-category' ),
		);

		register_taxonomy( 'portfolio-category', array( 'portfolio' ), $args );
	}

	public function appai_portfolio_tags()
	{
	   	$labels = array(
			'name'              => _x( 'Tags', 'taxonomy general name', 'maxive' ),
			'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'maxive' ),
			'search_items'      => __( 'Search Tags', 'maxive' ),
			'all_items'         => __( 'All Tags', 'maxive' ),
			'parent_item'       => __( 'Parent Tag', 'maxive' ),
			'parent_item_colon' => __( 'Parent Tag:', 'maxive' ),
			'edit_item'         => __( 'Edit Tag', 'maxive' ),
			'update_item'       => __( 'Update Tag', 'maxive' ),
			'add_new_item'      => __( 'Add New Tag', 'maxive' ),
			'new_item_name'     => __( 'New Tag Name', 'maxive' ),
			'menu_name'         => __( 'Tag', 'maxive' ),
		);

		$args = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'pf-tag' ),
		);

		register_taxonomy( 'portfolio-tag', array( 'portfolio' ), $args );
	}
}

$appaiCustomPostInstance = new AppaiCustomPosts;