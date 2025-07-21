?php /* Template Name: Premium Home */ get_header(); ?>
<section class="hero" style="background-image:url('<?= get_field('hero_bg','option');?>');">
  <h1><?= get_field('hero_title','option'); ?></h1>
  <p><?= get_field('hero_sub','option'); ?></p>
  <a href="#products" class="btn">Zobacz produkty</a>
</section>

<section id="products" class="featured-products">
  <h2>Polecane</h2><div class="slides">
    <?php foreach(wc_get_products(['limit'=>8,'status'=>'publish']) as $p): ?>
    <div class="slide">
      <a href="<?= $p->get_permalink(); ?>">
        <?= wp_get_attachment_image($p->get_image_id(),'medium'); ?>
        <h3><?= $p->get_name(); ?></h3><span><?= $p->get_price_html(); ?></span>
      </a>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="faq"><h2>FAQ</h2>
  <?php foreach(get_posts(['post_type'=>'faq','numberposts'=>5]) as $f): ?>
    <button class="faq-q"><?= $f->post_title; ?></button>
    <div class="faq-a"><?= apply_filters('the_content',$f->post_content); ?></div>
  <?php endforeach; ?>
</section>

<section class="blog-preview"><h2>Aktualności</h2><div class="posts-grid">
  <?php foreach(get_posts(['numberposts'=>3]) as $post): ?>
    <div><a href="<?= get_permalink($post); ?>">
      <?= get_the_post_thumbnail($post,'medium'); ?>
      <h3><?= get_the_title($post); ?></h3>
    </a></div>
  <?php endforeach; ?>
</div></section>
<?php get_footer(); ?>
