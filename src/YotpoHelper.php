<?php

namespace YotpoReviewsForGoogle;

use Yotpo;

/**
 * Yotpo PHP wrapper for Yotpo Plugin
 */

class Helper
{

    static function get_yotpo()
    {

        if (!function_exists('wc_yotpo_get_degault_settings')) {
            return false;
        }

        $settings = get_option('yotpo_settings', wc_yotpo_get_degault_settings());
        $ak = $settings['app_key'];
        $st = $settings['secret'];

        if( empty($ak) || empty($st) ){
            error_log( __FUNCTION__ . ': Yotpo configuration is not set.');
            return false;
        }

        $yotpo = new \Yotpo\Yotpo($ak, $st);

        return $yotpo;
    }

    static function get_yotpo_reviews($product_id)
    {

        if (!function_exists('wc_yotpo_get_degault_settings')) {
            return false;
        }

        $cache_key = "yotpo-reviews-{$product_id}";
        $cachedReviews = get_transient($cache_key);

        if ($cachedReviews == false) {

            $yotpo = self::get_yotpo();
            $settings = get_option('yotpo_settings', wc_yotpo_get_degault_settings());
            $hash = array(
                'app_key' => $settings['app_key'],
                'product_id' => $product_id
            );
            $response = $yotpo->get_product_reviews($hash);
            if ($response->status->code >= 200) {
                set_transient($cache_key, $response->response->reviews, WEEK_IN_SECONDS);
                return $response->response->reviews;
            } else {
                return false;
            }
        } else {
            return $cachedReviews;
        }
    }

    static function get_yotpo_bottomline($product_id)
    {

        if (!function_exists('wc_yotpo_get_degault_settings')) {
            return false;
        }

        $cache_key = "yotpo-bottomline-{$product_id}";
        $cachedBottomline = get_transient($cache_key);

        if ($cachedBottomline == false) {

            $yotpo = self::get_yotpo();
            $settings = get_option('yotpo_settings', wc_yotpo_get_degault_settings());
            $hash = array(
                'app_key' => $settings['app_key'],
                'product_id' => $product_id
            );
            $response = $yotpo->get_product_bottom_line($hash);
            if ($response->status->code >= 200) {
                set_transient($cache_key, $response->response->bottomline, WEEK_IN_SECONDS);
                return $response->response->bottomline;
            } else {
                return false;
            }
        } else {
            return $cachedBottomline;
        }
    }

}
