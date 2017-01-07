<?php

defined('ABSPATH') || die('Access Denied');

class EcommercewdControllerWithoutonline extends EcommercewdController {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////

  public function finish_checkout() {
    WDFChecoutHelper::check_can_checkout();
    WDFChecoutHelper::check_checkout_data();

    $model = WDFHelper::get_model('checkout');
    if ($model->is_final_checkout_data_valid(false) == false) {
      WDFChecoutHelper::show_error(0, __('Checkout data is invalid', 'wde'));
    }

    $final_checkout_data = $model->get_final_checkout_data();

    if ($final_checkout_data === false) {
      WDFChecoutHelper::show_error(0, __('Final checkout data is invalid', 'wde'));
    }

    $this->finish_checkout_without_online_payment($final_checkout_data);
  }

  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////

  private function finish_checkout_without_online_payment($final_checkout_data) {
    $model = WDFHelper::get_model('checkout');
    $options_model = WDFHelper::get_model('options');
    $options = $options_model->get_options();
    $final_checkout_data = $model->store_checkout_data();
    if ($final_checkout_data === false) {
      WDFChecoutHelper::show_error(WDFInput::get('session_id'), __('Final checkout data is invalid', 'wde'));
    }

    $model_orders = WDFHelper::get_model('orders');

    $order_id = $final_checkout_data['order_id'];
    // $row_order = WDFDb::get_row_by_id('orders', $order_id);
    // $row_order = $model_orders->add_order_products_data($row_order, true);
    $row_order = WDFHelper::get_order($order_id);

    WDFChecoutHelper::send_checkout_finished_mail($row_order, 'new');

    $action_display_finished_success = WDFPath::add_pretty_query_args(get_permalink($options->option_checkout_page), $options->option_endpoint_checkout_finished_success, '1', FALSE);
    $action_display_finished_success = add_query_arg(array('session_id' => $final_checkout_data['session_id'], 'order_id' => $order_id), $action_display_finished_success);
    wp_redirect($action_display_finished_success);
    exit;
  }

  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}