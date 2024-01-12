<html>
<?php
/**
 * require_once get_theme_file_path('/Page/Index.php'); @引用主题文章展示样式模块
 * wp_footer(); @引用Wordpress自带的顶部样式文件
 */
wp_head();

require_once get_theme_file_path('/Page/Index.php');

/**
 * wp_footer(); @引用Wordpress自带的底部样式文件
 */
wp_footer();
?>

</html>