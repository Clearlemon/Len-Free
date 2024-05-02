<?php


?>
<div id="respond" class="len-post-comments">
    <form method="post" id="commentform" class="comment-form">
        <div class="len-comments-blcok">
            <?php
            $comments_module = _len('Post_Comments_Module_2');
            if (!empty($comments_module)) {
                // 遍历评论模块设置
                foreach ($comments_module as $key => $value) {
                    if ($key === 'Post_Comments_Module_2_10') {
                        $Comments_Switcher = $value;
                    }
                }
            }
            if (!is_user_logged_in() && $Comments_Switcher == true) {
            } else {
                Len_Comments_Blcok_Module();
            }
            ?>
            <div class="len-comments-part"></div>
        </div>
        <p class="form-submit">
            <?php comment_id_fields(); ?>
        </p>
        <?php do_action('comment_form', $post->ID); ?>
    </form>
</div>
<?php

// 检查评论模块设置是否不为空
foreach ($comments_module as $key => $value) {
    if ($key === 'Post_Comments_Module_2_10') {
        $Comments_Switcher = $value;
    }
}
if (!is_user_logged_in() && $Comments_Switcher == true) {
?>
    <div class="len-comment-logincomments">
        <div class="len-comment-box">
            发现您未登录，请先<a href="http://localhost/wp-login.php">登录</a>后再发表评论！
        </div>
    </div>

<?php } else { ?>
    <div id="len-comments-module" class="len-comments-content">
        <?php
        // 防止直接加载 comments.php
        if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
            die('Please do not load this page directly. Thanks!');
        }

        // 检查是否需要密码才能查看评论
        if (post_password_required()) { ?>
            <p class="nocomments">这篇文章需要密码才能查看</p>
        <?php
            return; // 终止脚本执行
        } ?>

        <?php if (have_comments()) : ?>
            <div id="comments" class="len-have-comments-block-min">
                <ol id="ajax-comment" class="len-comments-ol-block">
                    <?php wp_list_comments(array('callback' => 'Len_Comments_Module',)); ?>
                </ol>
            </div>
        <?php else : ?>
            <div class="len-comments-block-min">
                <p class="len-no-comments-block-content">貌似没有新评论欸</p>
            </div>

        <?php endif; ?>
    </div>
<?php } ?>
<?php
Len_Comments_Ajax();
?>