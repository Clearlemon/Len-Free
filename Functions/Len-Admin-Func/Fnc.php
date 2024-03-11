<?php
// 一行一个文件 | 载入所需文件
$files = array(
    /**
     * 混杂函数文件
     * 'Assets/Index.php', | 主题前端资源函数文件
     * 'Functions/Optimize.php', | 主题前后端优化函数文件
     * 'Functions/Set.php',| 主题前后端设置控制函数文件
     * 'Functions/Seo.php',| 主题SEO函数文件
     * 'Functions/Content.php',|后台信息文件
     */
    'Assets/Index.php',
    'Functions/Set.php',
    'Functions/Optimize.php',
    'Functions/Seo.php',
    'Functions/Content.php',
    /**
     * 引用主题文件函数模板
     */
    'Len-Admin/Len-framework.php',
    'Len-Admin/index.php',

    /**
     * 引用主题编辑器函数功能
     */
    'Functions/Len-Editor/Post.php',

    /**
     * 引用主题AJAX功能
     */
    'Functions/Len-Ajax/Comments.php',
    'Functions/Len-Ajax/Post.php',

    /**
     * 页面函数文件
     * 'Module/Single.php',| 主题文章详情页函数模块文件
     * 'Module/Comments.php',| 主题文章评论函数模块文件
     * 'Module/Index.php',| 首页文章函数模块文件
     * 'Module/PageTemplates/Diary.php',| 说说页函数模块文件
     */
    'Module/Single.php',
    'Module/Comments.php',
    'Module/Index.php',
    'Module/PageTemplates/Diary.php',
    /**
 * 此引用链接是用户自定义设置
 * 如想自定义设置和主题则删除链接的注释
 */
    //'Other//User/Functions/Fnc.php',
);

foreach ($files as $file) {
    require_once get_theme_file_path('/' . $file);
}
