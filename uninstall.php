<?php
/**
* Uninstaller
*
* Uninstall the plugin by removing any options from the database
*
* @package	youtube-embed
* @since	2.0
*/

// If the uninstall was not called by WordPress, exit

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) { exit(); }

// Read the general options (will tell us how many profile and list options there should be

$options = get_option( 'pitchhub_embed_general' );

// If the general options existed, delete it!

if ( is_array( $options ) ) {

	delete_option( 'pitchhub_embed_general' );

	// If the number of profiles field exists, delete each one in turn

}

// Delete all other options

delete_option( 'pitchhub_embed_general' );
delete_option( 'pitchhub_embed_shortcode' );
delete_option( 'pitchhub_embed_shortcode_admin' );
delete_option( 'pitchhub_embed_shortcode_site' );
delete_option( 'pitchhub_embed_version' );

// Remove any transient data

global $wpdb;
$sql = "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_pitchhubembed%' OR option_name LIKE '_transient_timeout_pitchhubembed_%'";
$wipe = $wpdb -> query( $sql );
