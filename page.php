<?php

/**
 * require_once get_theme_file_path('/Page/Len-Single/Single.php'); @引用主题详情文章页展示样式模块
 * wp_footer(); @引用Wordpress自带的顶部样式文件
 */
wp_head();
?>
<?php
require_once get_theme_file_path('/Page/Page.php');

/**
 * wp_footer(); @引用Wordpress自带的底部样式文件
 */
wp_footer();
