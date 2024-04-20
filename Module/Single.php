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
 * @param string $Address            要获取的 '_Len_Post_Module('', 'Module_Source_Address', '','','', '');' 中的键。
 * @param string $Author_Name        要获取的 '_Len_Post_Module('', 'Module_Source_Author_Name', '','','', '');' 中的键。
 * @param string $Link               要获取的 '_Len_Post_Module('', 'Module_Source_Link', '','','', '');' 中的键。
 * @param mixed  $default            如果未找到对应值时返回的默认值。
 * @return mixed 返回获取到的元数据值或默认值。
 */
function Len_Source_Module()
{
    //获取值
    $Post_ID = get_the_ID();
    //获取转载网站名称
    $Address =  _Len_Post_Module('', 'Module_Source_Address', '', '', '', $Post_ID);
    //获取转载作者名
    $Author_Name =  _Len_Post_Module('', 'Module_Source_Author_Name', '', '', '', $Post_ID);
    //获取转载网站地址
    $Link =  _Len_Post_Module('', 'Module_Source_Link', '', '', '', $Post_ID);

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
                        本文章转载作者是<?php
                                //如果值为空则输出 '未知作者'
                                if ($Address != '') {
                                    echo $Address;
                                } else {
                                    echo '未知作者';
                                } ?>,转载网站名为<?php
                                            //如果值为空则输出 '未知名称'
                                            if ($Author_Name != '') {
                                                echo $Author_Name;
                                            } else {
                                                echo '未知名称';
                                            } ?>。</li>
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
        $Home_Module_4_1 = _len('Home_Module_4_1');
        $Home_Module_4 = _len('Home_Module_4');
        if ($Home_Module_4_1 == 'featured_1' && $Home_Module_4 == true) {
            $Thumbnail_Module = _len('Home_Module_4_2');
            $Thumbnail_lot = '';
            $Thumbnail_list = '';
            if (strpos($Thumbnail_Module, ',') !== false) {
                // 包含逗号，表示是多个值
                $Thumbnail_lot = explode(',', $Thumbnail_Module);
                // 随机选择一个索引
                $random_index = array_rand($Thumbnail_lot);
                // 获取随机选择的元素
                $random_thumbnail = $Thumbnail_lot[$random_index];
                // 输出随机选择的图片链接
                $Thumbnail_lot_str = wp_get_attachment_url($random_thumbnail, 'full');
            } else {
                // 不包含逗号，表示是单个值
                $Thumbnail_list = $Thumbnail_Module;
            }

            return $Thumbnail_lot_str . $Thumbnail_list;
        } elseif ($Home_Module_4_1 == 'featured_2' && $Home_Module_4 == true) {
            $Thumbnail_API = _len('Home_Module_4_3');
            return $Thumbnail_API;
        }
    }


    // 返回缩略图 URL
    return $Thumbnail;
}

/**
 * 生成图片标签。
 *
 * @param array $args 包含图片属性的关联数组，必须包含 'src'、'alt' 和 'data-src' 属性。
 * @return string 返回生成的图片标签。
 */
function Len_Get_Img($args)
{
    // 检查参数是否设置
    if (isset($args['src']) && isset($args['alt']) && isset($args['data-src'])) {
        // 根据参数生成 img 标签
        $img_tag = '<img  src="' . $args['src'] . '" data-src="' . $args['data-src'] . '"';

        // 检查 class 是否设置
        if (isset($args['class']) && is_array($args['class'])) {
            $class_str = implode(' ', $args['class']);
            $img_tag .= ' class="' . $class_str . '"';
        }

        if (isset($args['id'])) {
            $img_tag .= ' id="' . $args['id'] . '"';
        }
        // 添加 alt 属性
        $img_tag .= ' alt="' . $args['alt'] . '" />';

        // 返回生成的 img 标签
        return $img_tag;
    } else {
        // 如果缺少必要参数，返回空字符串
        return '';
    }
}

