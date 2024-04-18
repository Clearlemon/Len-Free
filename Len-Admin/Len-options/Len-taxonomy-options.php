<?php
if (!defined('ABSPATH')) {
  die;
}

//分类页设置扩展
$prefix = 'Len-category-Module';


CSF::createTaxonomyOptions($prefix, array(
  'taxonomy' => 'category',
  'data_type' => 'unserialize'
));

CSF::createSection($prefix, array(
  'fields' => array(
    array(
      'id'    => 'Cat_Module_1',
      'type'  => 'switcher',
      'title' => '分类Banner图模块开启',
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
      'id'         => 'Cat_Module_3',
      'type'       => 'button_set',
      'title'      => '文章置顶选择',
      'options'    => array(
        'Cat_Post_Top_1'  => '所有置顶文章',
        'Cat_Post_Top_2' => '当前分类置顶文章',
        'Cat_Post_Top_3' => '不置顶',
      ),
      'default'    => 'pagination_2'

    ),
    array(
      'id'         => 'Cat_Module_4',
      'type'       => 'button_set',
      'title'      => '底部翻页模块展示设置',
      'options'    => array(
        'Cat_Page_1'  => '传统分页',
        'Cat_Page_2' => 'Ajax下拉',
      ),
      'default'    => 'Cat_Page_1'
    ),
  )
));
