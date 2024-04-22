<?php

/**
 * wp_footer(); @引用Wordpress自带的顶部样式文件
 */
wp_head();

require_once get_theme_file_path('/Page/404.php');

/**
 * wp_footer(); @引用Wordpress自带的底部样式文件
 */
wp_footer();
