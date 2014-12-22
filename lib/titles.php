<?php

function page_title() {
  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return 'Latest Posts';
    }
  } elseif (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      return apply_filters('single_term_title', $term->name);
    } elseif (is_post_type_archive()) {
      return apply_filters('the_title', get_queried_object()->labels->name);
    } elseif (is_day()) {
      return sprintf('Daily Archives: %s', get_the_date());
    } elseif (is_month()) {
      return sprintf('Monthly Archives: %s', get_the_date('F Y'));
    } elseif (is_year()) {
      return sprintf('Yearly Archives: %s', get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      return sprintf('Author Archives: %s', apply_filters('the_author', is_object($author) ? $author->display_name : null));
    } else {
      return single_cat_title('', false);
    }
  } elseif (is_search()) {
    return sprintf('Search Results for %s', get_search_query());
  } elseif (is_404()) {
    return 'Not Found';
  } else {
    return get_the_title();
  }
}
