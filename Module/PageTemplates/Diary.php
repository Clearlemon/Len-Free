<?php
function Len_Say_Showcase()
{

    $args = array(
        'post_type' => 'diary',
        'posts_per_page' => -1, // -1 表示显示所有文章，你可以根据需要修改
    );

    $diary_query = new WP_Query($args);
    if ($diary_query->have_posts()) :
        while ($diary_query->have_posts()) : $diary_query->the_post();
            // 在这里输出日记文章的内容，可以调用需要的函数
            Len_say_article();
        endwhile;
        wp_reset_postdata();
    endif;
}


function Len_say_article()
{
    //获取文章ID
    $Post_Id = get_the_ID();
    //获取文章内容
    $Content = Len_Article_Content($excerpt_length = 99999, $Post_Id);
    //获取文章标题
    $Title = get_the_title();
    //获取文章特色图
    $Thumbnail = Len_Thumbnail_Module($Post_Id);
    // 获取文章发布时间
    $Post_Time = Len_Like_Comments_Browse_Time_Module('', '', '', $Post_ID);
    //获取评论数量
    $Post_Comments = Len_Like_Comments_Browse_Time_Module('', $Post_ID, '', '');
    //获取喜欢数量
    $Post_Like = Len_Like_Comments_Browse_Time_Module($Post_ID, '', '', '');
    //获取文章用户ID以及信息
    $Author_ID = get_post_field('post_author', $Post_ID);
    $User = get_user_by('ID', $Author_ID);
    $User_avatar = get_avatar_url($Author_ID);
    $User_name = $User->display_name;
?>
    <div class="say-main">
        <div class="say-author">
            <div class="say-bode">
                <div class="say-information">
                    <img alt="<?php echo $User_name; ?>" src="<?php echo $User_avatar; ?>" class="avatar avatar-96 photo" height="96" width="96" decoding="async">

                    <div class="say-content">
                        <div class="say-information-name"><?php echo $User_name; ?></div>
                        <div class="say-information-time"><?php echo $Post_Time; ?></div>
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
