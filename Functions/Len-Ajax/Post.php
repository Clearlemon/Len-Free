<?php
add_action('wp_ajax_nopriv_ajax_index_post', 'Len_Post_Ajax');
add_action('wp_ajax_ajax_index_post', 'Len_Post_Ajax');
function Len_Post_Ajax()
{
  $paged = $_POST["paged"];
  $total = $_POST["total"];
  $category_id = $_POST["category_id"];
  $tag_id = $_POST["tag_id"];
  $search_keyword = $_POST["search_keyword"];

  $args = array(
    'post_type' => 'post',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged,
    'orderby' => 'date',
    'cat' => $category_id,
    's' => $search_keyword,
    'tag_id' => $tag_id,
  );
  $the_query = new WP_Query($args);
  while ($the_query->have_posts()) {
    $the_query->the_post();

    if (!is_sticky() || is_paged()) {
    }
  }
  wp_reset_postdata();
  if ($total > $paged) echo '';
  die();
}
