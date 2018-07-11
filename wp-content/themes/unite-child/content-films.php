<?php
/**
 * @package unite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header page-header">

    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'unite-featured', array( 'class' => 'thumbnail' )); ?></a>

    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

    <?php if ( 'films' == get_post_type() ) : ?>
    <div class="entry-meta">
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
    </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->

  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <p><a class="btn btn-primary read-more" href="<?php the_permalink(); ?>"><?php _e( 'Continue reading', 'unite' ); ?> <i class="fa fa-chevron-right"></i></a></p>
  </div><!-- .entry-summary -->
  <?php else : ?>
  <div class="entry-content">

    <?php if(of_get_option('blog_settings') == 1 || !of_get_option('blog_settings')) : ?>
      <?php the_content( __( 'Continue reading <i class="fa fa-chevron-right"></i>', 'unite' ) ); ?>
    <?php elseif (of_get_option('blog_settings') == 2) :?>
      <?php the_excerpt(); ?>
    <?php endif; ?>

    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'unite' ),
        'after'  => '</div>',
      ) );
    ?>
  </div><!-- .entry-content -->
  <?php endif; ?>

  <footer class="entry-meta">
    <?php if ( 'films' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
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
    <?php endif; // End if 'post' == get_post_type() ?>

    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
    <span class="comments-link"><i class="fa fa-comment-o"></i><?php comments_popup_link( __( 'Leave a comment', 'unite' ), __( '1 Comment', 'unite' ), __( '% Comments', 'unite' ) ); ?></span>
    <?php endif; ?>

    <?php edit_post_link( __( 'Edit', 'unite' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-meta -->
  <hr class="section-divider">
</article><!-- #post-## -->
