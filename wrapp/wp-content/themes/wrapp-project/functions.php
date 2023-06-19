<?php
    function load_scripts(){
    // all css file enqueue start

    
    wp_register_style('fancybox',get_template_directory_uri().'/css/fancybox.css');
    wp_enqueue_style('fancybox');

    wp_register_style('fancyboxmin',get_template_directory_uri().'/css/fancyboxmin.css');
    wp_enqueue_style('fancyboxmin');

    wp_register_style('slick',get_template_directory_uri().'/css/slick.css');
    wp_enqueue_style('slick');

    wp_register_style('slick-theme',get_template_directory_uri().'/css/slick-theme.css');
    wp_enqueue_style('slick-theme');

    wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style('bootstrap');
    
    wp_register_style('compat',get_template_directory_uri().'/css/compat.css');
    wp_enqueue_style('compat');

	wp_register_style('style',get_template_directory_uri().'/css/style.css');
    wp_enqueue_style('style');
     

    // all css file enqueue end

    // jquery
    wp_register_script('jquery-3.6.4.min',get_template_directory_uri().'/js/jquery-3.6.4.min.js');
    wp_enqueue_script('jquery-3.6.4.min');

    //  all js file enqueue start

    wp_register_script( 'js',get_template_directory_uri().'/js/script.js');
	wp_enqueue_script( 'js');

    wp_register_script('slick-carousel',get_template_directory_uri().'/js/slick-carousel_1.8.1_slick.min.js');
    wp_enqueue_script('slick-carousel');

    
    wp_register_script('ajax_libs_fancybox',get_template_directory_uri().'/js/cdnjs.cloudflare.com_ajax_libs_fancybox_3.5.7_jquery.fancybox.min.js');
    wp_enqueue_script('ajax_libs_fancybox');

    wp_register_script('umd_popper',get_template_directory_uri().'/js/cdn.jsdelivr.net_npm_@popperjs_core@2.11.6_dist_umd_popper.min.js');
    wp_enqueue_script('umd_popper');
    
    wp_register_script('net_npm_bootstrap',get_template_directory_uri().'/js/cdn.jsdelivr.net_npm_bootstrap@5.2.3_dist_js_bootstrap.min.js');
    wp_enqueue_script('net_npm_bootstrap');

  }
  add_action('wp_enqueue_scripts','load_scripts');
  

function theme_setup_one_setup(){
	$logo_width  = 300;
	$logo_height = 100;

	add_theme_support(
		'custom-logo',
		array(
			'height'               => $logo_height,
			'width'                => $logo_width,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
		)
	);
	register_nav_menus( array(
		'header_menu' => __( 'Header Menu', 'textdomain' )
	) );

	add_theme_support('post-thumbnails');

}

add_action( 'after_setup_theme', 'theme_setup_one_setup' );

// svg image 
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
add_filter( 'upload_mimes', 'cc_mime_types' );


// footer
function wpdocs_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Categories', 'textdomain' ),
		'id'            => 'Categories',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );

  register_sidebar( array(
		'name'          => __( 'Product', 'textdomain' ),
		'id'            => 'Product',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );

  register_sidebar( array(
		'name'          => __( 'Solutions', 'textdomain' ),
		'id'            => 'Solutions',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );

  register_sidebar( array(
		'name'          => __( 'Resources', 'textdomain' ),
		'id'            => 'Resources',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );

  register_sidebar( array(
		'name'          => __( 'Support', 'textdomain' ),
		'id'            => 'Support',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );

  register_sidebar( array(
		'name'          => __( 'Company', 'textdomain' ),
		'id'            => 'Company',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
 
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );


function custom_post_type()
{

	// Set UI labels for Custom Post Type
	$story_labels = array(
		'name'                => _x('Story', 'Post Type General Name', 'wrapp'),
		'singular_name'       => _x('Story', 'Post Type Singular Name', 'wrapp'),
		'menu_name'           => __('Story', 'wrapp'),
		'parent_item_colon'   => __('Parent Story', 'wrapp'),
		'all_items'           => __('All Story', 'wrapp'),
		'view_item'           => __('View Story', 'wrapp'),
		'add_new_item'        => __('Add New Story', 'wrapp'),
		'add_new'             => __('Add New', 'wrapp'),
		'edit_item'           => __('Edit Story', 'wrapp'),
		'update_item'         => __('Update Story', 'wrapp'),
		'search_items'        => __('Search Story', 'wrapp'),
		'not_found'           => __('Not Found', 'wrapp'),
		'not_found_in_trash'  => __('Not found in Trash', 'wrapp'),
	);

	// Set other options for Custom Post Type

	$story_args = array(
		'label'               => __('Story', 'wrapp'),
		'description'         => __('Story story and reviews', 'wrapp'),
		'labels'              => $story_labels,
		// Features this CPT supports in Post Editor
		'supports'            => array('title', 'editor',  'author', 'thumbnail',   'custom-fields','excerpt'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array('genres'),
		/* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true,

	);

	// Registering your Custom Post Type
	register_post_type('story', $story_args);


	$story_cat_labels = array(
		'name'                       => _x('Category', 'taxonomy general name', 'textdomain'),
		'singular_name'              => _x('Category', 'taxonomy singular name', 'textdomain'),
		'search_items'               => __('Search Category', 'textdomain'),
		'popular_items'              => __('Popular Category', 'textdomain'),
		'all_items'                  => __('All Category', 'textdomain'),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __('Edit Test', 'textdomain'),
		'update_item'                => __('Update Input', 'textdomain'),
		'add_new_item'               => __('Add New Test', 'textdomain'),
		'new_item_name'              => __('New Test Name', 'textdomain'),
		'separate_items_with_commas' => __('Separate Category with commas', 'textdomain'),
		'add_or_remove_items'        => __('Add or remove Category', 'textdomain'),
		'choose_from_most_used'      => __('Choose from the most used Category', 'textdomain'),
		'not_found'                  => __('No Category found.', 'textdomain'),
		'menu_name'                  => __('Category', 'textdomain'),
	);

	$story_cat_args = array(
		'hierarchical'          => true,
		'labels'                => $story_cat_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array('slug' => 'story-category'),
	);

	register_taxonomy('story-category', 'story', $story_cat_args);

	$story_cat_labels = array(
		'name'                       => _x('feature', 'taxonomy general name', 'textdomain'),
		'singular_name'              => _x('feature', 'taxonomy singular name', 'textdomain'),
		'search_items'               => __('Search feature', 'textdomain'),
		'popular_items'              => __('Popular feature', 'textdomain'),
		'all_items'                  => __('All feature', 'textdomain'),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __('Edit Test', 'textdomain'),
		'update_item'                => __('Update Input', 'textdomain'),
		'add_new_item'               => __('Add New Test', 'textdomain'),
		'new_item_name'              => __('New Test Name', 'textdomain'),
		'separate_items_with_commas' => __('Separate Category with commas', 'textdomain'),
		'add_or_remove_items'        => __('Add or remove Category', 'textdomain'),
		'choose_from_most_used'      => __('Choose from the most used Category', 'textdomain'),
		'not_found'                  => __('No Category found.', 'textdomain'),
		'menu_name'                  => __('Category', 'textdomain'),
	);

	$story_cat_args = array(
		'hierarchical'          => true,
		'labels'                => $story_cat_labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array('slug' => 'story-category'),
	);

	register_taxonomy('story-category', 'story', $story_cat_args);
	flush_rewrite_rules();
}
	add_action('init', 'custom_post_type', 0);


?>