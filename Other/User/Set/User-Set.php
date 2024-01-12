<?php

use function PHPSTORM_META\type;

if (class_exists('CSF')) {

  $prefix = 'User-Set';


  CSF::createOptions($prefix, array(
    'menu_title' => '用户自定义设置',
    'menu_slug'  => 'User-Set',
    'framework_title'    => '<div class="admin-logo"></div>',
    'footer_text'        => '',
  ));
  //主题首页设置
  //主题备份
  CSF::createSection($prefix, array(
    'title'  => '备份&导入',
    'icon' => 'icon-beifenhuifu',
    'fields'      => array(
      array(
        'type' => 'backup',
      ),
    ),
  ));
}
