<?php
function Len_Say_Showcase()
{

    $Diary_post_max = _len('Diary_Module_2');

    // 获取当前页数
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;



    // 构建 WP_Query 参数
    $args = array(
        'post_type'      => 'diary', // 假设你要输出的是博客文章，如果是其他类型需要修改
        'posts_per_page' => $Diary_post_max, // 使用后台设置的博客页面至多显示数量
        'paged'          => $paged, // 指定当前页数
    );

    // 查询文章
    $blog_query = new WP_Query($args);

    // 输出文章
    if ($blog_query->have_posts()) :
        while ($blog_query->have_posts()) : $blog_query->the_post();
            // 输出文章内容，例如标题和摘要
            Len_say_article();
        endwhile;

        // 重置查询
        wp_reset_postdata();
    endif;
}


function Len_say_article()
{
    //获取文章ID
    $Post_ID = get_the_ID();
    //获取文章内容
    $Content = Len_Article_Content($excerpt_length = 99999, $Post_ID);
    //获取文章标题
    $Title = get_the_title();
    // 获取文章发布时间
    $Post_Time = Len_Like_Comments_Browse_Time_Module('', '', '', $Post_ID);
    //获取文章用户ID以及信息
    $Author_ID = get_post_field('post_author', $Post_ID);
    $User = get_user_by('ID', $Author_ID);
    $User_avatar = get_avatar_url($Author_ID);
    $User_name = $User->display_name;
?>
    <div class=" say-main">
        <div class="say-author">
            <div class=" foo say-bode">
                <div class="  say-information">
                    <div class="say-body-name-avatar-time">
                        <img alt="<?php echo $User_name; ?>" src="<?php echo $User_avatar; ?>" class="avatar avatar-96 photo" height="96" width="96" decoding="async">

                        <div class="say-content">
                            <div class="say-information-name"><?php echo $User_name; ?></div>
                            <div class="say-information-time"><?php echo $Post_Time; ?></div>
                        </div>
                    </div>

                    <div class="say-title">
                        <h2><?php echo $Title; ?></h2>
                    </div>
                </div>
                <!-- 这个要加一个图片模块 （沪上清柠要求） -->
                <div class="say-substance">
                    <?php echo $Content; ?>
                </div>
            </div>

        </div>
    </div>
<?
}
function Diary_Banner_Module()
{
    $Diary_Module_1 = _len('Diary_Module_1');

?>
    <div class="say">
        <img class="say" src="<?php echo $Diary_Module_1; ?>" alt="">
    </div>
<?php
}
