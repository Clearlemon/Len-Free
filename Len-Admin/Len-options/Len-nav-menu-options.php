<?php if (!defined('ABSPATH')) {
  die;
}

$Module = 'Len_Nav';

CSF::createNavMenuOptions($Module, array(
  'data_type' => 'nav_1'
));

CSF::createSection($Module, array(
  'fields' => array(
    array(
      'id'         => 'Nav_Module_1',
      'type'       => 'button_set',
      'title'      => '默认特色图选择设置',
      'class' => ' fields_no_padding-top',
      'options'    => array(
        'icon_1'  => '自定义图标',
        'icon_2' => 'fontawesome',
        'icon_3' => '阿里巴巴',
      ),
      'default'    => 'icon_1'

    ),
    array(
      'id'    => 'Nav_Module_1_1',
      'type'  => 'text',
      'title' => '自定义图标',
      'dependency' => array('Nav_Module_1', '==', 'icon_1'),
    ),
    array(
      'id'    => 'Nav_Module_1_2',
      'type'  => 'text',
      'title' => 'fontawesome',
      'dependency' => array('Nav_Module_1', '==', 'icon_2'),
    ),
    array(
      'id'    => 'Nav_Module_1_3',
      'type'  => 'text',
      'title' => '阿里图标',
      'dependency' => array('Nav_Module_1', '==', 'icon_3'),
    ),
  )
));
