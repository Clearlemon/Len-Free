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
    $Post_ID = get_the_ID();
    //获取转载网站名称
    $Address =  _Len_Post_Module('', 'Module_Source_Address', '', '', $Post_ID);
    //获取转载作者名
    $Author_Name =  _Len_Post_Module('', 'Module_Source_Author_Name', '', '', $Post_ID);
    //获取转载网站地址
    $Link =  _Len_Post_Module('', 'Module_Source_Link', '', '', $Post_ID);

?>
    <div class="len-source-min">
        <div class="len-source-blcoik">
            <div class="len-source-div">
                <svg class="len-source-post-icon" aria-hidden="true">
                    <use xlink:href="#icon-dian"></use>
                    <li class="len-soure-li">
                        <!-- 获取当前标题 -->
                        来源标题：<?php echo get_the_title($Post_ID); ?>
                    </li>
            </div>
            <div class="len-source-div">
                <svg class="len-source-post-icon" aria-hidden="true">
                    <use xlink:href="#icon-dian"></use>
                    <li class="len-soure-li">
                        <!-- 获取当前链接 -->
                        文章链接：<?php the_permalink(); ?>
                    </li>
            </div>
            <div class="len-source-div">
                <svg class="len-source-post-icon" aria-hidden="true">
                    <use xlink:href="#icon-dian"></use>
                    <li class="len-soure-li">
                        本文章由<?php
                            //如果值为空则输出 '未知网站'
                            if ($Address != '') {
                                echo $Address;
                            } else {
                                echo '未知网站';
                            } ?>创造编写,转载地址是<?php
                                            //如果值为空则输出 '未知作者'
                                            if ($Author_Name != '') {
                                                echo $Author_Name;
                                            } else {
                                                echo '未知作者';
                                            } ?></li>
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


/**
 * 根据条件执行相应的模块函数
 *
 * @param bool $User_Show 是否显示用户模块
 * @param bool $Copyright 是否显示版权模块
 * @param bool $Source 是否显示来源模块
 *
 * @return mixed 根据条件返回相应模块的内容
 */
function Len_Module_Switcher($User_Show = true, $Copyright = true, $Source = true)
{
    // 获取当前文章 ID
    $Post_ID = get_the_ID();

    // 获取相应的元数据键值
    $User_Show_key = _Len_Post_Module('', '', '', 'Module_Switcher_User_Show', $Post_ID);
    $Copyright_key = _Len_Post_Module('', '', '', 'Module_Switcher_Copyright', $Post_ID);
    $Source_key = _Len_Post_Module('', '', '', 'Module_Switcher_Source', $Post_ID);

    // 根据传入的参数，决定执行哪个函数
    if ($User_Show && $User_Show_key) {
        return User_Show_Static_Module();
    } elseif ($Copyright && $Copyright_key) {
        return Len_Modeule_Copyright();
    } elseif ($Source && $Source_key) {
        return Len_Source_Module();
    }
}




function Len_Modeule_Copyright()
{
?> <div class="len-article-copyright">
        <legend class="copyright-title">版权声明</legend>
        <div class="copyright-block">
            <img class="copyright-background-img" src="/wp-content/themes/Len-Free/Assets/Len-Images/user-avatar.jpg" alt="">
            <div class="copyright-min-blcok">
                <div class="copyright-text-min">
                    <p>1.此主题并不是十全十美请勿吹捧</p>
                    <p>2.文章转载需经过作者授权</p>
                    <p>3.文章转载请标注来源地址</p>
                </div>
                <hr>
                <div class="copyright-remind">
                    <p>温习提示：主题不支持商用哦！~</p>
                </div>
            </div>
        </div>
    </div>
<?php
}
/**
 * 获取用户静态模块
 *
 * 通过文章ID获取作者信息，并显示用户头像、名称、简介和文章发布时间。
 * 以及文章的浏览量、评论数量和点赞数量。
 */
function User_Show_Static_Module()
{
    // 获取当前文章ID
    $Post_ID = get_the_ID();

    // 获取文章作者ID
    $Author_ID = get_post_field('post_author', $Post_ID);

    // 获取作者信息
    $User = get_user_by('ID', $Author_ID);
    $User_avatar = get_avatar_url($Author_ID);
    $User_name = $User->display_name;
    $User_description = get_user_meta($Author_ID, 'description', true);

    // 获取文章发布时间
    $Post_Time = Len_Like_Comments_Browse_Time_Module('', '', '', $Post_ID);

    //获取浏览数量
    $Post_Views = Len_Like_Comments_Browse_Time_Module('', '', $Post_ID, '');

    //获取评论数量
    $Post_Comments = Len_Like_Comments_Browse_Time_Module('', $Post_ID, '', '');
    //获取喜欢数量
    $Post_Like = Len_Like_Comments_Browse_Time_Module($Post_ID, '', '', '');
?>
    <div class="len-article-showcase-block">
        <div class="len-article-user-min">
            <div class="len-article-avatar-min">
                <img class="len-article-avatar-block" src="<?php echo $User_avatar ?>" alt="">
            </div>
            <div class="len-article-name-min">
                <p class="len-article-name-blcok"><?php echo $User_name ?></p>
                <p class="len-article-introduce-blcok">『<?php echo $User_description ?>』 </p>
            </div>
        </div>
        <div class="len-article-stats-min">
            <p class="len-article-time-block">
                <svg class="len-stats-post-icon" aria-hidden="true">
                    <use xlink:href="#icon-shijianzhouqi"></use>
                </svg><?php echo $Post_Time ?>
            </p>
            <div class="len-article-stats-all-min">
                <span class="len-stats-browse-block">
                    <svg class="len-stats-post-icon" aria-hidden="true">
                        <use xlink:href="#icon-liulan"></use>
                    </svg><?php echo $Post_Views ?></span>
                <span class="len-stats-comments-block">
                    <svg class="len-stats-post-icon" aria-hidden="true">
                        <use xlink:href="#icon-pinglun"></use>
                    </svg><?php echo $Post_Comments ?></span>
                <span class="len-stats-like-block">
                    <svg class="len-stats-post-icon" aria-hidden="true">
                        <use xlink:href="#icon-xihuan"></use>
                    </svg><?php echo $Post_Like ?></span>
            </div>
        </div>
    </div>
<?php
}


