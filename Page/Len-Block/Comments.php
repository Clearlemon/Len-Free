<div id="respond" class="len-post-comments">
    <form method="post" id="commentform" class="comment-form">
        <div class="len-comments-blcok">
            <?php Len_Comments_Blcok_Module(); ?>
            <div class="len-comments-part"></div>
        </div>
        <p class="form-submit">
            <?php comment_id_fields(); ?>
        </p>
        <?php do_action('comment_form', $post->ID); ?>
    </form>
</div>


<div id="len-comments-module" class="len-comments-content">
    <?php
    // 防止直接加载 comments.php
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
        die('Please do not load this page directly. Thanks!');
    }

    // 检查是否需要密码才能查看评论
    if (post_password_required()) { ?>
        <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
        return; // 终止脚本执行
    } ?>

    <?php if (have_comments()) : ?>
        <div id="comments" class="len-have-comments-block-min">
            <ol class="len-comments-ol-block">
                <?php wp_list_comments(array('callback' => 'Len_Comments_Module',)); ?>
            </ol>
        </div>
    <?php else : ?>
        <div class="len-comments-block-min">
            <p class="len-no-comments-block-content">貌似没有新评论欸</p>
        </div>

    <?php endif; ?>
</div>

<?php
$cpage = get_query_var('cpage') ? get_query_var('cpage') : 1;
if ($cpage > 1) {
    echo '<div class="comment_loadmore">加载更多评论</div>
	<script>
	var ajaxurl = "' . admin_url('admin-ajax.php') . '",parent_post_id = ' . get_the_ID() . ',cpage = ' . $cpage . ';
	</script>';
}

Len_Comments_Js_Module()
?>