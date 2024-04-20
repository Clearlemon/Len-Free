<?php

/**
 * @Author：青桔&dmy
 * @Url： lmeon.com/len-thems
 * @Time：2024-1-4
 * @Email: Len@tqlen.com
 * @Project: Len主题
 * */


//功能性禁用模块
/**
 * 条件性块编辑器和经典编辑器过滤器
 *
 * 这段代码使用 _len 函数检查 'optimize_1' 选项的值。
 * 如果 'optimize_1' 为真（评估为 true），则应用过滤器以禁用块编辑器并启用经典编辑器。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_1'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return bool 如果 'optimize_1' 为真，则返回 true；否则返回默认值。
 */
if (_len('optimize_1', true)) {
    // 为文章禁用块编辑器
    add_filter('use_block_editor_for_post', '__return_false', 10);

    // 为文章启用经典编辑器
    add_filter('classic_editor_enabled', '__return_true', 10);
    function disable_block_library_style()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wp-block-library-editor');
    }
    add_action('wp_enqueue_scripts', 'disable_block_library_style');
    add_action('admin_enqueue_scripts', 'disable_block_library_style');
}

/**
 * 条件性禁用 WordPress 核心自动更新
 *
 * 这段代码使用 _len 函数检查 'optimize_5' 选项的值。
 * 如果 'optimize_5' 为真（评估为 true），则添加了一个过滤器，用于禁用 WordPress 核心的自动更新功能。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_5'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_2', true)) {
    // 添加一个过滤器，禁用 WordPress 核心的自动更新功能
    add_filter('auto_update_core', '__return_false');
}

/**
 * 条件性编辑器和小工具优化
 *
 * 这段代码使用 _len 函数检查 'optimize_6' 选项的值。
 * 如果 'optimize_6' 为真（评估为 true），则进行以下操作：
 *   1. 添加一个过滤器，禁用小工具块编辑器。
 *   2. 在 'widgets_init' 动作中注册一个函数，用于注销一系列默认的小工具。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_6'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_3', true)) {
    // 添加一个过滤器，禁用小工具块编辑器
    add_filter('use_widgets_block_editor', '__return_false');

    /**
     * 在 'widgets_init' 动作中注册的函数，用于注销一系列默认的小工具
     *
     * @return void 无返回值。
     */
    function my_unregister_widgets()
    {
        unregister_widget('WP_Widget_Archives');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Categories');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Pages');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_Recent_Posts');
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Widget_Text');
        unregister_widget('WP_Nav_Menu_Widget');
        unregister_widget('WP_Widget_Media_Audio');
        unregister_widget('WP_Widget_Media_Image');
        unregister_widget('WP_Widget_Media_Gallery');
        unregister_widget('WP_Widget_Media_Video');
    }

    // 在 'widgets_init' 动作中执行函数，注销默认的小工具
    add_action('widgets_init', 'my_unregister_widgets');
}



/**
 * 条件性禁用 WordPress 自动保存和修订版本
 *
 * 这段代码使用 _len 函数检查 'optimize_4' 选项的值。
 * 如果 'optimize_4' 为真（评估为 true），则进行以下操作：
 *   1. 在 'wp_print_scripts' 动作中添加一个函数，用于注销自动保存的脚本。
 *   2. 在 'wp_revisions_to_keep' 过滤器中添加一个函数，用于将修订版本的保留数量设置为零。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_4'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_4', true)) {
    /**
     * 在 'wp_print_scripts' 动作中注销自动保存脚本的函数
     *
     * @return void 无返回值。
     */
    function fanly_no_autosave()
    {
        wp_deregister_script('autosave');
    }

    // 在 'wp_print_scripts' 动作中执行注销自动保存脚本的动作
    add_action('wp_print_scripts', 'fanly_no_autosave');

    /**
     * 在 'wp_revisions_to_keep' 过滤器中设置修订版本的保留数量为零的函数
     *
     * @param int    $num   当前设置的修订版本的保留数量。
     * @param object $post  当前的文章对象。
     *
     * @return int 返回修订版本的保留数量（在这个案例中是零）。
     */
    function fanly_wp_revisions_to_keep($num, $post)
    {
        return 0;
    }

    // 在 'wp_revisions_to_keep' 过滤器中执行设置修订版本的保留数量为零的动作
    add_filter('wp_revisions_to_keep', 'fanly_wp_revisions_to_keep', 10, 2);
}

