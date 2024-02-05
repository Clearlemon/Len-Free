<?php

/**
 * 添加主题支持特色图像（缩略图）
 *
 * 这段代码使用 function_exists 函数检查是否存在 add_theme_support 函数。
 * 如果 add_theme_support 函数存在，表示当前 WordPress 版本支持主题功能。
 * 然后，通过 add_theme_support 函数添加对特色图像（缩略图）的支持。
 *
 * @return void 无返回值。
 */
if (function_exists('add_theme_support')) {
    // 添加对特色图像（缩略图）的支持
    add_theme_support('post-thumbnails');
}
