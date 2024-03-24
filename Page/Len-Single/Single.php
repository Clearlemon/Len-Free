<body>
    <img class="bady-background-block" src="/wp-content/themes/Len-Free/Assets/Len-Images/body-background.jpg" alt="">
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
                ?> <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="len-showcase-main">
                            <!-- 文章展示模块开始 -->
                            <?php Len_Post_Bread_Navigation_Module() ?>
                            <div class="len-article-min-blcok">
                                <div class="len-article-thumbnail-block-min">
                                    <?php
                                    echo Len_Get_Img(array('src' => Len_Lazy_Thumbnail(), 'alt' => get_the_title(), 'data-src' => Len_Thumbnail_Module(get_the_ID()), 'class' => array('len-thumbnail-block', 'lazy'), 'id' => '',));
                                    ?>
                                </div>
                                <div class="len-article-block-min">
                                    <div class="len-article-showcase-main">
                                        <div class="len-article-title-min">
                                            <h1 class="len-article-title-block"><?php the_title(); ?></h1>
                                            <?php echo Len_Parent_Category_Module(get_the_ID(), false, false, true) ?>
                                        </div>
                                        <?php Len_Module_Switcher(true, false, false, false, false, false); ?>
                                        <div class="len-article-showcase-content">

                                            <?php the_content(); ?>

                                        </div>

                                        <?php Len_Module_Switcher(false, true, false, false, false, false); ?>
                                        <div class="len-article-tag">
                                            <svg class="len-tag-post-icon" aria-hidden="true">
                                                <use xlink:href="#icon-biaoqian1"></use>标签
                                                <ul class="article-tag-ul-blcok">
                                                    <?php Len_Post_Tag_Module(); ?>
                                                </ul>
                                            </svg>
                                        </div>
                                        <?php Len_Module_Switcher(false, false, true, false, false, false); ?>
                                    </div>

                                </div>
                            </div>

                    <?php
                            Len_Module_Switcher(false, false, false, true, false, false);
                        endwhile;
                    endif; ?>
                    <!-- 互动模块开始 -->
                    <div class="len-article-mutual-min">
                        <div class="len-article-mutual-blcok">
                            <div class="len-mutaual-block">
                                <div class="len-article-humbs-up">
                                    <svg class="len-post-mutual-icon" aria-hidden="true">
                                        <use xlink:href="#icon-dianzan"></use>
                                    </svg>
                                    <a href="javascript:;" rel="external nofollow" target="_self" rel="external nofollow" target="_blank" data-action="ding" data-id="<?php the_ID(); ?>" class="favorite<?php if (isset($_COOKIE['bigfa_ding_' . $post->ID])) echo ' done'; ?>"><span class="count">
                                            <?php echo Len_Like_Comments_Browse_Time_Module(get_the_ID(), '', '', '') ?>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="len-mutaual-block">
                                <div class="len-article-tipping">
                                    <svg class="len-post-mutual-icon" aria-hidden="true">
                                        <use xlink:href="#icon-toubi"></use>
                                    </svg>
                                    <p class="len-post-mutal-text">打赏</p>
                                </div>
                            </div>
                            <div class="len-mutaual-block">
                                <div class="len-article-share">
                                    <svg class="len-post-mutual-icon" aria-hidden="true">
                                        <use xlink:href="#icon-fenxiang"></use>
                                    </svg>
                                    <p class="len-post-mutal-text">分享</p>
                                </div>
                            </div>
                        </div>
                        <div class="len-al-wx-pay" style="display: none;">
                            <div class="len-pay-blcok-header">
                                <header class="len-post-pay-header">
                                    <div class="pay-title">
                                        <p class="pay-title-text">施舍一下我吧~</p>
                                    </div>
                                    <div class="pay-open-icon"></div>
                                    <svg class="len-pay-open-icon len-pay-open" aria-hidden="true">
                                        <use xlink:href="#icon-cuowu"></use>
                                    </svg>
                                </header>
                            </div>
                            <div class="wx-alpay-qr">
                                <img class="pay-qr-img" style="display: block;" src="<?php echo Len_Mutaual_Module(false, true) ?>" alt="">
                                <img class="pay-qr-img" style="display: none;" src="<?php echo Len_Mutaual_Module(true, false) ?>" alt="">
                            </div>
                            <div class="pay-choose">
                                <div class="pay-choose-link " onclick="togglePayment('alipay')">
                                    <img class="pay-choose-img" src="/wp-content/themes/Len-Free/Assets/Len-Images/alipay.png" alt="">
                                </div>
                                <div class="pay-choose-link" onclick="togglePayment('wechat')">
                                    <img class="pay-choose-img" src="/wp-content/themes/Len-Free/Assets/Len-Images/wechat.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="len-share-blcok" style="display: none;">
                            <div class="share-blcok-min">
                                <svg class="len-share-open-icon len-share-open" aria-hidden="true">
                                    <use xlink:href="#icon-cuowu"></use>
                                </svg>
                                <div class="share-block-all-svg">
                                    <div class="share-svg-block">
                                        <svg class="len-share-icon" aria-hidden="true">
                                            <use xlink:href="#icon-QQ"></use>
                                        </svg>
                                    </div>
                                    <div class="share-svg-block">
                                        <svg class="len-share-icon" aria-hidden="true">
                                            <use xlink:href="#icon-weixin"></use>
                                        </svg>
                                    </div>
                                    <div class="share-svg-block">
                                        <svg class="len-share-icon" aria-hidden="true">
                                            <use xlink:href="#icon-weibo"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="len-pop-ups" style="display: none;"></div>
                    </div>
                    <!-- 互动模块结束 -->
                    <!-- 上下文章开始 -->
                    <?php Len_Post_Above_Next_Module() ?>
                    <!-- 上下文章结束 -->
                    <!-- 评论模块开始 -->
                    <?php
                    /**
                     * 引用评论样式
                     * require_once get_theme_file_path('comments.php');
                     * 评论模块样式文件目录
                     */
                    Len_Module_Switcher(false, false, false, false, false, true);
                    ?>
                    <!-- 评论模块结束 -->
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