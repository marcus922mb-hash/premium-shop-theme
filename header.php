<!DOCTYPE html><html <?php language_attributes(); ?>><head><?php wp_head(); ?></head><body <?php body_class(); ?>>
<header>
  <div class="logo"><a href="<?= home_url() ?>">Markowe Bransoletki</a></div>
  <nav><?php wp_nav_menu(['theme_location'=>'primary']); ?></nav>
  <div class="header-controls">
    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>">
      <span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    </a>
    <button id="dark-toggle">🌙</button>
  </div>
</header>
