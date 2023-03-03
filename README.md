Yotpo Reviews for Google
======================

Add your Yotpo Reviews to Google Search Results using AggregateRating prop in schema.
 
--- 

Outline
-------

* [Requirements](#requirements)
* [Installation](#installation)   
* [Why Bother](#why-bother) 
* [How Would Look on Google?](#how-would-look-on-google)  
* [License](#license) 
* [Question? Issues?](#questions-issues) 
* [Who's Behind](#whos-behind) 

## Requirements

- [Woocommerce](https://wordpress.org/plugins/woocommerce/)
- [Yotpo: Product & Photo Reviews for WooCommerce](https://wordpress.org/plugins/yotpo-social-reviews-for-woocommerce/) - Yotpo should be configured for this plugin to work. 

## Installation
 
Automatic installation is the easiest option — WordPress will handle the file transfer, and you won’t need to leave your web browser. To do an automatic install of WooCommerce, log in to your WordPress dashboard, navigate to the Plugins menu, and click “Add New.”

Click on "Upload" and search the plugin file, click on "Install Now" and Activate.

## Why Bother

Yotpo plugin does not include any modification of structured data for products, this is valid since woocommerce manages this feature but if your stores uses Yotpo to manage all the reviews, the product ratings would not appear on Google when you search for any product from your store.

To fix it this plugin retrieves the rating count and rating to add the missing portion `"AggregateRating"` ([See Documentation](https://developers.google.com/search/docs/appearance/structured-data/review-snippet#aggregated-rating-type-definition)) to the structured data of your products if applies.

## How Would Look on Google?

After you install this plugin, your product should appear like this on google:

![Preview](https://i.imgur.com/0tdxkOD.png)

You can always test this here: [Rich Results Tests](https://search.google.com/test/rich-results)

## License

This Package is open source and released under MIT license. See the LICENSE file for more info.

## Question? Issues?

Feel free to open issues for suggestions, questions, and issues.

## Who's Behind

Renan Diaz, i'm dealing with PHP since 2017 & Google's API since 2019. Feel free to write me to my email (Please don't send any multi-level crap).
