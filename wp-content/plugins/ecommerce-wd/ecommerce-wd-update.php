<?php

function wde_update($version) {
  global $wpdb;
  $wpdb->query("CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "ecommercewd_tax_rates` (
    `id`		 		INT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    `country` 	 	INT(20) NOT NULL,
    `state`			VARCHAR(200) NOT NULL,
    `zipcode`	 		VARCHAR(200) NOT NULL,
    `city` 	 		VARCHAR(200) NOT NULL,
    `rate` 			DECIMAL(16,2) NOT NULL,
    `tax_name` 		VARCHAR(200) NOT NULL,
    `priority` 		INT(20) NOT NULL,
    `compound` 		INT(20) NOT NULL,
    `shipping_rate` 	DECIMAL(16,2) NOT NULL,
    `ordering` 		INT(20) NOT NULL,
    `tax_id` 			INT(20) NOT NULL,
    PRIMARY KEY (`id`)
    )
    ENGINE = MyISAM
    DEFAULT CHARSET = utf8
    AUTO_INCREMENT = 1;");
  if (version_compare($version, '1.1.0') == -1) {
    $wpdb->query('INSERT INTO `' . $wpdb->prefix . 'ecommercewd_options` (`id`, `name`, `value`, `default_value`) VALUES
      ("", "enable_tax", 1, 1),
      ("", "round_tax_at_subtotal", 0, 0),
      ("", "price_entered_with_tax", 0, 0),
      ("", "option_include_tax_in_checkout_price", 0, 0),
      ("", "tax_based_on", "shipping_address", "shipping_address"),
      ("", "price_display_suffix", "", ""),
      ("", "base_location", "", ""),
      ("", "tax_total_display", "single", "single")');
    $wpdb->query("ALTER TABLE " . $wpdb->prefix . "ecommercewd_orderproducts ADD `discount_rate` int(3) DEFAULT NULL");
    $wpdb->query("ALTER TABLE " . $wpdb->prefix . "ecommercewd_orderproducts ADD `discount` decimal(16,2) DEFAULT NULL");
    $wpdb->query("ALTER TABLE " . $wpdb->prefix . "ecommercewd_orderproducts ADD `shipping_method_type` varchar(10) DEFAULT NULL");
    $wpdb->query("ALTER TABLE " . $wpdb->prefix . "ecommercewd_orderproducts ADD `tax_info` longtext DEFAULT ''");
  }
  if (version_compare($version, '1.1.3') == -1) {
    $paypal_express_options = $wpdb->get_var("SELECT `options` FROM `" . $wpdb->prefix . "ecommercewd_payments` WHERE `base_name`='paypalexpress'");
    if ($paypal_express_options) {
      $paypal_express_options = WDFJson::decode($paypal_express_options);
      $paypal_express_options->skip_form = 0;
      $paypal_express_options->skip_overview = 0;
      $paypal_express_options->show_button = 0;
      $paypal_express_options->button_style = 'paypal';
      $paypal_express_options->button_text = 'Paypal express checkout';
      $paypal_express_options->button_image = '';
      $paypal_express_options = WDFJson::encode($paypal_express_options);
      $wpdb->query("UPDATE `" . $wpdb->prefix . "ecommercewd_payments` SET `options`='" . $paypal_express_options . "' WHERE `base_name`='paypalexpress'");
    }
  }
  if (version_compare($version, '1.1.4') == -1) {
    $widget_params = array(
      'widget_view_show_image' => 1,
      'widget_view_show_label' => 1,
      'widget_view_show_name' => 1,
      'widget_view_show_rating' => 1,
      'widget_view_show_category' => 1,
      'widget_view_show_manufacturer' => 1,
      'widget_view_show_model' => 1,
      'widget_view_show_price' => 1,
      'widget_view_show_market_price' => 1,
      'widget_view_show_button_compare' => 1,
      'widget_view_show_button_write_review' => 1,
      'widget_view_show_button_buy_now' => 1,
      'widget_view_show_button_add_to_cart' => 1,
      'widget_view_show_description' => 1,
      'widget_view_show_social_buttons' => 1,
      'widget_view_show_parameters' => 1,
      'widget_view_show_shipping_info' => 1,
      'widget_view_show_reviews' => 1,
      'widget_view_show_related_products' => 1,
      'widget_view_show_button_quick_view' => 1,
    );
    $themes = $wpdb->get_results( 'SELECT `id`,`data` FROM ' . $wpdb->prefix . 'ecommercewd_themes', ARRAY_A );
    foreach ( $themes as  $theme ) {
      $data = (array) json_decode($theme['data']);
      $id = $theme['id'];
      $data = array_merge($data, $widget_params);
      $wpdb->update($wpdb->prefix . 'ecommercewd_themes', array('data' => json_encode($data)), array('id' => $id));
    }
  }
  return;
}
