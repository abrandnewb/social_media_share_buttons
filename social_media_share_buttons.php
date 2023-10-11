<?php
/*
Plugin Name: My Social Media Share Buttons
Description: This plugin adds social media share buttons to the end of the post content.
Version: 1.0.0
Author: Biniyam AH
*/

// Require the other two plugin files.
require_once(dirname(__FILE__) . '/index.php');
require_once(dirname(__FILE__) . '/settings.php');

// Register the plugin activation and deactivation hooks.
register_activation_hook(__FILE__, 'my_social_media_share_buttons_activate');
register_deactivation_hook(__FILE__, 'my_social_media_share_buttons_deactivate');

// Activate the plugin.
function my_social_media_share_buttons_activate() {
  // Do any necessary plugin activation tasks here.
}

// Deactivate the plugin.
function my_social_media_share_buttons_deactivate() {
  // Do any necessary plugin deactivation tasks here.
}
?>


