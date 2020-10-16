<?php get_header(); ?>

<div class="main">
  <div class="container py-2">
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/post', 'content'); ?>  
      <?php endwhile; ?>
    <?php else : ?>
      <?php echo wpautop('Sorry, No posts were found'); ?>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