/**
 * 条件性移除 WordPress 图像大小限制
 *
 * 这段代码使用 _len 函数检查 'optimize_9' 选项的值。
 * 如果 'optimize_9' 为真（评估为 true），则定义了一个名为 remove_image_size_limits 的函数，
 * 并在主题设置完成后（'after_setup_theme' 动作）将其添加为动作，用于移除 WordPress 对大图的大小限制。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_9'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_5', true)) {
    /**
     * 在 'after_setup_theme' 动作中移除 WordPress 对大图大小的限制的函数
     *
     * @return void 无返回值。
     */
    function remove_image_size_limits()
    {
        add_filter('big_image_size_threshold', '__return_false');
    }

    // 在主题设置完成后执行移除对大图大小限制的动作
    add_action('after_setup_theme', 'remove_image_size_limits');
}

/**
 * 条件性禁用 WordPress 图像尺寸
 *
 * 这段代码使用 _len 函数检查 'optimize_10' 选项的值。
 * 如果 'optimize_10' 为真（评估为 true），则定义了一个名为 disable_image_sizes 的函数，
 * 并添加了两个过滤器：'intermediate_image_sizes_advanced' 和 'big_image_size_threshold'，
 * 用于禁用指定的 WordPress 图像尺寸和移除大图的大小限制。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_10'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_6', true)) {
    /**
     * 禁用指定的 WordPress 图像尺寸的函数
     *
     * @param array $sizes 当前注册的所有图像尺寸。
     *
     * @return array 返回已禁用指定图像尺寸后的图像尺寸数组。
     */
    function disable_image_sizes($sizes)
    {
        unset($sizes['thumbnail']);
        unset($sizes['medium']);
        unset($sizes['large']);
        unset($sizes['medium_large']);
        unset($sizes['1536x1536']);
        unset($sizes['2048x2048']);
        return $sizes;
    }

    // 添加一个过滤器，禁用指定的 WordPress 图像尺寸
    add_filter('intermediate_image_sizes_advanced', 'disable_image_sizes');

    // 添加一个过滤器，移除大图的大小限制
    add_filter('big_image_size_threshold', '__return_false');
}

