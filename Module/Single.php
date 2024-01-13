<?php

/**
 * 文章详情页模块函数
 * 2024/1/13/0:17
 * 作者：青桔
 */

/**
 * 文章转载功能函数模块
 * 
 * 这个函数获取转载文章的值并判断输出结果
 * 
 * @param string $Address            要获取的 '_Len_Post_Module('', 'Module_Source_Address', '', '');' 中的键。
 * @param string $Author_Name        要获取的 '_Len_Post_Module('', 'Module_Source_Author_Name', '', '');' 中的键。
 * @param string $Link               要获取的 '_Len_Post_Module('', 'Module_Source_Link', '', '');' 中的键。
 * @param mixed  $default            如果未找到对应值时返回的默认值。
 * @return mixed 返回获取到的元数据值或默认值。
 */
function Len_Source_Module()
{
    //获取值
    //获取转载网站名称
    $Address =  _Len_Post_Module('', 'Module_Source_Address', '', '');
    //获取转载作者名
    $Author_Name =  _Len_Post_Module('', 'Module_Source_Author_Name', '', '');
    //获取转载网站地址
    $Link =  _Len_Post_Module('', 'Module_Source_Link', '', '');
?>
    <div class="len-source-min">
        <div class="len-source-blcoik">
            <div class="len-source-div">
                <svg class="len-source-post-icon" aria-hidden="true">
                    <use xlink:href="#icon-dian"></use>
                    <li class="len-soure-li">
                        本文章转载地址<?php
                                //如果值为空则输出 '未知网站'
                                if ($Address != '') {
                                    echo $Address;
                                } else {
                                    echo '未知网站';
                                } ?>,是由<?php
                                        //如果值为空则输出 '未知作者'
                                        if ($Author_Name != '') {
                                            echo $Author_Name;
                                        } else {
                                            echo '未知作者';
                                        } ?>创造编写</li>
            </div>
            <div class="len-source-div">
                <svg class="len-source-post-icon" aria-hidden="true">
                    <use xlink:href="#icon-dian"></use>
                    <li class="len-soure-li">
                        来源地址：<?php
                                //如果值为空则输出 '未知网址'
                                if ($Link != '') {
                                    echo $Link;
                                } else {
                                    echo '未知网址';
                                } ?></li>
            </div>
        </div>
    </div>
<?php
}


/**
 * 获取文章缩略图 URL
 *
 * @param int $post_id 文章 ID
 *
 * @return string 缩略图 URL
 */
function Len_Thumbnail_Module($post_id = '')
{
    // 初始化缩略图变量
    $Thumbnail = '';

    // 获取 Len_Backlinks_Thumbnail 数据
    $Len_Backlinks_Thumbnail = get_post_meta($post_id, 'Len_Post_Module_Thumbnail_Sidebars', true);

    // 尝试反序列化 Len_Backlinks_Thumbnail，如果是字符串
    if (is_string($Len_Backlinks_Thumbnail)) {
        $Len_Backlinks_Thumbnail = unserialize($Len_Backlinks_Thumbnail);
    }

    // 获取 Len_Backlinks_thumbnail，如果存在
    $Len_Backlinks_thumbnail = isset($Len_Backlinks_Thumbnail['Len_Backlinks_Thumbnail']) ? $Len_Backlinks_Thumbnail['Len_Backlinks_Thumbnail'] : '';

    // 如果 Len_Backlinks_thumbnail 存在，赋值给 $Thumbnail
    if ($Len_Backlinks_thumbnail) {
        $Thumbnail = $Len_Backlinks_thumbnail;
    } else {
        // 获取文章内容
        $post_content = get_post_field('post_content', $post_id);

        // 使用正则表达式匹配文章内容中的第一个 img 标签的 src 属性
        preg_match('/<img[^>]*src=["\']([^"\']+)["\'][^>]*>/', $post_content, $matches);

        // 如果匹配到 img 标签，提取图片的 URL 赋值给 $Thumbnail
        if (!empty($matches)) {
            $Thumbnail = $matches[1];
        }

        // 如果文章内容中没有图片，则获取特色图片
        if (!$Thumbnail) {
            $thumbnail_id = get_post_thumbnail_id($post_id);
            if ($thumbnail_id) {
                $Thumbnail = wp_get_attachment_url($thumbnail_id);
            }
        }
    }

    // 如果最终没有获取到缩略图 URL，则返回默认 URL
    if (!$Thumbnail) {
        return '/wp-content/themes/Len-Free/Assets/Len-Images/post-background-1.png';
    }

    // 返回缩略图 URL
    return $Thumbnail;
}


function Len_Module_Switcher()
{
    $User_Show = _Len_Post_Module('', '', '', 'Module_Switcher_User_Show');
    $Copyright = _Len_Post_Module('', '', '', 'Module_Switcher_Copyright');
    $Source = _Len_Post_Module('', '', '', 'Module_Switcher_Source');

    if ($User_Show = true) {
        echo '                                <div class="len-article-showcase-block">
        <div class="len-article-user-min">
            <div class="len-article-avatar-min">
                <img class="len-article-avatar-block" src="/wp-content/themes/Len-Free/Assets/Len-Images/user-avatar.jpg" alt="">
            </div>
            <div class="len-article-name-min">
                <p class="len-article-name-blcok">青桔柠檬</p>
                <p class="len-article-introduce-blcok">『青桔柠檬，一个长在树上酸酸的柠檬』 </p>
            </div>
        </div>
        <div class="len-article-stats-min">
            <p class="len-article-time-block">
                <svg class="len-stats-post-icon" aria-hidden="true">
                    <use xlink:href="#icon-shijianzhouqi"></use>
                </svg>8天前
            </p>
            <div class="len-article-stats-all-min">
                <span class="len-stats-browse-block">
                    <svg class="len-stats-post-icon" aria-hidden="true">
                        <use xlink:href="#icon-liulan"></use>
                    </svg>64</span>
                <span class="len-stats-comments-block">
                    <svg class="len-stats-post-icon" aria-hidden="true">
                        <use xlink:href="#icon-pinglun"></use>
                    </svg>12</span>
                <span class="len-stats-like-block">
                    <svg class="len-stats-post-icon" aria-hidden="true">
                        <use xlink:href="#icon-xihuan"></use>
                    </svg>30</span>
            </div>
        </div>
    </div>';
    } elseif ($Copyright = true) {
    } elseif ($Copyright = true) {
    }
}
