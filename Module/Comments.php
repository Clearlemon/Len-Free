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

function Len_Comments_Blcok_Module()
{
    $commenter = wp_get_current_commenter(); // 定义 $commenter
    $req = get_option('require_name_email'); // 定义 $req
    // 获取评论模块设置
    $comments_module = _len('Post_Comments_Module_2');

    // 检查评论模块设置是否不为空
    if (!empty($comments_module)) {
        // 遍历评论模块设置
        foreach ($comments_module as $key => $value) {
            // 如果键为 'Post_Comments_Module_2_5'，将值赋给 $Textarea
            if ($key === 'Post_Comments_Module_2_1') {
                $Expression = $value;
            }
            // 如果键为 'Post_Comments_Module_2_2'，将值赋给 $nickname
            elseif ($key === 'Post_Comments_Module_2_2') {
                $Nickname = $value;
            }
            // 如果键为 'Post_Comments_Module_2_5'，将值赋给 $Textarea
            elseif ($key === 'Post_Comments_Module_2_3') {
                $Mailbox = $value;
            }
            // 如果键为 'Post_Comments_Module_2_5'，将值赋给 $Textarea
            elseif ($key === 'Post_Comments_Module_2_4') {
                $Url = $value;
            }
            // 如果键为 'Post_Comments_Module_2_5'，将值赋给 $Textarea
            elseif ($key === 'Post_Comments_Module_2_5') {
                $Textarea = $value;
            }
            // 如果键为 'Post_Comments_Module_2_5'，将值赋给 $Textarea
            elseif ($key === 'Post_Comments_Module_2_6') {
                $User_avatar_log = $value;
            }
            // 如果键为 'Post_Comments_Module_2_5'，将值赋给 $Textarea
            elseif ($key === 'Post_Comments_Module_2_7') {
                $User_name_log = $value;
            }
            // 如果键为 'Post_Comments_Module_2_5'，将值赋给 $Textarea
            elseif ($key === 'Post_Comments_Module_2_8') {
                $User_avatar_nolog = $value;
            }
            // 如果键为 'Post_Comments_Module_2_5'，将值赋给 $Textarea
            elseif ($key === 'Post_Comments_Module_2_9') {
                $User_name_nolog = $value;
            }
            // 其他字段的处理，可以根据需要添加类似的条件
            // ...
        }
    }

    ?>
    <div class="len-comments-main">
        <div class="len-user-comments-avatar-blcok">
            <?php if (is_user_logged_in()) : ?>
                <img class="user-comments-avatar" src="<?php echo $User_avatar_log; ?>" alt="">
                <p class="user-comments-name-blcok"><?php echo $User_name_log; ?></p>
            <?php else : ?>
                <img class="user-comments-avatar" src="<?php echo $User_avatar_nolog; ?>" alt="">
                <p class="user-comments-name-blcok"><?php echo $User_name_nolog; ?></p>
            <?php endif; ?>
        </div>
        <div class="len-user-comments-content">
            <?php if (is_user_logged_in()) : ?>
            <?php else : ?>
                <div class="len-comments-input-block">
                    <input class="len-comments-input lan-len-comments-inputcolour" placeholder="<?php echo $Nickname; ?>" type="text" name="author" id="author" value="<?php echo esc_attr($commenter['comment_author']); ?>" <?php if ($req) echo 'required'; ?>>
                    <input class="len-comments-input lan-len-comments-inputcolour" placeholder="<?php echo $Mailbox; ?>" type="email" name="email" id="email" value="<?php echo esc_attr($commenter['comment_author_email']); ?>" <?php if ($req) echo 'required'; ?>>
                    <input class="len-comments-input lan-len-comments-inputcolour" placeholder="<?php echo $Url; ?>" type="url" name="url" id="url" value="<?php echo esc_attr($commenter['comment_author_url']); ?>">
                </div>
            <?php endif; ?>
            <div class="len-comments-textarea">
                <textarea class="len-comments-textarea-block lan-len-comments-inputcolour" name="comment" id="comment" rows="5" placeholder="<?php echo $Textarea; ?>"></textarea>
                <div class="len-comments-submit-button-block">
                    <input id="submit" type="submit" name="submit" value="提交评论" class="comments-submit-button comments-submit-buttoneffect"></input>
                </div>
            </div>
            <div class="len-comments">
                <!-- <div class="OwO">OwO表情</div> -->
            </div>
        </div>
    </div>
<?php
}
?>