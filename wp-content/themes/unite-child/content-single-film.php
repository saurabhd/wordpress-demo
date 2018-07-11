<?php
/**
 * @package unite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header page-header">

    <?php 
      if ( of_get_option( 'single_post_image', 1 ) == 1 ) :
        the_post_thumbnail( 'unite-featured', array( 'class' => 'thumbnail' )); 
      endif;
    ?>

    <h1 class="entry-title "><?php the_title(); ?></h1>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content(); ?>
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'unite' ),
        'after'  => '</div>',
      ) );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-meta">
    <?php
        /* translators: used between list items, there is a space after the comma */
        $categories_list = apply_filters('films_genre', films_genre_list(get_the_ID()));
        if ( $categories_list ) :
      ?>
      <span class="cat-genre-links"><i class="fa fa-folder-open-o"></i>
        <?php printf( __( ' %1$s', 'unite' ),  $categories_list); ?>
      </span>
      <?php endif; // End if Genre ?>

      <?php
        /* translators: used between list items, there is a space after the comma */
        $country_list = apply_filters('films_country', films_country_list(get_the_ID()));
        if ( $country_list ) :
      ?>
      <span class="cat-country-links"><i class="fa fa-flag"></i>
        <?php printf( __( ' %1$s', 'unite' ), $country_list ); ?>
      </span>
      <?php endif; // End if country ?>
    <?php
        /* translators: used between list items, there is a space after the comma */
        $release_date = apply_filters('films_release_date', films_release_date(get_the_ID()));
        if ( $release_date ) :
      ?>
      <span class="release-date"><i class="fa fa-calendar"></i>
        <?php printf( __( 'Release Date : %1$s', 'unite' ), $release_date ); ?>
      </span>
      <?php endif; // End if Release Date ?>

      <?php
        /* translators: used between list items, there is a space after the comma */
        $ticket_price = apply_filters('films_ticket_price', films_ticket_price(get_the_ID()));
        if ( $ticket_price ) :
      ?>
      <span class="ticket-price"><i class="fa fa-money"></i>
        <?php printf( __( 'Ticket Price : %1$s', 'unite' ), $ticket_price ); ?>
      </span>
      <?php endif; // End if Ticket Price ?>

    <?php edit_post_link( __( 'Edit', 'unite' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
    <?php unite_setPostViews(get_the_ID()); ?>
    <hr class="section-divider">
  </footer><!-- .entry-meta -->
</article><!-- #post-## -->