/**
 * 条件性移除 WordPress 文本美化功能
 *
 * 这段代码使用 _len 函数检查 'optimize_11' 选项的值。
 * 如果 'optimize_11' 为真（评估为 true），则使用 remove_filter 函数移除了多个文本美化过滤器，
 * 包括 'the_content'、'the_title'、'the_excerpt' 以及 'widget_text_content'。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_11'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_7', true)) {
    // 移除 'the_content' 过滤器，禁用文本美化
    remove_filter('the_content', 'wptexturize');

    // 移除 'the_title' 过滤器，禁用文本美化
    remove_filter('the_title', 'wptexturize');

    // 移除 'the_excerpt' 过滤器，禁用文本美化
    remove_filter('the_excerpt', 'wptexturize');

    // 移除 'widget_text_content' 过滤器，禁用文本美化
    remove_filter('widget_text_content', 'wptexturize');
}

/**
 * 条件性移除文章特色图像和插入编辑器的图片标签中的宽度和高度属性
 *
 * 这段代码使用 _len 函数检查 'optimize_8' 选项的值。
 * 如果 'optimize_8' 为真（评估为 true），则定义了一个名为 remove_image_attributes 的函数，
 * 并添加了两个过滤器：'post_thumbnail_html' 和 'image_send_to_editor'，
 * 用于在特定条件下移除文章特色图像和插入编辑器的图片标签中的宽度和高度属性。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_8'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_8', true)) {
    /**
     * 移除图片标签中的宽度和高度属性的函数
     *
     * @param string $html 图片标签的 HTML 内容。
     *
     * @return string 返回处理后的图片标签 HTML 内容。
     */
    function remove_image_attributes($html)
    {
        // 使用正则表达式匹配宽度和高度属性，并将其替换为空字符串
        $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
        return $html;
    }

    // 添加一个过滤器，用于在显示文章特色图像时移除宽度和高度属性
    add_filter('post_thumbnail_html', 'remove_image_attributes');

    // 添加一个过滤器，用于在插入编辑器的图片时移除宽度和高度属性
    add_filter('image_send_to_editor', 'remove_image_attributes');
}
/**
 * 条件性移除文章特色图像和插入编辑器的图片标签中的宽度和高度属性
 *
 * 这段代码使用 _len 函数检查 'optimize_9' 选项的值。
 * 如果 'optimize_9' 为真（评估为 true），则定义了一个名为 删除分类标签 的函数，
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_8'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_9', true)) {
    add_action('load-themes.php',  'Len_Cat_Refresh_Rules');
    add_action('created_category', 'Len_Cat_Refresh_Rules');
    add_action('edited_category', 'Len_Cat_Refresh_Rules');
    add_action('delete_category', 'Len_Cat_Refresh_Rules');
    function Len_Cat_Refresh_Rules()
    {
        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }
    add_action('init', 'Len_Cat_Permastruct');
    function Len_Cat_Permastruct()
    {
        global $wp_rewrite, $wp_version;
        if (version_compare($wp_version, '3.4', '<')) {
            $wp_rewrite->extra_permastructs['category'][0] = '%category%';
        } else {
            $wp_rewrite->extra_permastructs['category']['struct'] = '%category%';
        }
    }
    add_filter('category_rewrite_rules', 'Len_Cat_Rewrite_Rules');
    function Len_Cat_Rewrite_Rules($category_rewrite)
    {
        $category_rewrite = array();
        $categories = get_categories(array('hide_empty' => false));
        foreach ($categories as $category) {
            $category_nicename = $category->slug;
            if ($category->parent == $category->cat_ID)
                $category->parent = 0;
            elseif ($category->parent != 0)
                $category_nicename = get_category_parents($category->parent, false, '/', true) . $category_nicename;
            $category_rewrite['(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$'] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
            $category_rewrite['(' . $category_nicename . ')/page/?([0-9]{1,})/?$'] = 'index.php?category_name=$matches[1]&paged=$matches[2]';
            $category_rewrite['(' . $category_nicename . ')/?$'] = 'index.php?category_name=$matches[1]';
        }
        global $wp_rewrite;
        $old_category_base = get_option('category_base') ? get_option('category_base') : 'category';
        $old_category_base = trim($old_category_base, '/');
        $category_rewrite[$old_category_base . '/(.*)$'] = 'index.php?category_redirect=$matches[1]';
        return $category_rewrite;
    }
    add_filter('query_vars', 'Len_Cat_Query_Vars');
    function Len_Cat_Query_Vars($public_query_vars)
    {
        $public_query_vars[] = 'category_redirect';
        return $public_query_vars;
    }
    add_filter('request', 'Len_Cat_Request');
    function Len_Cat_Request($query_vars)
    {
        if (isset($query_vars['category_redirect'])) {
            $catlink = trailingslashit(get_option('home')) . user_trailingslashit($query_vars['category_redirect'], 'category');
            status_header(301);
            header("Location: $catlink");
            exit();
        }
        return $query_vars;
    }
}
//前端优化函数模块

/**
 * 条件性通过 REST API 禁止未登录用户访问
 *
 * 这段代码使用 _len 函数检查 'optimize_12' 选项的值。
 * 如果 'optimize_12' 为真（评估为 true），则添加了一个过滤器 'rest_authentication_errors'，
 * 用于在 REST API 请求中禁止未登录用户的访问。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_12'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_front_1', true)) {
    /**
     * 在 REST API 认证错误时执行的匿名函数
     *
     * @param mixed $result 之前的认证结果。
     *
     * @return mixed 修饰后的认证结果。
     */
    add_filter('rest_authentication_errors', function ($result) {
        // 如果之前的认证结果不为空，直接返回
        if (!empty($result)) {
            return $result;
        }

        // 如果用户未登录，返回一个自定义的 WP_Error 对象，表示未登录错误（状态码为 401）
        if (!is_user_logged_in()) {
            return new WP_Error('rest_not_logged_in', 'You are not currently logged in.', array('status' => 401));
        }

        // 返回原始的认证结果
        return $result;
    });
}

