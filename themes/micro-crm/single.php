<?php get_header(); ?>

<div class="main">
  <div class="container py-2">
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
        <article>
          <h3><?php the_title(); ?></h3>
          <div class="meta">
            Created by <?php the_author(); ?> on <?php the_date('l jS \of F Y h:i:s A'); ?>
          </div>
          <br/>
          <?php if(has_post_thumbnail()) :?>
            <div class="post-thumnail">
              <?php the_post_thumbnail(); ?>
            </div>
          <?php endif; ?>
          <div class="py-2">
          <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <?php echo wpautop('Sorry, No posts were found'); ?>
    <?php endif; ?>
    <a class="btn-dark" href="<?php echo site_url('/nouvelles'); ?>">Back</a>
  </div>
</div>

<?php get_footer(); ?>