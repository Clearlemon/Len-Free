<?php

function Len_Article_Showcase()
{

    //判断当前页面是否为首页
    if (is_home()) {
        // 输出置顶文章
        $sticky_post_count = 0; // 记录已输出的置顶文章数量
        if (!is_paged() && is_sticky()) {
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'post',
                'post__in'  => get_option('sticky_posts')
            );
            $sticky_posts = new WP_Query($args);

            while ($sticky_posts->have_posts()) : $sticky_posts->the_post();
                Len_index_article(); // 替换成您的文章输出函数
                $sticky_post_count++; // 每输出一篇置顶文章，计数器加一
            endwhile;
            wp_reset_postdata();
        }

        // 输出普通文章
        $posts_per_page = get_option('posts_per_page'); // 获取每页文章数量
        $normal_post_count = $posts_per_page - $sticky_post_count; // 计算需要输出的普通文章数量
        while (have_posts() && $normal_post_count > 0) {
            the_post();

            // 检查当前文章是否是置顶文章，如果是则跳过输出
            if (is_sticky()) {
                continue;
            }

            Len_index_article(); // 替换成您的文章输出函数
            $normal_post_count--; // 每输出一篇普通文章，计数器减一
        }
    }


    // if (is_category()) {
    //     // 获取当前分类页的分类对象
    //     $category = get_queried_object();

    //     // 获取当前分类页的置顶文章ID
    //     $sticky_posts = get_option('sticky_posts');

    //     // 查询置顶文章
    //     $sticky_args = array(
    //         'post_type' => 'post',
    //         'posts_per_page' => -1,
    //         'cat' => $category->term_id,
    //         'post__in' => $sticky_posts, // 只查询置顶文章
    //     );

    //     $sticky_query = new WP_Query($sticky_args);

    //     // 输出置顶文章
    //     if ($sticky_query->have_posts()) {
    //         while ($sticky_query->have_posts()) {
    //             $sticky_query->the_post();
    //             // 替换成您的文章输出函数
    //             Len_index_article();
    //         }
    //     }

    //     // 查询普通文章
    //     $args = array(
    //         'post_type' => 'post',
    //         'posts_per_page' => -1,
    //         'cat' => $category->term_id,
    //         'post__not_in' => $sticky_posts, // 排除置顶文章
    //     );

    //     $query = new WP_Query($args);

    //     // 输出普通文章
    //     if ($query->have_posts()) {
    //         while ($query->have_posts()) {
    //             $query->the_post();
    //             // 替换成您的文章输出函数
    //             Len_index_article();
    //         }
    //     }

    //     wp_reset_postdata();
    // }

    if (is_category()) {
        // 获取当前分类页的分类对象
        $category = get_queried_object();

        // 获取当前分类页的置顶文章ID
        $sticky_posts = get_option('sticky_posts');


        $Cat_Module_3 =  Len_Classify_Module($category->term_id, 'Cat_Module_3', true);
        if ($Cat_Module_3 == 'Cat_Post_Top_2') {
            // 查询当前分类页的置顶文章
            $sticky_args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'cat' => $category->term_id,
                'post__in' => $sticky_posts, // 只查询置顶文章
                'post_status' => 'publish', // 只查询发布状态的文章
            );

            $sticky_query = new WP_Query($sticky_args);

            // 输出当前分类页的置顶文章
            while ($sticky_query->have_posts()) {
                $sticky_query->the_post();
                // 替换成您的文章输出函数
                Len_index_article();
            }
        } elseif ($Cat_Module_3 == 'Cat_Post_Top_1') {
            $sticky_args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'post__in' => get_option('sticky_posts'), // 只查询置顶文章
            );

            $sticky_query = new WP_Query($sticky_args);

            // 输出所有分类下的置顶文章
            while ($sticky_query->have_posts()) {
                $sticky_query->the_post();
                // 替换成您的文章输出函数
                Len_index_article();
            }
        }
        // 查询当前分类页的普通文章，排除已经输出的置顶文章
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'cat' => $category->term_id,
            'post__not_in' => $sticky_posts, // 排除置顶文章
            'post_status' => 'publish', // 只查询发布状态的文章
        );

        $query = new WP_Query($args);

        // 输出当前分类页的普通文章
        $posts_per_page = get_option('posts_per_page'); // 获取每页文章数量
        $normal_post_count = $posts_per_page - $sticky_query->post_count; // 计算需要输出的普通文章数量

        while ($query->have_posts() && $normal_post_count > 0) {
            $query->the_post();
            // 替换成您的文章输出函数
            Len_index_article();
            $normal_post_count--; // 每输出一篇普通文章，计数器减一
        }

        wp_reset_postdata();
    }

    if (is_tag()) {
        // 获取当前标签页的标签对象
        $tag = get_queried_object();

        // 获取当前标签页的置顶文章ID
        $sticky_posts = get_option('sticky_posts');

        $Cat_Module_3 =  Len_Classify_Module($tag->term_id, 'Cat_Module_3', true);
        if ($Cat_Module_3 == 'Cat_Post_Top_2') {
            // 查询当前分类页的置顶文章
            $sticky_args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'tag_id' => $tag->term_id,
                'post__in' => $sticky_posts, // 只查询置顶文章
                'post_status' => 'publish', // 只查询发布状态的文章
            );

            $sticky_query = new WP_Query($sticky_args);

            // 输出当前分类页的置顶文章
            while ($sticky_query->have_posts()) {
                $sticky_query->the_post();
                // 替换成您的文章输出函数
                Len_index_article();
            }
        } elseif ($Cat_Module_3 == 'Cat_Post_Top_1') {
            $sticky_args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'tag_id' => $tag->term_id,
                'post__in' => get_option('sticky_posts'), // 只查询置顶文章
            );

            $sticky_query = new WP_Query($sticky_args);

            // 输出所有分类下的置顶文章
            while ($sticky_query->have_posts()) {
                $sticky_query->the_post();
                // 替换成您的文章输出函数
                Len_index_article();
            }
        }
        // 查询当前分类页的普通文章，排除已经输出的置顶文章
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tag_id' => $tag->term_id,
            'post__not_in' => $sticky_posts, // 排除置顶文章
            'post_status' => 'publish', // 只查询发布状态的文章
        );

        $query = new WP_Query($args);

        // 输出当前分类页的普通文章
        $posts_per_page = get_option('posts_per_page'); // 获取每页文章数量
        $normal_post_count = $posts_per_page - $sticky_query->post_count; // 计算需要输出的普通文章数量

        while ($query->have_posts() && $normal_post_count > 0) {
            $query->the_post();
            // 替换成您的文章输出函数
            Len_index_article();
            $normal_post_count--; // 每输出一篇普通文章，计数器减一
        }

        wp_reset_postdata();
    }
}





