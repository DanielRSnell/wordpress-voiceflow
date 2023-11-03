<?php
/**
 * Plugin Name: Voiceflow
 * Description: Adds Voiceflow chat widget to your site.
 * Version: 1.0.0
 * Author: Umbral.ai
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Define constants for file paths.
define( 'VOICEFLOW_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'VOICEFLOW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include other files.
require_once VOICEFLOW_PLUGIN_PATH . 'includes/admin/settings.php';
require_once VOICEFLOW_PLUGIN_PATH . 'includes/enqueue-scripts.php';

// ... other includes as needed ...