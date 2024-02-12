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


<div id="comments" class="len-comments-content">
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
<div class="len_comment_pagination_block_all">
    <div><span>加载更多</span></div>
</div>

<script>
    var OwO_demo = new OwO({
        logo: 'OωO表情',
        container: document.getElementsByClassName('OwO')[0],
        target: document.getElementsByClassName('OwO-textarea')[0],
        api: '<?php echo esc_url(get_template_directory_uri()); ?>/Assets/Lne-JavaScript/123.json',
        position: 'down',
        width: '50%',
        maxHeight: '250px'
    });
    jQuery(document).ready(function($) {
        var page = 1;
        var loading = false;

        $('.len-load-more').on('click', function() {
            if (!loading) {
                loading = true;
                page++;

                $.ajax({
                    url: ajaxurl, // WordPress 提供的全局变量，指向 admin-ajax.php
                    type: 'post',
                    data: {
                        action: 'len_load_more_comments',
                        page: page
                    },
                    success: function(response) {
                        $('#len-comments-container .len-comments-ol-block').append(response);
                        loading = false;
                    }
                });
            }
        });
    });


    jQuery(document).ready(function($) {
        var initialFormLocation = $('#commentform').parent();
        var replyTargetId = null;

        // 提交评论
        $('#commentform').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '<?php echo esc_url(site_url('/wp-comments-post.php')); ?>',
                method: 'POST',
                data: formData,
                dataType: 'html',
                success: function(response) {
                    console.log(response);

                    $('#commentform')[0].reset();

                    $('#comments').load(location.href + ' #comments');

                    // 如果存在回复目标 ID，则将表单放回原始位置
                    if (replyTargetId !== null) {
                        $('#commentform').detach().appendTo(initialFormLocation);
                        replyTargetId = null;
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                },
            });
        });

        // 回复评论
        $('.comment-reply-link').click(function(event) {
            event.preventDefault();

            var parentCommentId = $(this).data('commentid');

            // 如果用户再次点击相同的回复链接，将表单放回原始位置
            if (replyTargetId === parentCommentId) {
                $('#commentform').detach().appendTo(initialFormLocation);
                replyTargetId = null;
            } else {
                // 否则，将表单移到新的回复目标位置
                $('#commentform').detach().appendTo('#comment-' + parentCommentId);
                replyTargetId = parentCommentId;
            }

            $('#comment_parent').val(parentCommentId);
        });
    });
</script>