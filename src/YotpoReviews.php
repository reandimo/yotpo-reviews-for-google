<?php

namespace YotpoReviewsForGoogle; 

class YotpoReviews
{

    /**
     * Run the actions
     */
    public function run()
    {

        add_filter( 'woocommerce_structured_data_product', array($this, 'yotpo_reviews_for_structured_data'), 100, 2 );
        
    }
    
    /**
     * Add reviews to schema
     */
    function yotpo_reviews_for_structured_data( $markup, $product ) {
    
        if ( ! is_product() ) {
            return $markup;
        }
    
        $bottomline = \YotpoReviewsForGoogle\Helper::get_yotpo_bottomline($product->get_id());
    
        if( ! $bottomline ){
            error_log( __FUNCTION__ . ': Can\'t retrieve bottomline.');
            return $markup;
        }

        $markup['aggregateRating'] = [
            '@type' => 'aggregateRating',
            'ratingValue' => $bottomline->average_score,
            'reviewCount' => $bottomline->total_reviews,
        ];
    
        return $markup;
    
    } 

}