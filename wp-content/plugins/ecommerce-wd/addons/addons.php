<?php
function wde_addons() {
  if (function_exists('current_user_can')) {
    if (!current_user_can('manage_options')) {
      die('Access Denied');
    }
  }
  else {
    die('Access Denied');
  }
  $addons = array(
    'wdef'   => array(
      'name'        => __('Ecommerce WD Filters', 'wde'),
      'url'         => 'https://web-dorado.com/products/wordpress-ecommerce/add-ons/filters.html',
      'description' => __('This add-on is designed for advanced product filter and browsing. It will display multiple filters, which will make it easier for the user to find the relevant products.', 'wde'),
      'icon'        => '',
      'image'       => WD_E_URL . '/addons/images/filters.png',
    ),
    'wdemc'   => array(
      'name'        => __('Ecommerce WD Mini Cart', 'wde'),
      'url'         => 'https://web-dorado.com/products/wordpress-ecommerce/add-ons/mini-cart.html',
      'description' => __('This add-on is designed for displaying shopping cart information including products and their details in widget area.', 'wde'),
      'icon'        => '',
      'image'       => WD_E_URL . '/addons/images/mini-cart.png',
    ),
    'wdelp'   => array(
      'name'        => __('Ecommerce WD Latest Products', 'wde'),
      'url'         => 'https://web-dorado.com/products/wordpress-ecommerce/add-ons/latest-products.html',
      'description' => __('Latest products is a simple tool for displaying newly added items in widget area.', 'wde'),
      'icon'        => '',
      'image'       => WD_E_URL . '/addons/images/latest-products.png',
    ),
    'wdetrp'   => array(
      'name'        => __('Ecommerce WD Top Rated Products', 'wde'),
      'url'         => 'https://web-dorado.com/products/wordpress-ecommerce/add-ons/top-rated-products.html',
      'description' => __('Top rated products is a simple tool for displaying top rated items in widget area.', 'wde'),
      'icon'        => '',
      'image'       => WD_E_URL . '/addons/images/top-rated-products.png',
    ),
    'wdebs'   => array(
      'name'        => __('Ecommerce WD Bestsellers', 'wde'),
      'url'         => 'https://web-dorado.com/products/wordpress-ecommerce/add-ons/bestsellers.html',
      'description' => __('Ecommerce WD Bestsellers add-on is a simple tool for displaying bestsellers in widget area.', 'wde'),
      'icon'        => '',
      'image'       => WD_E_URL . '/addons/images/bestsellers.png',
    ),
  );
  wp_register_style('wde_addons', WD_E_URL . '/addons/style.css', array(), WD_E_VERSION);
  wp_print_styles('wde_addons');
  ?>
  <div class="wrap">
    <div id="settings">
      <div id="settings-content" >
        <h2 id="add_on_title"><?php _e('Ecommerce WD Add-ons', 'wde'); ?></h2>
        <?php
        if ($addons) {
          foreach ($addons as $name => $addon) {
            ?>
            <div class="add-on">
              <h2><?php echo $addon['name']; ?></h2>
              <figure class="figure">
                <div  class="figure-img">
                  <a href="<?php echo $addon['url']; ?>" target="_blank">
                    <?php
                    if ($addon['image']) {
                      ?>
                      <img src="<?php echo $addon['image']; ?>" />
                      <?php
                    }
                    ?>
                  </a>
                </div>
                <figcaption class="addon-descr figcaption">
                  <?php
                  if ($addon['icon']) {
                    ?>
                    <img src="<?php echo $addon['icon']; ?>" />
                    <?php
                  }
                  ?>
                  <?php echo $addon['description']; ?>
                </figcaption>
              </figure>
              <?php
              if ($addon['url'] !== '#') {
                ?>
              <a href="<?php echo $addon['url']; ?>" target="_blank" class="addon"><span><?php _e('GET THIS ADD ON', 'wde'); ?></span></a>
                <?php
              }
              else {
                ?>
              <div class="ecwd_coming_soon">
                <img src="<?php echo WD_E_URL . '/addons/images/coming_soon.png'; ?>" />
              </div>
                <?php
              }
              ?>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
  <?php
}