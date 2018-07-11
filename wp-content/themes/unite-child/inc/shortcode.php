<?php 

function unit_get_latest_post($atts) {
  $post_arg = shortcode_atts(
    array(
      'post_type' => 'films',
      'post_per_page' => 5,
      'post_status' => 'publish'
    ),
    $atts
  );

  $post_query = new WP_Query($post_arg);
  $html = '';
  if($post_query->have_posts()) {
    $html .= '<ul>'; 
      while ($post_query->have_posts()) {
        $post_query->the_post();
        $html .= '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
      }
    $html .= '</ul>';
  }
  return $html;
}

add_shortcode('film_posts', 'unit_get_latest_post');