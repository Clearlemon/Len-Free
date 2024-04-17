<?php

// PHP代码（在functions.php中）
add_action('wp_ajax_cloadmore', 'Len_Commenst_Ajax'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_cloadmore', 'Len_Commenst_Ajax'); // wp_ajax_nopriv_{action}

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