/**
 * 条件性禁用 XML-RPC
 *
 * 这段代码使用 _len 函数检查 'optimize_4' 选项的值。
 * 如果 'optimize_4' 为真（评估为 true），则添加了一个过滤器，用于禁用 XML-RPC 功能。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_4'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_front_2', true)) {
    // 添加一个过滤器，禁用 XML-RPC 功能
    add_filter('xmlrpc_enabled', '__return_false');
}

/**
 * 条件性移除前台页面的 DNS 预取
 *
 * 这段代码使用 _len 函数检查 'optimize_front_3' 选项的值。
 * 如果 'optimize_front_3' 为真（评估为 true），则定义了一个名为 remove_dns_prefetch 的函数，
 * 并在 WordPress 初始化时添加了一个动作 'init'，用于在前台页面移除 DNS 预取。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_front_3'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_front_3', true)) {
    /**
     * 移除前台页面的 DNS 预取的函数
     *
     * @return void 无返回值。
     */
    function remove_dns_prefetch()
    {
        // 移除 wp_resource_hints 动作，该动作会输出 DNS 预取标签
        remove_action('wp_head', 'wp_resource_hints', 2);
    }

    // 添加一个动作，用于在 WordPress 初始化时执行移除 DNS 预取的函数
    add_action('init', 'remove_dns_prefetch');
}


/**
 * 条件性禁用前台页面的引用通告（trackbacks）和pingbacks
 *
 * 这段代码使用 _len 函数检查 'optimize_front_4' 选项的值。
 * 如果 'optimize_front_4' 为真（评估为 true），则定义了一个名为 disable_trackbacks 的函数，
 * 并在模板重定向时添加了一个动作 'template_redirect'，用于在前台页面禁用引用通告（trackbacks）和 pingbacks。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_front_4'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_front_4', true)) {
    /**
     * 在前台页面禁用引用通告和 pingbacks 的函数
     *
     * @global WP $wp WordPress 全局对象。
     *
     * @return void 无返回值。
     */
    function disable_trackbacks()
    {
        // 全局 WordPress 对象
        global $wp;

        // 禁用引用通告
        $wp->query_vars['tb'] = false;

        // 禁用 pingbacks
        $wp->query_vars['ping'] = false;
    }

    // 添加一个动作，用于在模板重定向时执行禁用引用通告和 pingbacks 的函数
    add_action('template_redirect', 'disable_trackbacks');
}


/**
 * 条件性禁用 WordPress 表情符号
 *
 * 这段代码使用 _len 函数检查 'optimize_7' 选项的值。
 * 如果 'optimize_7' 为真（评估为 true），则定义了一个名为 disable_emoji 的函数，
 * 并在 WordPress 初始化过程中（'init' 阶段）将其添加为动作，用于禁用 WordPress 表情符号功能。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_7'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_front_5', true)) {
    /**
     * 在 'init' 阶段禁用 WordPress 表情符号的函数
     *
     * @return void 无返回值。
     */
    function disable_emoji()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    }

    // 在 WordPress 初始化过程中执行禁用表情符号的动作
    add_action('init', 'disable_emoji');
}

/**
 * 条件性管理栏禁用
 *
 * 这段代码使用 _len 函数检查 'optimize_2' 选项的值。
 * 如果 'optimize_2' 为真（评估为 true），则定义了一个名为 disable_admin_bar 的函数，
 * 并在 WordPress 初始化过程中（'init' 阶段）将其添加为动作，用于禁用管理栏。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_2'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_front_6', true)) {
    /**
     * 禁用管理栏的函数
     */
    function disable_admin_bar()
    {
        show_admin_bar(false);
    }

    // 在 WordPress 初始化过程中添加禁用管理栏的动作
    add_action('init', 'disable_admin_bar');
}


