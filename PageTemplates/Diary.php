<?php
/*
Template Name: Diary【日记】
*/

/**
 * wp_footer(); @引用Wordpress自带的顶部样式文件
 */
wp_head();
?>
<link rel="stylesheet" href="wp-content/themes/Len-Free/Assets/Len-Css/index-say.css">
<body>
    <img class="bady-background-block" src="wp-content/themes/Len-Free/Assets/Len-Images/body-background.jpg" alt="">
    <main class="len-body-main len-body-m">
        <?php
        /**
         * 引用底部样式
         * require_once get_theme_file_path('Page/Len-Block/Header.php');
         * Logo栏目模块样式文件目录
         */
        require_once get_theme_file_path('Page/Len-Block/Header.php');
        ?>

        <div id="len-content" class="len-content">
            <div class="len-content-min">
                <?php
                /**
                 * 引用底部样式
                 * require_once get_theme_file_path('Sidebars/Left-Sidebars.php');
                 * 左侧边栏模块样式文件目录
                 */
                require_once get_theme_file_path('Sidebars/Left-Sidebars.php');
                ?>
                <div class="len-showcase-main">
                    <!-- 文章展示区块Banner开始 -->
                    <div class="len-showcase-banner-nav-blcok">
                        <ul class="banner-nav-ul">
                            <li class="len-banner-nav banner-nav-li">
                                <svg class="len-banner-nav-icon" aria-hidden="true">
                                    <use xlink:href="#icon-mianxingningmeng"></use>
                                </svg>
                                <a class="banner-nav-a-links len-pjax-link-all-blcok" href="">
                                    关于主题</a>
                            </li>
                            <li class="len-banner-nav banner-nav-li">
                                <svg class="len-left-nav-icon" aria-hidden="true">
                                    <use xlink:href="#icon-xieyi"></use>
                                </svg>
                                <a class="banner-nav-a-links len-pjax-link-all-blcok " href="">用户协议</a>
                            </li>
                            <li class="len-banner-nav banner-nav-li">
                                <svg class="len-left-nav-icon" aria-hidden="true">
                                    <use xlink:href="#icon-guanyuwomen"></use>
                                </svg>
                                <a class="banner-nav-a-links len-pjax-link-all-blcok" href="">关于作者</a>
                            </li>
                        </ul>
                    </div>
                    <div class="len-showcase-main">
                    <!-- 全局菜单 -->
                    <div class="len-article-banner-nav-blcok">
                        <div class="len-article-nav-block"><a class="len-article-links-block len-pjax-link-all-blcok"
                                href="">首页</a> </div>
                        <div class="len-article-nav-block"><a class="len-article-links-block len-pjax-link-all-blcok"
                                href="">分类</a> </div>
                        <div class="len-article-block">Lemon ———— 极简的双边栏主题</div>
                    </div>
                    <!-- 说说开始 -->
                    <div class="say">
                        <img class="say" src="../Images/say.jpg" alt="" class="img-night" style="">
                    </div>

                    <div class="say-main">
                        <div class="say-author">
                            <div class="say-bode">
                                <div class="say-information">
                                    <img alt=""
                                        src="https://q.qlogo.cn/headimg_dl?dst_uin=1992890443&amp;spec=640"
                                        srcset="https://q.qlogo.cn/headimg_dl?dst_uin=1992890443&amp;spec=640 2x"
                                        class="avatar avatar-96 photo" height="96" width="96" decoding="async">

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
                    <!-- 说说结束 -->
                    <!-- 文章展示模块开始 -->
                    <div class="len-showcase-post-block-main">
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

                        <div class="len-post-block">
                            <div class="len-post-thumbnail-blcok">
                                <img class="thumbnail-background-min" src="wp-content/themes/Len-Free/Assets/Len-Images/post-background-2.png" alt="">
                                <div class="len-classify-box-blcok">
                                    <p class="len-classify-title-blcok">其他</p>
                                </div>
                                <div></div>
                            </div>
                            <div class="len-post-content-block">
                                <div class="len-post-content-min">
                                    <h3 class="len-post-title-block">Lemon pro ———— 您好！世界</h3>
                                    <hr>
                                    <p class="len-post-part-block">
                                        主题相对于free版本的主题来说增加了不少的功能，丰富了后台的编辑器，增加了多处的pjax刷新地方，增加了多种文章展示样式，增加了部分页面....
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
                                                </svg>10天前
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="len-post-block">
                            <a class="len-links-post len-pjax-link-all-blcok" href="Post/post-1.html">
                                <div class="len-post-thumbnail-blcok">
                                    <img class="thumbnail-background-min" src="wp-content/themes/Len-Free/Assets/Len-Images/post-background-3.jpg" alt="">
                                </div>
                            </a>
                            <div class="len-post-content-block">
                                <div class="len-post-content-min">
                                    <h3 class="len-post-title-block">主题功能介绍</h3>
                                    <hr>
                                    <p class="len-post-part-block">
                                        别看着主题简洁其实有着不少的功能呢！
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
                                                </svg>15天前
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- 文章展示模块结束 -->
                </div>



                <?php
                /**
                 * 引用右侧边栏样式
                 * require_once get_theme_file_path('Sidebars/Right-Sidebars.php');
                 * 右侧边栏模块样式文件目录
                 */
                require_once get_theme_file_path('Sidebars/Right-Sidebars.php');
                ?>
            </div>
        </div>
        </div>
        <?php
        /**
         * 引用底部样式
         * require_once get_theme_file_path('Page/Len-Block/Footer.php');
         * 底部模块样式文件目录
         */
        require_once get_theme_file_path('Page/Len-Block/Footer.php');


        /**
         * wp_footer(); @引用Wordpress自带的底部样式文件
         */
        wp_footer();
        ?>

    </main>

</body>