<?php 

/**
 * Theme configuration
 * 
 */

/**
 * Setup
 */
function theme_setup() {

    /**
     * Translation 
     */
	load_theme_textdomain( '_THEME', get_template_directory() . '/languages' );

    /**
     * Register nav menus
     */
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu', '_theme' )
		)
	);
    
    /**
     * Theme support
     */
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
		'search-form'
	) );
}

add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Assets
 */
function theme_assets () {
	// css
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/dist/css/app.css' ); 

	// js
	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/assets/dist/js/app.js', array('jquery'), '1.0.0', true );

};

add_action( 'wp_enqueue_scripts', 'theme_assets' );

/**
 * Remove from admin menu
 */
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php'); //Comments
	remove_menu_page('edit.php'); //Blog

	global $submenu;

	// Appearance Menu (Customizer)
	unset($submenu['themes.php'][6]);
});


/**
 * CF7 remove wrappers and <br>
 *  
 */ 
add_filter('wpcf7_form_elements', function ($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Acf JSON
 */
add_filter('acf/settings/save_json', function ($path) {
	// update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $path;
});

add_filter('acf/settings/load_json', function ($paths) {
	// remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $paths;
});
