<?php 

if(!function_exists('films_genre_list')) {
  function films_genre_list ($post_id) {
    $genres = get_the_terms($post_id, 'films_genre');
    $genre_list = '';
    foreach ($genres as $key => $genre) {
      $genre_list .= $genre->name . ',';
    }
    return rtrim($genre_list, ',');
  }
}

if(!function_exists('films_country_list')) {
  function films_country_list ($post_id) {
    $countries = get_the_terms($post_id, 'films_country');
    $country_list = '';
    foreach ($countries as $key => $country) {
      $country_list .= $country->name . ',';
    }
    return rtrim($country_list, ',');
  }
}

if(!function_exists('films_year_list')) {
  function films_year_list ($post_id) {
    $years = get_the_terms($post_id, 'films_year');
    $year_list = '';
    foreach ($years as $key => $year) {
      $year_list .= $year->name . ',';
    }
    return rtrim($year_list, ',');
  }
}

if(!function_exists('films_actors_list')) {
  function films_actors_list ($post_id) {
    $actors = get_the_terms($post_id, 'films_actors');
    $actor_list = '';
    foreach ($actors as $key => $actor) {
      $actor_list .= $actor->name . ',';
    }
    return rtrim($actor_list, ',');
  }
}

if(!function_exists('films_release_date')) {
  function films_release_date($post_id) {
    $release_date = get_post_meta($post_id, 'Release Date', true);
    return $release_date;
  }
}

if(!function_exists('films_ticket_price')) {
  function films_ticket_price($post_id) {
    $ticket_price = get_post_meta($post_id, 'Ticket Price', true);
    return $ticket_price;
  }
}