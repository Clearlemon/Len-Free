<?php
add_action('wp_ajax_cloadmore', 'Len_Commenst_Ajax');
add_action('wp_ajax_nopriv_cloadmore', 'Len_Commenst_Ajax');

function Len_Commenst_Ajax()
{

    global $post;
    $post = get_post($_POST['post_id']);
    setup_postdata($post);
    wp_list_comments(array(
        'page' => $_POST['cpage'],
        'per_page' => get_option('comments_per_page'),
        'callback' => 'Len_Comments_Module',
    ));
    die;
}
