<?php

/**
 * 获取指定选项的值
 *
 * @param string $option 要获取的选项名称
 * @param mixed $default 如果选项不存在时返回的默认值
 *
 * @return mixed 返回选项的值，如果选项不存在则返回默认值
 */
if (!function_exists('_len')) {
    function _len($option = '', $default = null)
    {
        $options = get_option('Len_Free');
        return (isset($options[$option])) ? $options[$option] : $default;
    }
}

/**
 * 自定义获取文章元数据的函数 _leaf_post
 *
 * 这段代码定义了一个名为 _leaf_post 的函数，用于获取当前文章的自定义元数据。
 * 如果给定 $Len_Post_Module_key，函数将尝试从 'Len_Post_Module' 中获取对应键的值。
 * 如果给定 $Len_Post_Seo_key，函数将尝试从 'Len_Post_Seo' 中获取对应键的值。
 * 如果找到对应的值，则返回该值；如果找不到，返回默认值。
 *
 * @param string $Len_Post_Module_key 要获取的 'Len_Post_Module' 中的键。
 * @param string $Len_Post_Seo_key    要获取的 'Len_Post_Seo' 中的键。
 * @param mixed  $default             如果未找到对应值时返回的默认值。
 *
 * @return mixed 返回获取到的元数据值或默认值。
 */
if (!function_exists('leaf_post')) {
    function _leaf_post($Len_Post_Module_key = '', $Len_Post_Seo_key = '', $default = null)
    {
        // 获取当前文章的 'Len_Post_Module' 元数据
        $Len_Post_Module = get_post_meta(get_the_ID(), 'Len_Post_Module', true);
        // 获取当前文章的 'Len_Post_Seo' 元数据
        $Len_Post_Seo = get_post_meta(get_the_ID(), 'Len_Post_Seo', true);

        // 如果给定了 $Len_Post_Module_key 并且存在于 'Len_Post_Module' 中，返回对应值
        if ($Len_Post_Module_key !== '' && isset($Len_Post_Module[$Len_Post_Module_key])) {
            return $Len_Post_Module[$Len_Post_Module_key];
        }
        // 如果给定了 $Len_Post_Seo_key 并且存在于 'Len_Post_Seo' 中，返回对应值
        elseif ($Len_Post_Seo_key !== '' && isset($Len_Post_Seo[$Len_Post_Seo_key])) {
            return $Len_Post_Seo[$Len_Post_Seo_key];
        }
        // 如果未找到对应值，返回默认值
        else {
            return $default;
        }
    }
}