/**
 * 获取文章发布时间的友好显示
 *
 * @param int $post_id 文章ID
 *
 * @return string 时间提示
 */
function Len_Post_Time_Module($Post_id = '')
{
    global $Post;

    // 如果未提供文章ID，则使用当前文章的ID
    if (!$Post_id) {
        $Post_id = $Post->ID;
    }

    // 获取文章的发布时间（以Unix时间戳格式表示）
    $post_time = strtotime(get_the_time('Y-m-d H:i:s', $Post_id));

    // 获取当前时间的时间戳
    $current_time = current_time('timestamp');

    // 计算时间差（单位：秒）
    $diff = abs($current_time - $post_time);

    // 时间差对应的友好提示
    if ($diff < 60) {
        $time = sprintf(_n('%s秒前', '%s秒前', $diff), $diff);
    } elseif ($diff < 3600) {
        $mins = floor($diff / 60);
        $time = sprintf(_n('%s分钟前', '%s分钟前', $mins), $mins);
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        $time = sprintf(_n('%s小时前', '%s小时前', $hours), $hours);
    } elseif ($diff < 2592000) {
        $days = floor($diff / 86400);
        $time = sprintf(_n('%s天前', '%s天前', $days), $days);
    } elseif ($diff < 31536000) {
        $months = floor($diff / 2592000);
        $time = sprintf(_n('%s个月前', '%s个月前', $months), $months);
    } else {
        $years = floor($diff / 31536000);
        $time = sprintf(_n('%s年前', '%s年前', $years), $years);
    }

    return $time;
}

function Len_Like_Comments_Browse_Time_Module($Like = '', $Comments = '', $Browse = '', $Time = '')
{
    // 判断 $Browse 是否有值，如果有则返回对应的内容
    if ($Browse !== '') {
        // 获取文章的点赞次数，如果存在则返回，否则返回 '0'
        return Len_post_views($Browse);
    } elseif ($Comments !== '') {
        // 处理 $Comments 的情况
        // 返回对应的内容或执行其他逻辑
        return get_comments_number($Comments);
    } elseif ($Like !== '') {
        // 处理 $Like 的情况
        // 返回对应的内容或执行其他逻辑
        return get_post_meta($Like, 'bigfa_ding', true) ? get_post_meta($Like, 'bigfa_ding', true) : '0';
    } elseif ($Time !== '') {
        // 处理 $Time 的情况
        // 返回对应的内容或执行其他逻辑
        return Len_Post_Time_Module($Time);
    }

    // 如果没有匹配的情况，返回空字符串
    return '';
}




/**
 * 获取文章浏览次数
 *
 * @param int $post_id 文章ID
 * @return int 浏览次数
 */
function Len_post_views($post_id)
{
    // 定义浏览次数的存储键名
    $count_key = 'views';

    // 从文章的元数据中获取浏览次数
    $count = get_post_meta($post_id, $count_key, true);

    // 如果浏览次数为空，则设置为0，并更新元数据
    if ($count === '') {
        $count = 0;
        update_post_meta($post_id, $count_key, $count);
    }

    // 返回文章的浏览次数
    return $count;
}

/**
 * 设置更新文章的阅读次数
 *
 * @param int $post_id 文章ID
 */
function Set_post_views($post_id)
{
    // 定义浏览次数的存储键名
    $count_key = 'views';

    // 只在单页和文章页面更新阅读次数
    if (is_single() || is_page()) {
        // 获取当前文章的浏览次数
        $count = get_post_meta($post_id, $count_key, true);

        // 如果浏览次数为空，将其设置为0，否则加1
        $count = $count === '' ? 0 : $count + 1;

        // 更新文章的浏览次数元数据
        update_post_meta($post_id, $count_key, $count);
    }
}

// 使用 wp_head 钩子将 set_post_views 函数添加到文章页面头部
add_action('wp_head', 'Set_post_views');


// 注册 AJAX 动作，允许非登录用户调用 bigfa_like 函数
add_action('wp_ajax_nopriv_bigfa_like', 'bigfa_like');

// 注册 AJAX 动作，允许登录用户调用 bigfa_like 函数
add_action('wp_ajax_bigfa_like', 'bigfa_like');

/**
 * 处理点赞的 AJAX 回调函数
 */
function bigfa_like()
{
    global $wpdb, $post;

    // 从前端传递的 POST 数据中获取文章 ID 和操作类型
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];

    // 判断操作类型是否为 'ding'
    if ($action == 'ding') {
        // 获取当前文章的点赞次数
        $bigfa_raters = get_post_meta($id, 'bigfa_ding', true);

        // 设置 Cookie 以避免重复点赞
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // 使 Cookie 在 localhost 上工作
        setcookie('bigfa_ding_' . $id, $id, $expire, '/', $domain, false);

        // 更新点赞次数
        if (!$bigfa_raters || !is_numeric($bigfa_raters)) {
            update_post_meta($id, 'bigfa_ding', 1);
        } else {
            update_post_meta($id, 'bigfa_ding', ($bigfa_raters + 1));
        }

        // 返回更新后的点赞次数
        echo get_post_meta($id, 'bigfa_ding', true);
    }

    // 终止 WordPress 请求处理
    die;
}
