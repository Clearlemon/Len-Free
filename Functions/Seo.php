<?php
function Len_Seo_Module()
{
    if (is_home()) {
        //如果时首页
        Len_Index_Seo();
    } elseif (is_search()) {
        // 如果是搜索页的逻辑
        Len_Search_Seo();
    } elseif (is_archive()) {
        //如果是分类页
        Len_cat_Seo();
    } elseif (is_single()) {
        //如果时文章页
        Len_Post_Seo();
    } elseif (is_page()) {
        Len_Page_Seo();
    } elseif (is_404()) {
        Len_404_Seo();
    }
}

function Len_404_Seo()
{
    $Deputy_Title = get_bloginfo('description');
?>
    <title><?php echo '404页 - ' . $Deputy_Title; ?></title>
<?php
}

function Len_cat_Seo()
{
    $Deputy_Title = get_bloginfo('description');
    $archive_title = single_cat_title('', false);
    // 获取当前分类的描述（如果有）
    $archive_description = category_description();
    // 输出标题和描述
?>
    <title><?php echo esc_html($archive_title) . ' - ' . $Deputy_Title; ?></title>
    <meta name="keywords" content="<?php echo esc_attr($archive_title); ?>">
    <meta name="description" content="<?php echo esc_attr($archive_description); ?>">
<?php
}


function Len_Search_Seo()
{
    $Site_title = get_search_query();
    $Deputy_Title = get_bloginfo('description');
?>
    <title><?php echo '搜索词:' . $Site_title . ' - ' . $Deputy_Title; ?></title>
<?php
}

function Len_Page_Seo()
{
    $Site_title = get_the_title();
    $Deputy_Title = get_bloginfo('description');
?>
    <title><?php echo $Site_title . ' - ' . $Deputy_Title; ?></title>
    <?php
}
function Len_Index_Seo()
{
    if (_len('Seo_Module_1') == true) {
        $Title = _len('Seo_Module_2');
        $Deputy_Title = _len('Seo_Module_2_1');
        $Keywords = _len('Seo_Module_3');
        $Description = _len('Seo_Module_4');
    ?>
        <title><?php echo $Title . ' - ' . $Deputy_Title; ?></title>
        <meta name="keywords" content="<?php echo $Keywords; ?>">
        <meta name="description" content="<?php echo $Description; ?>">
    <?php
    } else {
        $Site_title = get_bloginfo('name');
        $Deputy_Title = get_bloginfo('description');
    ?>
        <title><?php echo $Site_title . ' - ' . $Deputy_Title; ?></title>
    <?php
    }
}

function Len_Post_Seo()
{
    // 如果是单篇文章页的逻辑
    if (_Len_Post_Module('Module_Switcher_SEO', '', '', '', '', get_the_ID()) == true) {
        $Title = _Len_Post_Module('Module_Title_SEO', '', '', '', '', get_the_ID());
        $Keywords = _Len_Post_Module('Module_Keywords_SEO', '', '', '', '', get_the_ID());
        $Description = _Len_Post_Module('Module_Description_SEO', '', '', '', '', get_the_ID());
        $site_title = get_bloginfo('name');
    ?>
        <title><?php echo $Title . ' - ' . $site_title; ?></title>
        <meta name="keywords" content="<?php echo $Keywords; ?>">
        <meta name="description" content="<?php echo $Description; ?>">
    <?php
    } else {
        // 获取文章标题
        $Post_title = get_the_title();
        // 获取文章标签
        $Post_tags = get_the_tags();
        $Tag_names = array();
        if ($Post_tags) {
            foreach ($Post_tags as $tag) {
                $Tag_names[] = $tag->name;
            }
        }

        // 获取文章内容的前50字
        $Post_content = get_the_content();
        $Post_excerpt = wp_trim_words($Post_content, 100, '...');
        //获取网站标题
        $Site_title = get_bloginfo('name');
    ?>
        <title><?php echo esc_html($Post_title) . ' - ' . esc_html($Site_title); ?></title>
        <meta name="keywords" content="<?php echo esc_attr(implode(',', $Tag_names)); ?>">
        <meta name="description" content="<?php echo esc_attr($Post_excerpt); ?>">
<?php
    }
}
