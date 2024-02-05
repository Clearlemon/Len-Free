<?php

function Len_Article_Showcase()
{
    if (is_home() && !is_paged() && is_sticky()) {
        $args = array(
            'posts_per_page' => -1,
            'post__in'  => get_option('sticky_posts')
        );
        $sticky_posts = new WP_Query($args);

        while ($sticky_posts->have_posts()) : $sticky_posts->the_post();
            Len_index_article();
        endwhile;
        wp_reset_query();
    }
    //普通文章输出
    while (have_posts()) {
        the_post();
        Len_index_article();
    }
}



function Len_index_article()





{
?>
    <div class="len-post-block">
        <a class="len-links-post len-pjax-link-all-blcok" href="Post/post-1.html">
            <div class="len-post-thumbnail-blcok">
                <img class="thumbnail-background-min" src="wp-content/themes/Len-Free/Assets/Len-Images/post-background-1.png" alt="">
                <div class="len-classify-box-blcok">
                    <p class="len-classify-title-blcok">其他</p>
                </div>
            </div>
        </a>
        <div class="len-post-content-block">
            <div class="len-post-content-min">
                <h3 class="len-post-title-block">Lemon ———— 极简的双边栏主题</h3>
                <hr>
                <p class="len-post-part-block">
                    主题相对于某些主题来说，算得上是简洁了，没有过多且复杂的主题设置，但又不会使得主题内容单一无趣,主题内的图标多数使用了阿里巴巴的失衡图标库内的图标，主题内并未使用UI框架全手搓....
                </p>
                <div class="len-like-comments-browse-avatar-name-time-block-min">
                    <div class="len-post-statistics-user">
                        <div class="len-avatar-block-min">
                            <img class="avatar-background-block" src="wp-content/themes/Len-Free/Assets/Len-Images/user-avatar.jpg" alt="">
                        </div>
                        <div class="len-name-block-min">
                            <p class="name-text-block">青桔柠檬</p>
                        </div>
                    </div>

                    <div class="len-post-statistics-block">
                        <div class="len-browse-blcok-min">
                            <svg class="len-left-post-icon" aria-hidden="true">
                                <use xlink:href="#icon-liulan"></use>
                            </svg>
                            64
                        </div>
                        <div class="len-comments-block-min">
                            <svg class="len-left-post-icon" aria-hidden="true">
                                <use xlink:href="#icon-pinglun"></use>
                            </svg>12
                        </div>
                        <div class="len-like-block-min">
                            <svg class="len-left-post-icon" aria-hidden="true">
                                <use xlink:href="#icon-xihuan"></use>
                            </svg>30
                        </div>
                        <div class="len-time-block-min">
                            <svg class="len-left-post-icon" aria-hidden="true">
                                <use xlink:href="#icon-shijianzhouqi"></use>
                            </svg>5天前
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
}

/**
 * 获取文章摘要内容
 *
 * @param int $excerpt_length 摘要长度
 * @param int $post_id 文章ID
 *
 * @return string 文章摘要
 */
function Len_Article_Content($excerpt_length = 55, $post_id = '')
{
    global $post;

    // 如果未传入文章ID，则使用当前文章的ID
    if (!$post_id) {
        $post_id = $post->ID;
    }

    $excerpt = '';

    // 获取文章内容
    $post_content = get_post_field('post_content', $post_id);

    // 如果文章内容存在
    if ($post_content) {
        // 对文章内容进行处理：去除HTML标签，应用内容过滤器，然后使用 mb_strimwidth 截取摘要
        $excerpt = mb_strimwidth(strip_tags(apply_filters('the_content', $post_content)), 0, $excerpt_length, '…');
    }

    return $excerpt;
}
