<?php

namespace Roots\Sage\Titles;

/**
 * Page titles
 */
function title() {
  global $post;

  if (is_home()) {
    if (get_option('page_for_posts', true)) {
      return get_the_title(get_option('page_for_posts', true));
    } else {
      return __('Latest Posts', 'sage');
    }
  } elseif (is_archive()) {
    return get_the_archive_title();
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'sage'), get_search_query());
  } elseif (is_404()) {
    return __('Sorry, page not found', 'sage');
  } elseif (is_page_template('template-disciplinary-statements-child-page.php')) {
    return get_the_title($post->post_parent);
  } else {
    return get_the_title();
  }
}
