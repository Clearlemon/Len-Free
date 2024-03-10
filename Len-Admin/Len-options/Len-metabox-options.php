<?php if (!defined('ABSPATH')) {
  die;
} // Cannot access directly.
$prefix_page_opts = 'leaf-theme-page-article';

//
// 页面独立功能模块设置
//
// CSF::createMetabox($prefix_page_opts, array(
//   'title'        => 'Custom Page Options',
//   'post_type'    => 'page',
//   'show_restore' => true,
// ));

// //
// // Create a section
// //
// CSF::createSection($prefix_page_opts, array(
//   'title'  => 'Overview',
//   'icon'   => 'fas fa-rocket',
//   'fields' => array(

//     //
//     // A text field
//     //
//     array(
//       'id'    => 'opt-text',
//       'type'  => 'text',
//       'title' => 'Text',
//     ),

//     array(
//       'id'    => 'opt-textarea',
//       'type'  => 'textarea',
//       'title' => 'Textarea',
//       'help'  => 'The help text of the field.',
//     ),

//     array(
//       'id'    => 'opt-upload',
//       'type'  => 'upload',
//       'title' => 'Upload',
//     ),

//     array(
//       'id'    => 'opt-switcher',
//       'type'  => 'switcher',
//       'title' => 'Switcher',
//       'label' => 'The label text of the switcher.',
//     ),

//     array(
//       'id'      => 'opt-color',
//       'type'    => 'color',
//       'title'   => 'Color',
//       'default' => '#3498db',
//     ),

//     array(
//       'id'    => 'opt-checkbox',
//       'type'  => 'checkbox',
//       'title' => 'Checkbox',
//       'label' => 'The label text of the checkbox.',
//     ),

//     array(
//       'id'      => 'opt-radio',
//       'type'    => 'radio',
//       'title'   => 'Radio',
//       'options' => array(
//         'yes'   => 'Yes, Please.',
//         'no'    => 'No, Thank you.',
//       ),
//       'default' => 'yes',
//     ),

//     array(
//       'id'          => 'opt-select',
//       'type'        => 'select',
//       'title'       => 'Select',
//       'placeholder' => 'Select an option',
//       'options'     => array(
//         'opt-1'     => 'Option 1',
//         'opt-2'     => 'Option 2',
//         'opt-3'     => 'Option 3',
//       ),
//     ),

//   )
// ));

// //
// // Create a section
// //
// CSF::createSection($prefix_page_opts, array(
//   'title'  => 'More Fields',
//   'icon'   => 'fas fa-tint',
//   'fields' => array(

//     array(
//       'id'      => 'opt-image-select',
//       'type'    => 'image_select',
//       'title'   => 'Image Select',
//       'options' => array(
//         'opt-1' => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
//         'opt-2' => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
//         'opt-3' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
//         'opt-4' => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
//         'opt-5' => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
//       ),
//       'default' => 'opt-1',
//     ),

//     array(
//       'id'    => 'opt-background',
//       'type'  => 'background',
//       'title' => 'Background',
//     ),

//     array(
//       'type'    => 'notice',
//       'style'   => 'success',
//       'content' => 'A <strong>notice</strong> field with <strong>success</strong> style.',
//     ),

//     array(
//       'id'    => 'opt-icon',
//       'type'  => 'icon',
//       'title' => 'Icon',
//     ),

//     array(
//       'id'    => 'opt-alt-text',
//       'type'  => 'text',
//       'title' => 'Text',
//     ),

//     array(
//       'id'         => 'opt-alt-textarea',
//       'type'       => 'textarea',
//       'title'      => 'Textarea',
//       'subtitle'   => 'A textarea with shortcoder.',
//       'shortcoder' => 'csf_demo_shortcodes',
//     ),

//   )
// ));

//文章功能模块

$Module_Post_1 = 'Len_Post_Seo_Module';
$Module_Post_2 = 'Len_Post_Source_Module';




CSF::createMetabox($Module_Post_1, array(
  'title'        => '文章独立SEO模块',
  'post_type'    => array('post', 'diary', 'photo'),
));

