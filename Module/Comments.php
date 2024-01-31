<?php
//自定义评论样式
function Len_Comments_Module($comment, $args, $depth)
{
    $avatar_url = get_avatar_url($comment, array('size' => 48));

    //  获取当前评论的 ID 和父评论 ID
    $comment_id = $comment->comment_ID;
    $parent_comment_id = $comment->comment_parent;

    // 判断是否有父评论，即是否为回复评论
    $is_reply = $parent_comment_id !== '0';

    // 获取评论对象
    $comment = get_comment($comment_id);

    // 初始化 $User_groups 变量
    $User_groups = '游客';

    // 如果评论作者是已注册用户
    if ($comment->user_id > 0) {
        // 获取评论作者的用户ID
        $user_id = $comment->user_id;

        // 获取用户角色
        $user_roles = get_userdata($user_id)->roles;

        // 判断用户角色并赋值给 $User_groups 变量
        if (in_array('administrator', $user_roles)) {
            $User_groups = '管理员';
        } elseif (in_array('editor', $user_roles)) {
            $User_groups = '编辑';
        } elseif (in_array('author', $user_roles)) {
            $User_groups = '作者';
        } elseif (in_array('contributor', $user_roles)) {
            $User_groups = '投稿者';
        } elseif (in_array('subscriber', $user_roles)) {
            $User_groups = '订阅者';
        }
    }

    if ($is_reply) { ?>
        <div id="comment-<?php echo $comment_id; ?>" class="len-comments-reply-body len-comments-reply">
            <div class="len-comment-author len-comment-name">
                <img alt="" src="<?php echo $avatar_url; ?>" class="" height="40" width="40" loading="lazy" decoding="async">
                <cite class="len-comment-cite">
                    <span class="len-comment-user"><?php printf(get_comment_author()); ?></span>
                    <i class="len-comment-administrators"><?php echo $User_groups; ?></i>
                    <?php if ($is_reply) {
                        $parent_comment = get_comment($parent_comment_id);
                        $parent_comment_author = $parent_comment->comment_author;
                        echo '<span class="len-comments-respondent">@' . esc_html($parent_comment_author) . '</span>';
                    } ?>
                </cite>
            </div>
            <!-- 还没写时间样式  -->
            <div class="len-comments-other-message">
                <a><?php
                    printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time());
                    ?></a>
                <div class="browser-message-reply">
                    <div class="comments-reply-div"><?php edit_comment_link(__('Edit'), '  ', ''); ?><?php
                                                                                                        comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                                                                                                        ?></div>
                </div>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('你的评论还在审核当中哦~'); ?></em>
                <br />
            <?php endif; ?>
            <p class="len-reply-content"><?php echo get_comment_text(); ?></p>


        </div>
    <?php
    } else { ?>

        <div id="comment-<?php echo $comment_id; ?>" class="len-comment-body">
            <div class="len-comment-author len-comment-name">
                <img alt="" src="<?php echo $avatar_url; ?>" class="" height="40" width="40" loading="lazy" decoding="async">
                <cite class="len-comment-cite">
                    <span class="len-comment-user"><?php printf(get_comment_author()); ?></span>
                    <i class="len-comment-administrators"><?php echo $User_groups; ?></i>
                </cite>
            </div>
            <!-- 还没写时间样式  -->
            <div class="len-comments-other-message">
                <a><?php
                    printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time());
                    ?></a>
                <div class="browser-message-reply">
                    <div class="comments-reply-div"><?php edit_comment_link(__('Edit'), '  ', ''); ?><?php
                                                                                                        comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
                                                                                                        ?></div>
                </div>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('你的评论还在审核当中哦~'); ?></em>
                <br />
            <?php endif; ?>
            <p class="len-reply-content"><?php echo get_comment_text(); ?></p>


        </div>
<?php
    }
}
