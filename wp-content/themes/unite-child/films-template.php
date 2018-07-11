<?php
/**
 * Template Name: Films
 *
 * @package WordPress
 */
get_header(); 
$args = array(
  'post_type' => 'films',
  // Several more arguments could go here. Last one without a comma.
);

// Query the posts:
$films_query = new WP_Query($args);
?>

  <div id="primary" class="content-area col-sm-12 col-md-8">
    <main id="main" class="site-main" role="main">

    <?php if ( $films_query->have_posts() ) : ?>

      <?php /* Start the Loop */ ?>
      <?php while ( $films_query->have_posts() ) : $films_query->the_post(); ?>

        <?php
          /* Include the Post-Format-specific template for the content.
           * If you want to override this in a child theme, then include a file
           * called content-___.php (where ___ is the Post Format name) and that will be used instead.
           */
          get_template_part( 'content', 'films' );
        ?>

      <?php endwhile; ?>

      <?php unite_paging_nav(); ?>

    <?php else : ?>

      <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
