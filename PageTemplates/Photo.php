<?php
/*
Template Name: Photo【相册】
*/

/**
 * wp_footer(); @引用Wordpress自带的顶部样式文件
 */
wp_head();
?>


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
        <div  class="len-showcase-main">
            <!-- 图片开始 -->
            <div id="len-waterfall">
                <?php
                Len_Photo_Showcase();

                ?>
            </div>
            <!-- 图片结束 -->
            <?php
            Len_Photo_Diary_Page();
            ?>
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