function Len_index_article()
{
    //获取文章ID
    $Post_ID = get_the_ID();
    //获取文章内容
    $Content = Len_Article_Content($excerpt_length = 140, $Post_ID);
    //获取文章标题
    $Title = get_the_title();
    //获取文章特色图
    $Thumbnail = Len_Get_Img(array('src' => Len_Lazy_Thumbnail(), 'alt' => $Title, 'data-src' => Len_Thumbnail_Module($Post_ID), 'class' => array('thumbnail-background-min', 'lazy'), 'id' => '',));
    // 获取文章发布时间
    $Post_Time = Len_Like_Comments_Browse_Time_Module('', '', '', $Post_ID);
    //获取评论数量
    $Post_Comments = Len_Like_Comments_Browse_Time_Module('', $Post_ID, '', '');
    //获取喜欢数量
    $Post_Like = Len_Like_Comments_Browse_Time_Module($Post_ID, '', '', '');
    //获取文章的分类
    //获取文章用户ID以及信息
    $Author_ID = get_post_field('post_author', $Post_ID);
    $User = get_user_by('ID', $Author_ID);
    $User_avatar = get_avatar_url($Author_ID);
    $User_name = $User->display_name;
?>
    <div class="len-post-block">
        <a class="len-links-post len-pjax-link-all-blcok" href="<?php echo the_permalink(); ?>">
            <div class="len-post-thumbnail-blcok">
                <?php echo $Thumbnail; ?>

                <div class="len-classify-box-blcok">
                    <p class="len-classify-title-blcok"><?php echo Len_Parent_Category_Module($Post_ID, true, false, false); ?></p>
                </div>
            </div>
        </a>
        <div class="len-post-content-block">
            <div class="len-post-content-min">
                <a class="len-links-post len-pjax-link-all-blcok" href="<?php echo the_permalink(); ?>">
                    <h3 class="len-post-title-block"><?php echo $Title; ?></h3>
                    <?php if (is_sticky()) { ?>
                        <p class="len-top-title-blcok">置顶</p>
                    <?php } ?>
                </a>
                <hr>
                <p class="len-post-part-block"><?php echo $Content; ?></p>
                <div class="len-like-comments-browse-avatar-name-time-block-min">
                    <div class="len-post-statistics-user">
                        <div class="len-avatar-block-min">
                            <img class="avatar-background-block" src="<?php echo $User_avatar; ?>" alt="">
                        </div>
                        <div class="len-name-block-min">
                            <p class="name-text-block"><?php echo $User_name; ?></p>

                        </div>
                    </div>
                    <div class="len-post-statistics-block">
                        <div class="len-browse-blcok-min">
                            <svg class="len-left-post-icon" aria-hidden="true">
                                <use xlink:href="#icon-liulan"></use>
                            </svg><?php echo Len_post_views($Post_ID); ?>
                        </div>
                        <div class="len-comments-block-min">
                            <svg class="len-left-post-icon" aria-hidden="true">
                                <use xlink:href="#icon-pinglun"></use>
                            </svg><?php echo $Post_Comments; ?>
                        </div>
                        <div class="len-like-block-min">
                            <svg class="len-left-post-icon" aria-hidden="true">
                                <use xlink:href="#icon-xihuan"></use>
                            </svg><?php echo $Post_Like; ?>
                        </div>
                        <div class="len-time-block-min">
                            <svg class="len-left-post-icon" aria-hidden="true">
                                <use xlink:href="#icon-shijianzhouqi"></use>
                            </svg><?php echo $Post_Time; ?>
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
    } else {
        $excerpt = '啊哦！这是一篇空荡荡的文章哦~';
    }

    return $excerpt;
}

