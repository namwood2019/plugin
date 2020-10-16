<?php get_header(); ?>

<div class="main">
  <div class="container py-2">
    <h1>Search Results</h1>
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
        <div class="archive-post">
          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          <p>Posted on: <?php the_time('F j, Y g:i a'); ?></p>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <?php echo wpautop('Sorry, No posts were found'); ?>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
