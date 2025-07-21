<?php get_header();
while(have_posts()): the_post();
  wc_get_template_part('content','single-product');
  woocommerce_output_related_products();
endwhile;
get_footer();
