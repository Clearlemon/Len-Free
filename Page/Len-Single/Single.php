<html>

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
                ?>
                <div class="len-showcase-main">
                    <!-- 文章展示模块开始 -->
                    <div class="len-article-banner-nav-blcok">
                        <div class="len-article-nav-block"><a class="len-article-links-block len-pjax-link-all-blcok" href="">首页</a> </div>
                        <div class="len-article-nav-block"><a class="len-article-links-block len-pjax-link-all-blcok" href="">分类</a> </div>
                        <div class="len-article-block">Lemon ———— 极简的双边栏主题</div>
                    </div>
                    <div class="len-article-min-blcok">
                        <div class="len-article-thumbnail-block-min">
                            <img class="len-thumbnail-block" src="<?php echo  Len_Thumbnail_Module(get_the_ID()); ?>" alt="">
                        </div>
                        <div class="len-article-block-min">
                            <div class="len-article-showcase-main">
                                <div class="len-article-title-min">
                                    <h1 class="len-article-title-block">Lemon ———— 极简的双边栏主题</h1>
                                </div>

                                <div class="len-article-showcase-content">
                                    <p>主题相对于某些主题来说，算得上是简洁了，没有过多且复杂的主题设置，但又不会使得主题内容单一无趣,主题内的图标多数使用了阿里巴巴的失衡图标库内的图标，主题内并未使用UI框架。
                                    </p>
                                    <h1 class="len-article-heading">Lemon主题介绍</h1>
                                    <p>柠檬[Lemon]主题是我第二个开发的Wordpress主题，是基于读一个主题之后的项目有着一定的经验，布局样式算不上畸形，
                                        在第一版的主题开发中也是积累了不少的布局美观和灵感，以及采集了不少主题的优点之处。</p>
                                    <p>主题是一个极简的双边栏的主题，我初步采样了Typecho的handsome主题和Wordpress的Giligili主题知只采集了这两个的部分布局和样式。</p>
                                    <p>主题后台设置不是很多，设置你可以用不到5分钟的时间就可以看完，多处设置有着该设置的介绍和使用方法，</p>
                                </div>
                                <div class="len-article-copyright">
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

                                <div class="len-article-tag">
                                    <svg class="len-tag-post-icon" aria-hidden="true">
                                        <use xlink:href="#icon-biaoqian1"></use>标签
                                        <ul class="article-tag-ul-blcok">
                                            <li class="article-tag-li-">说说</li>
                                            <li class="article-tag-li-">Wordpress</li>
                                            <li class="article-tag-li-">主题</li>
                                            <li class="article-tag-li-">Len</li>
                                        </ul>
                                    </svg>
                                </div>
                                <?php Len_Source_Module(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- 互动模块开始 -->
                    <div class="len-article-mutual-min">
                        <div class="len-article-mutual-blcok">
                            <div class="len-mutaual-block">
                                <div class="len-article-humbs-up">
                                    <svg class="len-post-mutual-icon" aria-hidden="true">
                                        <use xlink:href="#icon-dianzan"></use>
                                    </svg>
                                    <p class="len-post-mutal-text">点赞</p>
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
                                <img class="pay-qr-img" style="display: block;" src="/wp-content/themes/Len-Free/Assets/Len-Images/zfb.png" alt="">
                                <img class="pay-qr-img" style="display: none;" src="/wp-content/themes/Len-Free/Assets/Len-Images/wx.png" alt="">
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
                    <div class="len-arrow-post-block-min">
                        <div class="len-arrow-blcok-flex">
                            <div class="len-arrow-above-post positioning-right">
                                <img class="above-post-background" src="/wp-content/themes/Len-Free/Assets/Len-Images/post-background-2.png" alt="">
                                <div class="arrow-text-blcok-right">
                                    <span>
                                        <svg class="len-arrow-icon" aria-hidden="true">
                                            <use xlink:href="#icon-arrow_left"></use>
                                        </svg>上一篇</span>
                                    <p>Lemon pro</p>
                                </div>
                            </div>
                            <div class="len-arrow-under-post positioning-left">
                                <img class="under-post-background" src="/wp-content/themes/Len-Free/Assets/Len-Images/post-background-3.jpg" alt="">
                                <div class="arrow-text-blcok-left">
                                    <span>
                                        下一篇
                                        <svg class="len-arrow-icon" aria-hidden="true">
                                            <use xlink:href="#icon-arrow_right"></use>
                                        </svg>
                                    </span>
                                    <p>你好世界</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 上下文章结束 -->
                    <!-- 评论模块开始 -->
                    <div class="len-post-comments">
                        <div class="len-comments-blcok">
                            <div class="len-comments-main">
                                <div class="len-user-comments-avatar-blcok">
                                    <img class="user-comments-avatar" src="/wp-content/themes/Len-Free/Assets/Len-Images/user-avatar.jpg" alt="">
                                    <p class="user-comments-name-blcok">青桔柠檬</p>
                                </div>
                                <div class="len-user-comments-content">
                                    <div class="len-comments-input-block">
                                        <input class="len-comments-input" type="text">
                                        <input class="len-comments-input" type="text">
                                        <input class="len-comments-input" type="text">
                                        <input class="len-comments-input" type="text">
                                    </div>
                                    <div class="len-comments-textarea">
                                        <textarea class="len-comments-textarea-block" name="" id="" cols="30" rows="10"></textarea>
                                        <div class="len-comments-submit-button-block">
                                            <button class="comments-submit-button">发表评论</button>
                                        </div>
                                    </div>
                                    <div class="len-comments"><span>表情</span></div>
                                </div>
                            </div>
                            <div class="len-comments-part"></div>
                        </div>
                    </div>
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


</html>