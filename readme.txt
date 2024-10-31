=== PitchHub Embed ===
Contributors: pitchhubitstuff
Tags: embed, insert, video, pitchhub
Requires at least: 4.6
Tested up to: 5.2
Requires PHP: 5.3
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Quickly add PitchHub video menus into your Wordpress pages and posts.

== Description ==

PitchHub Embed currently supports:
* Short code "pitchhub" for embedding pitchhub URLs

Technical specification...

* PHP7 compatible

== Getting Started ==

Use the shortcode "pitchhub" with a string parameter named "url" which contains the PitchHub URL to embed.

e.g. `[pitchhub id="32" token="cb0c7b167f5193477a4df963410bc39f"]`

The URL and the entire Wordpress string is generated from the PitchHub video menu user interface.

== Installation ==

PitchHub Embed can be found and installed via the Plugin menu within WordPress administration (Plugins -> Add New). Alternatively, it can be downloaded from WordPress.org and installed manually...

1. Upload the entire `pitchhub-embed` folder to your `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress administration.

== Frequently Asked Questions ==
None

== Screenshots ==

1. Example of entering PitchHub embed shortcode
2. Previewing the page that contains the short code

== Changelog ==
= 1.0.0 =
* Feature: initial release of the shortcode
= 1.0.1 =
* Improvement: relocated function and constants into a uniquely named class, to comply with the WP Plugin requirements
= 1.1.0 =
* Bug: Fixed bug that occurred if using a `player` value that is not equal to `player`
* Improvement: updated the PitchHub Embed URL

== Upgrade Notice ==
None

== Donations ==
None
