?php
add_action('after_setup_theme','premium_setup');
function premium_setup(){
  add_theme_support('woocommerce');
  add_theme_support('title-tag');
  if(function_exists('acf_add_options_page')){
    acf_add_options_page(['page_title'=>'Ustawienia Premium','menu_title'=>'Premium','menu_slug'=>'premium-settings']);
  }
}

add_action('wp_enqueue_scripts','premium_assets');
function premium_assets(){
  wp_enqueue_style('premium-style', get_stylesheet_directory_uri().'/css/style.css', ['parent-style']);
  wp_enqueue_script('premium-main', get_stylesheet_directory_uri().'/js/main.js', ['jquery'], null, true);
  wp_localize_script('premium-main','premiumSettings', [
    'ajaxUrl' => admin_url('admin-ajax.php')
  ]);
}

add_action('wp_head',function(){
  if(is_front_page()):
?>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Store","name":"Markowe Bransoletki","url":"<?= home_url() ?>","logo":"<?= get_stylesheet_directory_uri() ?>/images/logo.png","sameAs":["https://facebook.com/","https://instagram.com/"],"description":"Ekskluzywna ręcznie robiona biżuteria"}
</script>
<?php endif;});

add_action('wp_ajax_premium_newsletter','premium_newsletter');
add_action('wp_ajax_nopriv_premium_newsletter','premium_newsletter');
function premium_newsletter(){
  $email = sanitize_email($_POST['email']);
  if(is_email($email)){
    wp_send_json_success(['msg'=>"Kod rabatowy wysłany!"]);
  }
  wp_send_json_error(['msg'=>"Nieprawidłowy email"]);
}
