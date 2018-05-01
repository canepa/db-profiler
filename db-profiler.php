<?php
/*
 * Plugin Name: Database profiler
 * Version: 1.0
 * Plugin URI: http://www.canepa.net/
 * Description: This plugin analyzes the impact of WordPress Plugins on the database.
 * Author: Alessandro Canepa
 * Author URI: http://www.canepa.net/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: db-profiler
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Alessandro Canepa
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-db-profiler.php' );
require_once( 'includes/class-db-profiler-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-db-profiler-admin-api.php' );
require_once( 'includes/lib/class-db-profiler-post-type.php' );
require_once( 'includes/lib/class-db-profiler-taxonomy.php' );

/**
 * Returns the main instance of db-profiler to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object db-profiler
 */
function db-profiler () {
	$instance = db-profiler::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = db-profiler_Settings::instance( $instance );
	}

	return $instance;
}

db-profiler();