function Len_Web_Background()
{
    $Module_2 = _('Module_2');
    if ($Module_2 == true) {
        $Module_2_1 = _len('Module_2_1');
    ?>
        <img class="bady-background-block" src="<?php echo $Module_2_1 ?>">
<?php
    }
}


function Len_Post_Page()
{
    global $wp_query;

    // 获取当前页码
    $current_page = max(1, get_query_var('paged'));
    $total_pages = $wp_query->max_num_pages;


    // 获取首页链接
    $home_url = esc_url(home_url('/'));

    // 添加第一页和最后一页链接
    $first_page_link = esc_url(get_pagenum_link(1));
    $last_page_link = esc_url(add_query_arg('paged', $wp_query->max_num_pages, $home_url));

    // 获取分页链接
    $paginate_links = paginate_links(array(
        'current' => $current_page,
        'mid_size' => 2,
        'prev_text' => '上一页',
        'next_text' => '下一页',
        'end_size' => 2, // 设置最后一页链接的数量
    ));

    // 输出分页链接
    if ($paginate_links) {
        echo '<div class="len_post_page_block_all">';
        if ($current_page >= 2) {
            echo '<span class="page-numbers"><a href="' . $first_page_link . '">首页</a></span>'; // 输出第一页链接
        }

        echo $paginate_links;
        if ($current_page < ($total_pages - 1)) {
            echo '<span class="page-numbers"><a href="' . $last_page_link . '">末页</a></span>'; // 输出最后一页链接
        }

        echo '</div>';
    }
}

function Len_Post_Page_Ajax()
{
    $current_category = get_queried_object();
    global $wp_query;
    if (is_category() && !empty($current_category)) {
        $category_id = $current_category->term_id;
        $category =  $category_id;
    } else {
        $category = '';
    }

    $posts_per_page = get_option('posts_per_page');
    $current_page = max(1, get_query_var('paged'));
    $total_pages = $wp_query->max_num_pages;
    if ($total_pages > 1) {
        echo '<div  class="len-post-ajax-button"><button page="' . $current_page . '" category-id="' . $category . '" showcase="' . $posts_per_page . '" id="len-ajax-post" class="len-post-block-min">加载更多</button></div>';
    }
}

function Len_Post_Page_Tradition_Ajax($catid = '')
{
    if (is_home()) {
        $Home_Module_2 = _len('Home_Module_2');
        if ($Home_Module_2 == 'pagination_1') {
            Len_Post_Page();
        } elseif ($Home_Module_2 == 'pagination_2') {
            Len_Post_Page_Ajax();
        }
    } elseif (is_category()) {
        $Cat_Module_4 = Len_Classify_Module($catid->term_id, 'Cat_Module_4', true);
        $Cat_Module_4 = $Cat_Module_4 ? $Cat_Module_4 : 'Cat_Page_1';
        if ($Cat_Module_4 == 'Cat_Page_1') {
            Len_Post_Page();
        } elseif ($Cat_Module_4 == 'Cat_Page_2') {
            Len_Post_Page_Ajax();
        }
    }
}
