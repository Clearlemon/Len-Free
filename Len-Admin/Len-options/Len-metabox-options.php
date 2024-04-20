<?php if (!defined('ABSPATH')) {
  die;
}
//文章功能模块

$Module_Post_1 = 'Len_Post_Seo_Module';
$Module_Post_2 = 'Len_Post_Source_Module';
$Module_Post_3 = 'Len_Post_Music_Module';



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
      'dependency' => array('Module_Switcher_SEO', '==', true),
    ),

    array(
      'title'    => "SEO关键字",
      'id'       => 'Module_Keywords_SEO',
      'type' => 'text',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '用于推送给SEO关键字',
      'dependency' => array('Module_Switcher_SEO', '==', true),
    ),

    array(
      'title'    => "SEO内容",
      'id'       => 'Module_Description_SEO',
      'type' => 'textarea',
      'class' => 'fields_no_padding-bottom fields_no_padding-top',
      'desc'     => '用于推送给SEO内容',
      'dependency' => array('Module_Switcher_SEO', '==', true),
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

CSF::createMetabox($Module_Post_3, array(
  'title'     => '文章底部音乐播放器模块',
  'post_type'    => array('post', 'photo'),
));

CSF::createSection($Module_Post_3, array(
  'fields' => array(
    array(
      'id'      => 'Module_Music_Post_1',
      'type'    => 'text',
      'title'   => '音乐[作曲名]',
      'desc'     => '填写歌曲名如果未填写则输出<b class="Len_emphasis_fonts">未知歌曲</b>',
    ),
    array(
      'id'      => 'Module_Music_Post_2',
      'type'    => 'text',
      'title'   => '音乐[作者名]',
      'desc'     => '填写歌曲作者名如果未填写则输出<b class="Len_emphasis_fonts">未知作者</b>',
    ),
    array(
      'id'      => 'Module_Music_Post_3',
      'type'    => 'text',
      'title'   => '音乐[作曲链接]',
      'desc'     => '填写歌曲链接如果未填写则输出<b class="Len_emphasis_fonts">未知链接</b>',
    ),
    array(
      'id'      => 'Module_Music_Post_4',
      'type'    => 'text',
      'title'   => '音乐[作曲图封面]',
      'desc'     => '填写歌曲封面如果未填写则<b class="Len_emphasis_fonts">不输出内容</b>',
    ),
    array(
      'id'      => 'Module_Music_Post_5',
      'type'    => 'text',
      'title'   => '音乐[作曲歌词]',
      'desc'     => '填写歌曲歌词如果未填写则输出<b class="Len_emphasis_fonts">未知歌词</b>',
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

if (_len('Post_Content_Show_Module_1') == true) {
  CSF::createSection($Module_Post_Sidebars_2, array(
    'fields' => array(
      array(
        'id'    => 'Module_Switcher_User_Show',
        'type'  => 'switcher',
        'title' => '是否开启文章内嵌用户展示模块',
        'desc'     => '谨慎选择模块是否开启<b class="Len_emphasis_fonts">默认为Yes</b><br><b class="Len_emphasis_fonts">此功能显示顺序展示模块开启【全部】>文章内容模块展示>模块展示开关</b>',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),
      array(
        'id'    => 'Module_Switcher_Copyright',
        'type'  => 'switcher',
        'title' => '是否开版权告示模块',
        'desc'     => '谨慎选择模块是否开启<b class="Len_emphasis_fonts">默认为No</b><br><b class="Len_emphasis_fonts">此功能显示顺序展示模块开启【全部】>文章内容模块展示>模块展示开关</b>',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
      array(
        'id'    => 'Module_Switcher_Source',
        'type'  => 'switcher',
        'title' => '是否开启文章来源地址模块',
        'desc'     => '谨慎选择模块是否开启<b class="Len_emphasis_fonts">默认为No</b><br><b class="Len_emphasis_fonts">此功能显示顺序展示模块开启【全部】>文章内容模块展示>模块展示开关</b>',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
      array(
        'id'    => 'Module_Switcher_Music',
        'type'  => 'switcher',
        'title' => '是否开启文章音乐模块',
        'desc'     => '谨慎选择模块是否开启<b class="Len_emphasis_fonts">默认为No</b><br><b class="Len_emphasis_fonts">此功能显示顺序展示模块开启【全部】>文章内容模块展示>模块展示开关</b>',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
      array(
        'id'    => 'Module_Switcher_Comments',
        'type'  => 'switcher',
        'title' => '是否开启文章评论模块',
        'desc'     => '谨慎选择模块是否开启<b class="Len_emphasis_fonts">默认为Yes</b><br><b class="Len_emphasis_fonts">此功能显示顺序展示模块开启【全部】>文章内容模块展示>模块展示开关</b>',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),
    )
  ));
} else {
  CSF::createSection($Module_Post_Sidebars_2, array(
    'fields' => array(
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '此功能需要全局设置>文章模块>展示模块开启【全部】>启用',
      ),
    )
  ));
}
