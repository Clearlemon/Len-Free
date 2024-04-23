<?php if (!defined('ABSPATH')) {
  die;
}

//菜单导航设置
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
      'id'    => 'Nav_Module_2_1',
      'type'  => 'text',
      'title' => '自定义图标',
      'dependency' => array('Nav_Module_1', '==', 'icon_1'),
    ),
    array(
      'id'    => 'Nav_Module_2_2',
      'type'  => 'icon',
      'title' => 'fas|阿里图标库',
      'dependency' => array('Nav_Module_1', 'any', 'icon_2,icon_3'),
      'desc'     => '不选择则不输出内容这里<b class="Len_emphasis_fonts">【推荐SVG】</b>来做图标</br>',
    ),
  )
));