function Len_Lazy_Thumbnail()
{
    $Home_Module_5 = _len('Home_Module_5');
    $Home_Module_5_1 = _len('Home_Module_5_1');
    $default = get_template_directory_uri() . '/Assets/Len-Images/lazy.gif';
    if ($Home_Module_5 == true && !empty($Home_Module_5_1)) {
        return $Home_Module_5_1;
    } else {
        return $default;
    }
}


/**
 * 根据条件动态生成音乐播放器
 *
 * 根据指定条件动态生成音乐播放器，支持根据是否存在特定模块来决定显示的音乐列表。
 * 如果指定条件为真，则输出指定模块的音乐信息，否则输出另一组音乐信息。
 *
 * @return void
 */
function Len_Modeule_Music_Js()
{
    // 获取音乐模块状态
    $Music_Module_All = _len('Music_Module_All');

    // 如果音乐模块状态为假
    if ($Music_Module_All == false) {
        // 获取当前文章 ID
        $Post_ID = get_the_ID();

        // 获取当前文章的音乐信息
        $Module_Music_1 = _Len_Post_Module('', '', '', '', 'Module_Music_Post_1', $Post_ID);
        $Module_Music_2 = _Len_Post_Module('', '', '', '', 'Module_Music_Post_2', $Post_ID);
        $Module_Music_3 = _Len_Post_Module('', '', '', '', 'Module_Music_Post_3', $Post_ID);
        $Module_Music_4 = _Len_Post_Module('', '', '', '', 'Module_Music_Post_4', $Post_ID);
        $Module_Music_5 = _Len_Post_Module('', '', '', '', 'Module_Music_Post_5', $Post_ID);
    ?>
        <script type="text/javascript">
            // 创建音乐播放器实例
            const ap = new APlayer({
                container: document.getElementById('aplayer'),
                audio: [{
                    name: '<?php echo $Module_Music_1; ?>',
                    artist: '<?php echo $Module_Music_2; ?>',
                    url: '<?php echo $Module_Music_3; ?>',
                    cover: '<?php echo $Module_Music_4; ?>',
                    lrc: '<?php echo $Module_Music_5; ?>',
                }]
            });
        </script>
    <?php
    } else {
        // 获取另一组音乐信息
        $Module_Music_All_1 = _len('Module_Music_Post_All_1');
        $Module_Music_All_2 = _len('Module_Music_Post_All_2');
        $Module_Music_All_3 = _len('Module_Music_Post_All_3');
        $Module_Music_All_4 = _len('Module_Music_Post_All_4');
        $Module_Music_All_5 = _len('Module_Music_Post_All_5');
    ?>
        <script type="text/javascript">
            // 创建音乐播放器实例
            const ap = new APlayer({
                container: document.getElementById('aplayer'),
                audio: [{
                    name: '<?php echo $Module_Music_All_1; ?>',
                    artist: '<?php echo $Module_Music_All_2; ?>',
                    url: '<?php echo $Module_Music_All_3; ?>',
                    cover: '<?php echo $Module_Music_All_4; ?>',
                    lrc: '<?php echo $Module_Music_All_5; ?>',
                }]
            });
        </script>
    <?php
    }
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
function Len_Module_Switcher($User_Show = true, $Copyright = true, $Source = true, $Music = true, $Music_Js = true, $Comments = true)
{
    // 获取当前文章 ID
    $Post_ID = get_the_ID();

    $Post_Content_Show_Module = _len('Post_Content_Show_Module_1');
    $Global_User_Show = _len('Post_Content_Show_Module_1_1'); // 这里获取的是同一个模块
    $Global_Copyright = _len('Post_Content_Show_Module_1_1'); // 这里获取的是同一个模块
    $Global_Source = _len('Post_Content_Show_Module_1_1'); // 这里获取的是同一个模块
    $Global_Music = _len('Post_Content_Show_Module_1_1'); // 这里获取的是同一个模块
    $Global_Comments = _len('Post_Content_Show_Module_1_1'); // 这里获取的是同一个模块

    // 获取相应的元数据键值
    $User_Show_key = _Len_Post_Module('', '', '', 'Module_Switcher_User_Show', '', $Post_ID);
    $Copyright_key = _Len_Post_Module('', '', '', 'Module_Switcher_Copyright', '', $Post_ID);
    $Source_key = _Len_Post_Module('', '', '', 'Module_Switcher_Source', '', $Post_ID);
    $Music_key = _Len_Post_Module('', '', '', 'Module_Switcher_Music', '', $Post_ID);
    $Comments_key = _Len_Post_Module('', '', '', 'Module_Switcher_Comments', '', $Post_ID);

    // 根据传入的参数，决定执行哪个函数
    if ($Post_Content_Show_Module == true && isset($Global_User_Show) && in_array('user', $Global_User_Show) && $User_Show && $User_Show_key) {
        return User_Show_Static_Module();
    } elseif ($Post_Content_Show_Module == true && isset($Global_Copyright) && in_array('copyright', $Global_Copyright) && $Copyright && $Copyright_key) {
        return Len_Modeule_Copyright();
    } elseif ($Post_Content_Show_Module == true && isset($Global_Source) && in_array('source', $Global_Source) && $Source && $Source_key) {
        return Len_Source_Module();
    } elseif ($Post_Content_Show_Module == true && isset($Global_Music) && in_array('music', $Global_Music) && $Music && $Music_key) {
        return Len_Modeule_Music();
    } elseif ($Post_Content_Show_Module == true && isset($Global_Music) && in_array('music', $Global_Music) && $Music_Js && $Music_key) {
        return Len_Modeule_Music_Js();
    } elseif ($Post_Content_Show_Module == true && isset($Global_Comments) && in_array('comments', $Global_Comments) && $Comments && $Comments_key) {
        if (comments_open()) {
            return  comments_template();
        }
    }
}

/**
 * Len_Modeule_Music 函数用于生成底部播放器模块的 HTML 结构。
 *
 * 最终将生成的 HTML 结构输出到页面上。
 */
function Len_Modeule_Music()
{
    echo '<div id="aplayer"></div>';
}




/**
 * Len_Modeule_Copyright 函数用于生成版权声明模块的 HTML 结构。
 *
 * 该函数首先获取版权声明模块的背景图片路径、文本内容部分1和文本内容部分2。
 * 然后，根据获取到的内容，生成版权声明模块的 HTML 结构，包括背景图片、文本内容部分1和文本内容部分2。
 * 最终将生成的 HTML 结构输出到页面上。
 */
function Len_Modeule_Copyright()
{
    // 获取版权声明模块的背景图片路径
    $Img = _len('Post_Copyright_Module_1');

    // 获取版权声明的文本内容部分1
    $Text_1 = _len('Post_Copyright_Module_2');

    // 获取版权声明的文本内容部分2
    $Text_2 = _len('Post_Copyright_Module_3');
    ?>

    <!-- 版权声明模块的HTML结构开始 -->
    <div class="len-article-copyright">
        <legend class="copyright-title">版权声明</legend>

        <div class="copyright-block">
            <!-- 版权声明模块的背景图片 -->
            <img class="copyright-background-img" src="<?php echo $Img; ?>" alt="">

            <div class="copyright-min-blcok">
                <!-- 版权声明文本内容部分1 -->
                <div class="copyright-text-min">
                    <?php echo $Text_1; ?>
                </div>

                <hr>

                <!-- 版权声明文本内容部分2 -->
                <div class="copyright-remind">
                    <?php echo $Text_2; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- 版权声明模块的HTML结构结束 -->
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
                    </svg><?php echo Len_post_views($Post_ID); ?></span>
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

/**
 * Len_Like_Comments_Browse_Time_Module 函数用于根据传入的参数获取相应的内容。
 *
 * @param string $Like     点赞相关参数。
 * @param string $Comments 评论相关参数。
 * @param string $Browse   浏览相关参数。
 * @param string $Time     时间相关参数。
 *
 * @return string 返回根据参数获取的内容，如果没有匹配的情况，返回空字符串。
 */
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
 * Len_Post_Above_Next 函数用于获取当前文章的上一篇和下一篇相关内容。
 *
 * @return void
 */
function Len_Post_Above_Next_Module()
{
    /*
     * 获取当前文章的ID
     *
     * @var int
     */
    $post_id = get_the_ID();

    /*
     * 获取上一篇和下一篇文章的ID
     *
     * @var WP_Post|null $previous_post 上一篇文章对象。
     * @var WP_Post|null $next_post     下一篇文章对象。
     */
    $previous_post = get_previous_post();
    $next_post = get_next_post();

    /*
     * 初始化 $previous_post_Above_class 和 $previous_post_Next_class 变量
     *
     * @var string $previous_post_Above_class 包含上一篇文章类的字符串。
     * @var string $previous_post_Next_class  包含下一篇文章类的字符串。
     */
    $previous_post_Above_class = '';
    $previous_post_Next_class = '';

    /*
     * 进行上一篇或者下一篇来判断
     */
    if (!empty($previous_post)) {
        $previous_post_id = $previous_post->ID;
        $previous_post_Above_class = "Above_post"; // 如果有上一篇，添加 Above_post 类
    }

    if (!empty($next_post)) {
        $next_post_id = $next_post->ID;
        $previous_post_Next_class = "Next_post"; // 如果有下一篇，添加 Next_post 类
    }

    /*
     * 判断是否存在上一篇或下一篇文章
     */
    if ($previous_post || $next_post) {
        // 输出 HTML 结构
        echo '<div class="len-arrow-post-block-min ">
        <div class="len-arrow-blcok-flex ' . $previous_post_Above_class . $previous_post_Next_class . '"> ';

        // 如果上一篇有文章的话则输出这些HTML，如果没有则不会输出相关内容
        if ($previous_post) {
            echo '<div class="len-arrow-above-post positioning-right">
            <a href="' . get_permalink($previous_post->ID) . '">
                <img class="above-post-background" src="' . Len_Thumbnail_Module($previous_post_id) . '" alt="">
                <div class="arrow-text-blcok-right">
                    <span>
                        <svg class="len-arrow-icon" aria-hidden="true">
                            <use xlink:href="#icon-arrow_left"></use>
                        </svg>上一篇</span>
                    <p>【' . $previous_post->post_title . '】</p>
                </div>
            </a>
        </div>';
        }

        // 如果下一篇有文章的话则输出这些HTML，如果没有则不会输出相关内容
        if ($next_post) {
            echo '<div class="len-arrow-under-post positioning-left">
            <a href="' . get_permalink($next_post->ID) . '">
                <img class="under-post-background" src="' . Len_Thumbnail_Module($next_post_id) . '" alt="">
                <div class="arrow-text-blcok-left">
                    <span>
                        下一篇
                        <svg class="len-arrow-icon" aria-hidden="true">
                            <use xlink:href="#icon-arrow_right"></use>
                        </svg>
                    </span>
                    <p>【' . $next_post->post_title . '】</p>
                </div>
            </a>
        </div>';
        }

        echo '</div></div>';
    }
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
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        $count = '0';
    }

    // 返回文章的浏览次数
    echo number_format_i18n($count);
}

/**
 * 设置更新文章的阅读次数
 *
 * @param int $post_id 文章ID
 */
function Set_post_views($post_id)
{
    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);

    if (is_single() || is_page()) {

        if ($count == '') {
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
        } else {
            update_post_meta($post_id, $count_key, $count + 1);
        }
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


/**
 * Len_Post_Tag function.
 *
 * 输出当前文章的标签列表，包括标签名称和链接。
 */
function Len_Post_Tag_Module()
{
    // 获取当前文章的标签列表
    $tags = get_the_tags();

    // 检查是否存在标签
    if ($tags) {
        // 遍历每个标签
        foreach ($tags as $tag) {
            // 输出每个标签的名称和链接
            echo '<a class="len-link-all" href="' . esc_url(get_tag_link($tag->term_id)) . '"><li class="article-tag-li">' . esc_html($tag->name) . '</li></a>';
        }
    }
}


/**
 * Len_parent_category function.
 *
 * 输出当前文章的主要（顶级）分类名称和链接。
 *
 * @param int $Post_ID 文章ID，默认为空，使用当前文章的ID。
 */
function Len_Parent_Category_Module($Post_ID = '', $Index = true, $Nav = true, $Post = true)
{
    // 获取当前文章的分类列表
    $categories = get_the_category($Post_ID);

    if ($categories) {
        // 存储已输出的父级分类的 ID
        $printed_parents = array();
        // 存储所有父级分类的名称和链接
        $parent_categories_html = '';

        foreach ($categories as $category) {
            if ($category->parent === 0) { // 检查是否为父级分类
                if (!in_array($category->term_id, $printed_parents)) {
                    // 获取父级分类的名称和链接
                    $category_name = $category->name;
                    $category_link = get_category_link($category->term_id);
                    // 添加到输出内容中
                    $parent_categories_html .= '<a class="len-link-all" href="' . esc_url($category_link) . '">' . esc_html($category_name) . '</a> | ';
                    // 将父级分类的 ID 添加到已输出数组中
                    $printed_parents[] = $category->term_id;
                }
            } else {
                // 获取当前分类的所有父级分类
                $parent_categories = get_ancestors($category->term_id, 'category');
                // 如果有父级分类
                if ($parent_categories) {
                    // 获取所有父级分类的名称和链接
                    foreach (array_reverse($parent_categories) as $parent_category_id) {
                        if (!in_array($parent_category_id, $printed_parents)) {
                            $parent_category = get_category($parent_category_id);
                            $category_name = $parent_category->name;
                            $category_link = get_category_link($parent_category->term_id);
                            // 添加到输出内容中
                            $parent_categories_html .= '<a class="len-link-all" href="' . esc_url($category_link) . '">' . esc_html($category_name) . '</a> | ';
                            // 将父级分类的 ID 添加到已输出数组中
                            $printed_parents[] = $parent_category_id;
                        }
                    }
                }
            }
        }

        // 去除最后一个分隔符
        $parent_categories_html = rtrim($parent_categories_html, ' | ');

        // 根据条件输出
        if ($Post) {
            if ($parent_categories_html) {
                echo '<div class="article-parent-classification"><span>' . $parent_categories_html . '</span></div>';
            }
        } elseif ($Nav) {
            if ($parent_categories_html) {
                echo $parent_categories_html;
            }
        } elseif ($Index) {
            if ($categories) {
                $parent_categories_output = array();
                foreach ($categories as $category) {
                    if ($category->parent === 0) {
                        $parent_categories_output[] = $category->name;
                        break;
                    }
                }
                $category_output = implode('|', $parent_categories_output);
                echo $category_output;
            }
        }
    }
}






add_filter('pre_option_link_manager_enabled', '__return_true');

// 通过过滤器修改链接管理菜单名称
function Len_modify_link_manager_name($name)
{
    return '友情链接';
}

add_filter('admin_menu', 'Len_modify_link_manager_menu');

// 修改链接管理菜单
function Len_modify_link_manager_menu()
{
    global $menu;

    // 遍历菜单项，找到原始的“链接”菜单
    foreach ($menu as $key => $value) {
        if ($value[0] == '链接') {
            // 将原始的“链接”菜单名称修改为“友情链接”
            $menu[$key][0] = '友情链接';
            break;
        }
    }
}


function Len_Mutaual_Module($wx = true, $zfb = true)
{
    $Wx_Qr = _len('Post_Pay_Img_Module_2');
    $Zfb_Qr = _len('Post_Pay_Img_Module_1');

    if ($wx === true) {
        return $Wx_Qr;
    } elseif ($zfb === true) {
        return $Zfb_Qr;
    }
}

function Len_Post_Bread_Navigation_Module()
{
    // 获取当前文章的分类信息
    $categories = get_the_category();

    // 遍历分类信息

    $home_url = home_url();

    // 输出链接


?>
    <div class="len-article-banner-nav-blcok">
        <div class="len-article-nav-block"><a href="<?php echo esc_url($home_url); ?>" class="len-article-links-block len-pjax-link-all-blcok" href="">首页</a> </div>
        <div class="len-article-nav-block"><?php echo Len_Parent_Category_Module(get_the_ID(), false, true, false); ?></div>
        <div class="len-article-block"><?php the_title(); ?></div>
    </div><?php
        }
