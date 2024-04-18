<?php
function Len_Post_Ajax()
{
  $selected_category = $_POST['category'];
  $posts_per_page = $_POST['posts_per_page'];
  $paged = $_POST['paged'];


  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'post_status' => 'publish',
  );

  if (!empty($selected_category)) {
    $args['cat'] = $selected_category;
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      if (!is_sticky() || is_paged()) {
        Len_index_article();
      }
    }
    wp_reset_postdata();
  }

  die();
}
add_action('wp_ajax_Len_Post_Ajax', 'Len_Post_Ajax');
add_action('wp_ajax_nopriv_Len_Post_Ajax', 'Len_Post_Ajax');