/**
 * 条件性移除 WordPress 版本信息
 *
 * 这段代码使用 _len 函数检查 'optimize_3' 选项的值。
 * 如果 'optimize_3' 为真（评估为 true），则定义了一个名为 remove_wp_version 的函数，
 * 并在 WordPress 输出版本信息时（'the_generator' 过滤器），将其添加为过滤器，用于移除 WordPress 版本信息。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_3'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_front_7', true)) {
    /**
     * 移除 WordPress 版本信息的函数
     *
     * @return string 返回一个空字符串，以移除 WordPress 版本信息。
     */
    function remove_wp_version()
    {
        return '';
    }

    // 在 WordPress 输出版本信息时添加移除 WordPress 版本信息的过滤器
    add_filter('the_generator', 'remove_wp_version');
}


//函数性功能禁用模块

/**
 * 条件性禁用 WordPress 翻译 API
 *
 * 这段代码使用 _len 函数检查 'optimize_fuc_1' 选项的值。
 * 如果 'optimize_fuc_1' 为真（评估为 true），则定义了一个名为 disable_translations_api 的函数，
 * 该函数用于在 WordPress 初始化后的 'after_setup_theme' 动作中移除加载翻译文件的动作。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_fuc_1'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_fuc_1', true)) {
    /**
     * 禁用 WordPress 翻译 API 的函数
     *
     * @return void 无返回值。
     */
    function disable_translations_api()
    {
        // 移除加载翻译文件的动作
        remove_action('init', 'wp_maybe_load_translations');
    }

    // 添加一个动作，用于在主题设置完成后执行禁用翻译 API 的函数
    add_action('after_setup_theme', 'disable_translations_api');
}


/**
 * 条件性禁用 WordPress PHP 版本检查
 *
 * 这段代码使用 _len 函数检查 'optimize_fuc_1' 选项的值。
 * 如果 'optimize_fuc_1' 为真（评估为 true），则定义了一个名为 disable_php_version_check 的函数，
 * 该函数用于在主题设置完成后的 'after_setup_theme' 动作中移除 WordPress 的 PHP 版本检查动作。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_fuc_1'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_fuc_1', true)) {
    /**
     * 禁用 WordPress PHP 版本检查的函数
     *
     * @return void 无返回值。
     */
    function disable_php_version_check()
    {
        // 移除 WordPress 的 PHP 版本检查动作
        remove_action('wp_die_handler', 'wp_check_php_version');
    }

    // 添加一个动作，用于在主题设置完成后执行禁用 PHP 版本检查的函数
    add_action('after_setup_theme', 'disable_php_version_check');
}


/**
 * 条件性禁用 WordPress 浏览器版本检查
 *
 * 这段代码使用 _len 函数检查 'optimize_fuc_1' 选项的值。
 * 如果 'optimize_fuc_1' 为真（评估为 true），则定义了一个名为 disable_browser_version_check 的函数，
 * 该函数用于在主题设置完成后的 'after_setup_theme' 动作中移除 WordPress 的浏览器版本检查动作。
 *
 * @param string $option   要检查的选项名称（在这个案例中是 'optimize_fuc_1'）。
 * @param bool   $default  如果选项未设置时要返回的默认值（在这个案例中是 true）。
 *
 * @return void 无返回值。
 */
if (_len('optimize_fuc_1', true)) {
    /**
     * 禁用 WordPress 浏览器版本检查的函数
     *
     * @return void 无返回值。
     */
    function disable_browser_version_check()
    {
        // 移除 WordPress 的浏览器版本检查动作
        remove_action('wp_footer', 'wp_check_browser_version');
    }

    // 添加一个动作，用于在主题设置完成后执行禁用浏览器版本检查的函数
    add_action('after_setup_theme', 'disable_browser_version_check');
}