CSF::createSection($Module_Post_1, array(
  'fields' => array(

    array(
      'id'    => 'Module_Switcher_SEO',
      'type'  => 'switcher',
      'title' => '是否开启独立SEO',
      'desc'     => '如需要字段与文章SEO则开启此功能<b class="Len_emphasis_fonts">功能可能会与插件起冲突，慎用！！！</b>',
    ),

    array(
      'title'    => "SEO标题",
      'id'       => 'Module_Title_SEO',
      'type' => 'text',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '用于推动给SEO标题',
    ),

    array(
      'title'    => "SEO关键字",
      'id'       => 'Module_Keywords_SEO',
      'type' => 'text',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '用于推送给SEO关键字',
    ),

    array(
      'title'    => "SEO内容",
      'id'       => 'Module_Description_SEO',
      'type' => 'textarea',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '用于推送给SEO内容',
    ),
  ),
));

CSF::createMetabox($Module_Post_2, array(
  'title'     => '文章来源地址模块',
  'post_type'    => array('post', 'photo'),
));

CSF::createSection($Module_Post_2, array(
  'fields' => array(
    array(
      'id'      => 'Module_Source_Address',
      'type'    => 'text',
      'title'   => '转载[用户名]',
      'desc'     => '如未填写为空白则输出为<b class="Len_emphasis_fonts">未知作者</b>',
    ),
    array(
      'id'      => 'Module_Source_Author_Name',
      'type'    => 'text',
      'title'   => '转载[网站名]',
      'desc'     => '如未填写为空白则输出为<b class="Len_emphasis_fonts">未知网站</b>',
    ),
    array(
      'id'      => 'Module_Source_Link',
      'type'    => 'text',
      'title'   => '转载[网站链接]',
      'desc'     => '如未填写为空白则输出为<b class="Len_emphasis_fonts">未知链接</b>',
    ),
  ),
));


//侧边栏模块功能


$Module_Post_Sidebars_1 = 'Len_Post_Module_Thumbnail_Sidebars';
$Module_Post_Sidebars_2 = 'Len_Post_Module_Switcher_Sidebars';

CSF::createMetabox($Module_Post_Sidebars_1, array(
  'title'        => '文章外链特色图模块',
  'post_type'    => array('post', 'diary', 'photo'),
  'context'   => 'side',
));

CSF::createSection($Module_Post_Sidebars_1, array(
  'fields' => array(array(
    'id'    => 'Len_Backlinks_Thumbnail',
    'type'  => 'upload',
    'title' => '文章外链缩略图上传',
    'preview' => true,
    'desc'     => '缩略图的展现顺序为 ><b class="Len_emphasis_fonts"> 文章外链缩略图 </b>><b class="Len_emphasis_fonts"> 特色图片 </b>><b class="Len_emphasis_fonts"> 文章内第一张图 </b>><b class="Len_emphasis_fonts"> 自定义缩略图 </b>此顺序展示',
    'library'      => 'image',
  ),),
));

CSF::createMetabox($Module_Post_Sidebars_2, array(
  'title'     => '模块展示开关',
  'post_type' => array('post'),
  'context'   => 'side',

));

CSF::createSection($Module_Post_Sidebars_2, array(
  'fields' => array(
    array(
      'id'    => 'Module_Switcher_User_Show',
      'type'  => 'switcher',
      'title' => '是否开启文章内嵌用户展示模块',
      'desc'     => '谨慎选择模块是否开启<b class="Len_emphasis_fonts">默认为Yes</b><br><b class="Len_emphasis_fonts">此功能脱离全局模块控制</b>',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'default' => true,
    ),
    array(
      'id'    => 'Module_Switcher_Copyright',
      'type'  => 'switcher',
      'title' => '是否开版权告示模块',
      'desc'     => '谨慎选择模块是否开启<b class="Len_emphasis_fonts">默认为No</b><br><b class="Len_emphasis_fonts">此功能脱离全局模块控制</b>',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'default' => false,
    ),
    array(
      'id'    => 'Module_Switcher_Source',
      'type'  => 'switcher',
      'title' => '是否开启文章来源地址模块',
      'desc'     => '谨慎选择模块是否开启<b class="Len_emphasis_fonts">默认为No</b><br><b class="Len_emphasis_fonts">此功能脱离全局模块控制</b>',
      'text_on'  => 'Yes',
      'text_off' => 'No',
      'default' => false,
    ),
  )
));
