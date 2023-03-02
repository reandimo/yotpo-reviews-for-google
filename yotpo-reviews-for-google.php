<?php


/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nativo.team
 * @since             1.0.0
 * @package           YotpoReviewsForGoogle
 *
 * @wordpress-plugin
 * Plugin Name:       Yotpo Reviews For Google
 * Plugin URI:        https://nativo.team
 * Description:       Enable Yotpo reviews on google search results for your products
 * Version:           1.0.0
 * Author:            Renan Diaz
 * Author URI:        https://nativo.team
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yotpo-rich-card-reviews
 */


define('YRFGRR_VERSION', '0.0.1');
define('YRFGRR_FILE', __FILE__); // this file
define('YRFGRR_BASENAME', plugin_basename(YRFGRR_FILE)); // plugin name as known by WP
define('YRFGRR_DIR', dirname(YRFGRR_FILE)); // our directory

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'YOTPO_RICH_CARD_REVIEWS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yotpo-rich-card-reviews-activator.php
 */
function activate_yotpo_reviews_for_google_reviews()
{
    include_once plugin_dir_path(__FILE__) . 'src/Activator.php';
    YotpoReviewsForGoogle\Activator::activate();
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yotpo-rich-card-reviews-deactivator.php
 */
function deactivate_yotpo_reviews_for_google_reviews() {
	require_once plugin_dir_path( __FILE__ ) . 'src/Deactivator.php';
	YotpoReviewsForGoogle\Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yotpo_reviews_for_google_reviews' );
register_deactivation_hook( __FILE__, 'deactivate_yotpo_reviews_for_google_reviews' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require __DIR__ . '/vendor/autoload.php';
require plugin_dir_path( __FILE__ ) . 'src/YotpoHelper.php';
require plugin_dir_path( __FILE__ ) . 'src/YotpoReviews.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_yotpo_reviews_for_google_reviews() {

	$plugin = new YotpoReviewsForGoogle\YotpoReviews();
	$plugin->run();

}
run_yotpo_reviews_for_google_reviews();
