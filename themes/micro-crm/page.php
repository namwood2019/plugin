<?php get_header(); ?>

<div class="main">
  <div class="container py-2">
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
        <article>
          <h3><?php the_title(); ?></h3>
          <?php if(has_post_thumbnail()) :?>
            <div class="post-thumnail">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endif; ?>
          <?php the_content(); ?>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <?php echo wpautop('Sorry, No posts were found'); ?>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>