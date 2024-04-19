<?php
if (!defined('ABSPATH')) {
  die;
}

//分类页设置扩展
$prefix = 'Len-category-Module';


CSF::createTaxonomyOptions($prefix, array(
  'taxonomy' => array('category', 'post_tag'),
  'data_type' => 'unserialize'
));

CSF::createSection($prefix, array(
  'fields' => array(
    array(
      'id'    => 'Cat_Module_1',
      'type'  => 'switcher',
      'title' => '分类Banner图模块开启',
      'desc'     => '可单独开启<b class="Len_emphasis_fonts">【受全局影响】</b>将主题设置中的<b class="Len_emphasis_fonts">全局设置 > 分类页&&标签页 > 全局Banner模块设置 </b>',
    ),
    array(
      'id'      => 'Cat_Module_2',
      'type'  => 'upload',
      'preview' => true,
      'library'      => 'image',
      'dependency' => array('Cat_Module_1', '==', true),

      'title'   => '分类[Banner图片]',
    ),
    array(
      'id'    => 'Cat_Module_5',
      'type'  => 'icon',
      'title' => 'Banner图标',
      'dependency' => array('Cat_Module_1', '==', true),
      'desc'     => '不选择则不输出内容这里<b class="Len_emphasis_fonts">【推荐SVG】</b>来做图标<b class="Len_emphasis_fonts">【不支持自定义】</b>',
    ),
    array(
      'id'         => 'Cat_Module_3',
      'type'       => 'button_set',
      'title'      => '文章置顶选择',
      'desc'     => '可单独开启<b class="Len_emphasis_fonts">【受全局影响】</b>将主题设置中的<b class="Len_emphasis_fonts">全局设置 > 分类页&&标签页 > 全局置顶模块设置 </b>',
      'options'    => array(
        'Cat_Post_Top_1'  => '所有置顶文章',
        'Cat_Post_Top_2' => '当前分类置顶文章',
        'Cat_Post_Top_3' => '不置顶',
      ),
      'default'    => 'Cat_Post_Top_3'

    ),
    array(
      'id'         => 'Cat_Module_4',
      'type'       => 'button_set',
      'title'      => '翻页模块设置',
      'desc'     => '可单独开启<b class="Len_emphasis_fonts">【受全局影响】</b>将主题设置中的<b class="Len_emphasis_fonts">全局设置 > 分类页&&标签页 > 全局翻页模块设置 </b>',
      'options'    => array(
        'Cat_Page_1'  => '传统分页',
        'Cat_Page_2' => 'Ajax下拉',
      ),
      'default'    => 'Cat_Page_1'
    ),


  )
));
