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
                    <!-- 文章展示区块Banner结束 -->
                    <!-- 幻灯片区块开始 -->
                    <div class="len-swiper-block-min">
                        <div id="len-swiper" class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="len-swiper-slide-img" src="wp-content/themes/Len-Free/Assets/Len-Images/post-background-1.png" alt="">
                                    <div class="len-swiper-content-background">
                                        <h3>这是标题</h3>
                                        <p>这是内容</p>
                                    </div>
                                </div>
                                <div class="swiper-slide"><img class="len-swiper-slide-img" src="/wp-content/themes/Len-Free/Assets/Len-Images/post-background-2.png" alt=""></div>
                                <div class="swiper-slide"><img class="len-swiper-slide-img" src="/wp-content/themes/Len-Free/Assets/Len-Images/post-background-3.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <!-- 幻灯片区块结束 -->
                    <!-- 文章展示模块开始 -->
                    <div class="len-showcase-post-block-main">


                        <?php Len_Article_Showcase(); ?>

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
        ?>
    </main>
</body>