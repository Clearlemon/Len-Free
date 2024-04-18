<?php
$files = array(
    //主题模块设置文件
    'Len-Admin/Len-options/Len-admin-options.php',
    //主题文章独立功能模块设置
    'Len-Admin/Len-options/Len-metabox-options.php',
    // //主题导航模块设置
    'Len-Admin/Len-options/Len-nav-menu-options.php',
    // //主题分类模块设置
    'Len-Admin/Len-options/Len-taxonomy-options.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
