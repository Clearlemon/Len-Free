<?php
function Len_Seo_Module()
{
    if (is_home()) {
        // 如果是首页的逻辑
    } elseif (is_search()) {
        // 如果是搜索页的逻辑
    } elseif (is_archive()) {
        // 如果是归档页的逻辑

        // 获取当前分类的名称
        $archive_title = single_cat_title('', false);

        // 获取当前分类的描述（如果有）
        $archive_description = category_description();

        // 输出标题和描述
?>
        <title><?php echo esc_html($archive_title); ?></title>
        <meta name="keywords" content="<?php echo esc_attr($archive_title); ?>">
        <meta name="description" content="<?php echo esc_attr($archive_description); ?>">
        <?php
    } elseif (is_single()) {
        // 如果是单篇文章页的逻辑

        if (_Len_Post_Module('Module_Switcher_SEO', '', '', '', get_the_ID()) == true) {
            $title = _Len_Post_Module('Module_Title_SEO', '', '', '', get_the_ID());
            $keywords = _Len_Post_Module('Module_Keywords_SEO', '', '', '', get_the_ID());
            $description = _Len_Post_Module('Module_Description_SEO', '', '', '', get_the_ID());
        ?>
            <title><?php echo $title; ?></title>
            <meta name="keywords" content="<?php echo $keywords; ?>">
            <meta name="description" content="<?php echo $description; ?>">
        <?php
        } else {
            // 获取文章标题
            $post_title = get_the_title();

            // 获取文章标签
            $post_tags = get_the_tags();
            $tag_names = array();
            if ($post_tags) {
                foreach ($post_tags as $tag) {
                    $tag_names[] = $tag->name;
                }
            }

            // 获取文章内容的前50字
            $post_content = get_the_content();
            $post_excerpt = wp_trim_words($post_content, 100, '...');

            // 输出标题、标签和前50字内容
        ?>
            <title><?php echo esc_html($post_title); ?></title>
            <meta name="keywords" content="<?php echo esc_attr(implode(',', $tag_names)); ?>">
            <meta name="description" content="<?php echo esc_attr($post_excerpt); ?>">
<?php
        }
    }
}
