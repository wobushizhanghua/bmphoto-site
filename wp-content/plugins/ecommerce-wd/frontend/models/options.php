<?php
defined('ABSPATH') || die('Access Denied');

class EcommercewdModelOptions extends EcommercewdModel {
  private $options;
  
  public function get_options() {
    if ($this->options == null) {
      global $wpdb;
      $query = 'SELECT name, value';
      $query .= ' FROM ' . $wpdb->prefix . 'ecommercewd_options';
      $rows = $wpdb->get_results($query);

      if ($wpdb->last_error) {
        WDFHelper::show_error(8);
      }

      $options = new stdClass();
      foreach ($rows as $row) {
        $name = $row->name;
        $value = $row->value;
        $options->$name = $value;
      }
        $this->options = $options;
    }
    return $this->options;
  }
}