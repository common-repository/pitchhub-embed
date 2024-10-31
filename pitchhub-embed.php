<?php
/*
Plugin Name: PitchHub Embed
Plugin URI: https://blog.pitchhub.com/support/support-plugins-wordpress/
Description: Quickly add PitchHub video menus into your Wordpress pages and posts.
Version: 1.1.0
Author: PitchHub
Author URI: https://www.pitchhub.com
Text Domain: pitchhub-embed
*/

/**
 * PitchHub Embed
 *
 * Main code - include various functions
 *
 * @package	pitchhub-embed"
 * @since	1.0
 */

define( 'pitchhub_embed_version', '1.0.1' );

class PitchHubEmbed
{
    const HTML_NEW_LINE = "<br/>";


    /**
     * Constructor function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        // embed shortcode
        add_shortcode("pitchhub", array( $this, "shortcode") );

    }
    /**
     * @param null $attributes = attribute array
     *        Possible values:
     *           - id = required, PitchHub Video Menu ID
     *           - token = required, token associated with the Video Menu ID
     *           - player = optional, player url. Only "player.pitchhub.com" and "player-test.pitchhub.com" are valid
     *
     * @param null $content = contents, when "enclosure" is used. Enclosure is not currently supported
     * @return string
     *
     * @noinspection PhpUnusedParameterInspection
     */
    public function shortcode($attributes = null, $content = null)
    {
        $id = "";
        $token = "";
        $player = "";

        extract($attributes);

        // Conversions
        $id = trim($id);
        $token = trim($token);
        $player = trim(strtolower($player));

        // Defaults
        if ($player == "") {
            $player = "player";
        }

        // Check validity
        $valid_id = ($id != "");
        $valid_token = ($token != "");
        $valid_player = ( ($player == "player") or ($player == "player-test") );
        $valid = ($valid_id and $valid_token and $valid_player);

        // Error messages
        $result = "";
        if (!$valid_id) {
            $message = 'Invalid PitchHub ID: "' . $id . '"';
            $result = $result . $message . PitchHubEmbed::HTML_NEW_LINE;
            $this->debug( $message );
        }
        if (!$valid_token) {
            $message = 'Invalid PitchHub Token: "' . $token . '"';
            $result = $result . $message . PitchHubEmbed::HTML_NEW_LINE;
            $this->debug( $message );
        }
        if (!$valid_player) {
            $message = 'Invalid PitchHub Player: "' . $player . '"';
            $result = $result . $message . PitchHubEmbed::HTML_NEW_LINE;
            $this->debug( $message );
        }

        if ( $valid ) {

            // The parameters are valid, so setup the response...

            $url = "https://" . $player . ".pitchhub.com/en/public/video_menu?token=" . $token . "&presentation_db=" . $id . "&menu_id=3";
            $result = "<script src=\"" . $url . "\" type=\"text/javascript\"></script>";
        }

        return $result;
    }

    /**
     * Output a text string to the log file
     * @param $message = text string to be logged
     */
    protected function debug( $message ) {
        if ( WP_DEBUG ) {
            error_log( $message );
        }
    }

}

$pitchhub_embed = new PitchHubEmbed();
