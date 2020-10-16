<?php
/*
Template Name: Demo Plugin
*/
?>

<?php get_header(); ?>

<div class="main">
  <section id="company-a">
    <div class="container text-center py-2">
      <h1>Notre Entreprise</h1>
    </div>
  </section>

  <section id="company-b">
    <div class="container text-center py-2">
      <h3>En 1992 Marcel Vertlette, un fameux entrepreneur au sein du monde manufacturier fonda Vertlette.</h3>
      <br/>
      <a class="btn-dark" href="<?php echo site_url('/'); ?>">Back</a>
    </div>
  </section>
</div>
<br/>
<?php get_footer(); ?>