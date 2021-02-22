<?php 

/**
 * Admin dashboard settings
 */

 /**
 * Login logo url
 */
add_filter('login_headerurl', function ($url) {
    return get_site_url();
});

/**
 * Login logo
 */
add_action('login_enqueue_scripts', function () {

	if (!class_exists('ACF') and !get_field('header_logo', 'option')) return;

?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(<?php the_field('header_logo', 'option'); ?>);
			width: 100%;
			background-size: contain;
		}
	</style>
<?php

});

/**
 * Hide ACF from admin menu
 */
add_filter('acf/settings/show_admin', function () {
    return WP_ENVIRONMENT_TYPE != 'development' ? false : true;
});