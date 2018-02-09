<?php
/**
 * Thumbnails configuration.
 *
 * @package    streamline
 * @subpackage Config
 * @author     Cherry Team <cherryframework@gmail.com>
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}

// Registers custom image sizes for the theme.
add_action( 'init', 'streamline_register_image_sizes' );
function streamline_register_image_sizes() {

	if ( ! current_theme_supports( 'post-thumbnails' ) ) {
		return;
	}

	set_post_thumbnail_size( 238, 182, true );

	// Registers a new image sizes.
	add_image_size( 'streamline-thumb-s', 150, 150, true );
	add_image_size( 'streamline-thumb-240-100', 240, 100, true );
	add_image_size( 'streamline-thumb-m', 400, 400, true );
	add_image_size( 'streamline-thumb-560-350', 560, 350, true );
	add_image_size( 'streamline-post-thumbnail-large', 770, 480, true );
	add_image_size( 'streamline-thumb-l', 1170, 780, true );
	add_image_size( 'streamline-thumb-xl', 1920, 1080, true );

	add_image_size( 'streamline-thumb-150-115', 150, 115, true );
	add_image_size( 'streamline-thumb-238-182', 238, 182, true );
	add_image_size( 'streamline-thumb-337-258', 337, 258, true );
	add_image_size( 'streamline-thumb-536-411', 536, 411, true );
	add_image_size( 'streamline-thumb-426-327', 426, 327, true );
	add_image_size( 'streamline-thumb-860-662', 860, 662, true );
	add_image_size( 'streamline-thumb-1132-411', 1132, 411, true );
}