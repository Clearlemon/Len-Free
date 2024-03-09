<?php
function Len_Say_Showcase()
{
    if (is_page()) {
        $args = array(
            'post_type' => 'say', // 限制文章类型为 "say"
            'posts_per_page' => 1,
        );
        $sticky_posts = new WP_Query($args);

        while ($sticky_posts->have_posts()) : $sticky_posts->the_post();
            Len_say_article();
        endwhile;
        wp_reset_query();
    }
    //普通文章输出
    while (have_posts()) {
        the_post();
        Len_say_article();
    }
}


function Len_say_article()
{
?>
    <div class="say-main">
        <div class="say-author">
            <div class="say-bode">
                <div class="say-information">
                    <img alt="" src="https://q.qlogo.cn/headimg_dl?dst_uin=1992890443&amp;spec=640" srcset="https://q.qlogo.cn/headimg_dl?dst_uin=1992890443&amp;spec=640 2x" class="avatar avatar-96 photo" height="96" width="96" decoding="async">

                    <div class="say-content">
                        <div class="say-information-name">大绵羊</div>
                        <div class="say-information-time">2024年1月13日 00:10</div>
                    </div>
                </div>
                <div class="say-substance">
                    青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕青桔柠檬 咕咕咕
                </div>
            </div>

        </div>
    </div>
<?
}
