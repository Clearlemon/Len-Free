<?php
// 一行一个文件|载入所需文件
$files = array(
    //后台主题设置文件
    'Other/User/Set/User-Set.php',
);
foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
