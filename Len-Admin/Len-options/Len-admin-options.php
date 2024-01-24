<?php

use function PHPSTORM_META\type;

if (class_exists('CSF')) {

  $Module = 'Len_Free';
  $Image_Format = '.webp';
  $Image_Url = get_template_directory_uri() . '/Assets/Len-Images/';
  $Image_Url_Admin = get_template_directory_uri() . '/Assets/Len-Images/Admin/';

  CSF::createOptions($Module, array(
    'menu_title' => 'Len主题设置',
    'menu_slug'  => 'Len-Free',
    'framework_title'    => '<div class="admin-logo"></div>',
    'footer_text'        => '',
  ));
  //主题首页设置
  //模块设置
  CSF::createSection($Module, array(
    'title'  => '模块设置',
    'icon' => 'icon-mokuai',
    'id'  => 'Module',
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Module',
    'title'       => '头部模块',
    'icon'        => 'icon-line-layouttopdingbubuju-02',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Module',
    'title'       => '底部模块',
    'icon'        => 'icon-dibu',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Module',
    'title'       => 'Seo模块',
    'icon'        => 'icon-SEO',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Module',
    'title'       => '网站图标模块',
    'icon'        => 'icon-icon_61308998f3924',
    'description' => '',
    'fields'      => array()
  ));

  //全局设置
  CSF::createSection($Module, array(
    'title'  => '全局设置',
    'icon' => 'icon-qjpz',
    'id'  => 'Global',
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '首页模块',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '文章模块',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----文章页面全局模块设置----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '版权模块 | 互动模块 | 评论模块',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是版权模块设置区【文字模块支持Html】',
      ),
      array(
        'id'    => 'Post_Copyright_Module_1',
        'type'  => 'upload',
        'title' => '版权模块图片',
        'preview' => true,
        'desc'     => '此图片可展示二维码或者其他类型<b class="Len_emphasis_fonts">图片大小建议100*100，格式建议为webp</b>',
        'library'      => 'image',
      ),
      array(
        'id'      => 'Post_Copyright_Module_2',
        'type'    => 'textarea',
        'title'   => '版权模块文字【上】',
        'default' => '<p>1.此主题并不是十全十美请勿吹捧</p><p>2.文章转载需经过作者授权</p><p>3.文章转载请标注来源地址</p>'
      ),
      array(
        'id'      => 'Post_Copyright_Module_3',
        'type'    => 'textarea',
        'title'   => '版权模块文字【下】',
        'default' => '<p>温习提示：主题不支持商用哦！~</p>'
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是互动模块设置区',
      ),
      array(
        'id'    => 'Post_Pay_Img_Module_1',
        'type'  => 'upload',
        'title' => '支付宝收款码',
        'preview' => true,
        'desc'     => '支付宝收款码图片上传<b class="Len_emphasis_fonts">图片大小建议200*200，格式建议为webp</b>',
        'library'      => 'image',
        'default' => $Image_Url . 'zfb' . $Image_Format,
      ),
      array(
        'id'    => 'Post_Pay_Img_Module_2',
        'type'  => 'upload',
        'title' => '微信收款码',
        'preview' => true,
        'desc'     => '微信收款码图片上传<b class="Len_emphasis_fonts">图片大小建议200*200，格式建议为webp</b>',
        'library'      => 'image',
        'default' => $Image_Url . 'wx' . $Image_Format,
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这里是评论模块设置区',
      ),
    )
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '分类模块',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '标签模块',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '搜索模块',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '说说模块',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '归档模块',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '友链模块',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  //页面设置
  CSF::createSection($Module, array(
    'title'  => '页面设置',
    'icon' => 'icon-yemianshezhi',
    'id'  => 'Page',
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Page',
    'title'       => '首页设置',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Global',
    'title'       => '文章设置',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Page',
    'title'       => '搜索设置',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Page',
    'title'       => '分类设置',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Page',
    'title'       => '标签设置',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Page',
    'title'       => '说说设置',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Page',
    'title'       => '归档设置',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));
  CSF::createSection($Module, array(
    'parent'      => 'Page',
    'title'       => '友链设置',
    'icon'        => 'icon-yezi-',
    'description' => '',
    'fields'      => array()
  ));



  CSF::createSection($Module, array(
    'title'  => '其他设置',
    'icon' => 'icon-beifenhuifu',
    'id'  => 'Other',
  ));

  CSF::createSection($Module, array(
    'title'  => 'Len-优化设置',
    'id'  => 'optimize',
    'icon' => 'icon-shangjiayouhua',
    'fields' => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----后台优化----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '以下优化为禁用后台的一些功能来优化Wordpress',
      ),
      array(
        'id'      => 'optimize_1',
        'type'    => 'switcher',
        'title'   => '经典编辑器',
        'label'   => '你是否要开启经典编辑器？[包含前端样式资源]',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_2',
        'type'    => 'switcher',
        'title'   => 'Wordpress自动更新',
        'label'   => '你是否需要禁用Wordpress的自动更新？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'id'      => 'optimize_3',
        'type'    => 'switcher',
        'title'   => '经典小工具',
        'label'   => '你是否需要开启Wordpress的经典小工具？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_4',
        'type'    => 'switcher',
        'title'   => '版本修订',
        'label'   => '你是否需要禁用Wordpress自带的版本修订？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'id'      => 'optimize_5',
        'type'    => 'switcher',
        'title'   => 'Wordpress的图像限制功能',
        'label'   => '你是否需要禁用Wordpress的图像限制功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_6',
        'type'    => 'switcher',
        'title'   => 'Wordpress的多图片尺寸功能',
        'label'   => '你是否需要禁用Wordpress的多图片尺寸功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'id'      => 'optimize_7',
        'type'    => 'switcher',
        'title'   => 'Wordpress的字符转码',
        'label'   => '你是否需要禁用Wordpress的字符转码功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_8',
        'type'    => 'switcher',
        'title'   => 'Wordpress插入图片添加属性',
        'label'   => '你是否需要禁用Wordpress插入图片添加属性功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'type'    => 'heading',
        'content' => '<h3>   ----前端优化----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '以下优化为前端的一些功能来提高访问速度',
      ),

      array(
        'id'      => 'optimize_front_1',
        'type'    => 'switcher',
        'title'   => 'Wordpress的REST API',
        'label'   => '你是否需要禁用Wordpress的REST API功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_front_2',
        'type'    => 'switcher',
        'title'   => 'XML-RPL',
        'label'   => '你是否需要禁用Wordpress的XML-RPL功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'id'      => 'optimize_front_3',
        'type'    => 'switcher',
        'title'   => 'dns-prefetch',
        'label'   => '你是否需要禁用Wordpress的dns-prefetch功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
      array(
        'id'      => 'optimize_front_4',
        'type'    => 'switcher',
        'title'   => 'Trackbacks/Pingbacks',
        'label'   => '你是否需要禁用Wordpress的Trackbacks/Pingbacks',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_front_5',
        'type'    => 'switcher',
        'title'   => 'Wordpress表情',
        'label'   => '你是否需要禁用Wordpress自带的表情包样式资源？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_front_6',
        'type'    => 'switcher',
        'title'   => '前台管理员Banner',
        'label'   => '你是否要禁用前台的管理员Banner？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_front_7',
        'type'    => 'switcher',
        'title'   => '前端版本号',
        'label'   => '你是否不显示前端的Wordpress版本号？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'type'    => 'heading',
        'content' => '<h3>   ----函数优化----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '以下优化为禁用函数的优化功能',
      ),

      array(
        'id'      => 'optimize_fuc_1',
        'type'    => 'switcher',
        'title'   => '禁用translations_api函数',
        'label'   => '你是否需要禁用Wordpress的translations_api函数？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_fuc_2',
        'type'    => 'switcher',
        'title'   => '禁用wp_check_php_version函数',
        'label'   => '你是否需要禁用Wordpress的wp_check_php_version函数？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_fuc_3',
        'type'    => 'switcher',
        'title'   => '禁用wp_check_browser_version函数',
        'label'   => '你是否需要禁用Wordpress的wp_check_browser_version函数？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
    )
  ));
  //主题备份
  CSF::createSection($Module, array(
    'title'  => '备份&导入',
    'icon' => 'icon-beifenhuifu',
    'fields'      => array(
      array(
        'type' => 'backup',
      ),
    ),
  ));
  CSF::createSection($Module, array(
    'title'  => '待开发',
    'icon' => 'icon-beifenhuifu',
    'fields' => array()
  ));
}
add_filter('admin_footer_text', 'admin_footer', 99999);
function admin_footer()
{
  return '感谢您使用<a href="https://wordpress.org">WordPress</a>和<a href="https://github.com/Clearlemon/lemon-theme">Len主题进行创作</a>';
}
