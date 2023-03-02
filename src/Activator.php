<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @package    YotpoReviewsForGoogle
 */

namespace YotpoReviewsForGoogle;

class Activator
{
    
    /**
     * Activation
     *
     */
    public static function activate()
    {
        // Woocommerce is active
	    if( !class_exists( 'WooCommerce' ) ) {
	        deactivate_plugins( plugin_basename( __FILE__ ) );
	        wp_die( 'Please install and Activate WooCommerce', 'Plugin dependency check', array( 'back_link' => true ) );
	    }

        // Yotpo is active
        if (!function_exists('wc_yotpo_get_degault_settings')) {
	        deactivate_plugins( plugin_basename( __FILE__ ) );
	        wp_die( 'Please install and Activate <a href="https://wordpress.org/plugins/yotpo-social-reviews-for-woocommerce/" target="_blank">Yotpo: Product & Photo Reviews for WooCommerce</a>', 'Plugin dependency check', array( 'back_link' => true ) );
	    }
    }
}