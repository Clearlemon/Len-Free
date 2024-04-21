<?php

/**
 * @About: Len主题侧边栏模块
 * @Author：青桔&dmy
 * @Url： https://github.com/Clearlemon/Len-Free
 * @Time：2024-4-21
 * @Email: Len@tqlen.com
 * @Project: Len主题
 * */
function Len_Sidebar_Bottom_Module()
{
  $Sidebar_Module_1 = _len('Sidebar_Module_1');
  if (!empty($Sidebar_Module_1)) { // 修改此行，检查数组是否为空
    foreach ($Sidebar_Module_1 as $key) {
      $link = $key['Sidebar_Module_1_1'];
      $icon = $key['Sidebar_Module_1_2'];
?>
      <a class="sidebar-link-block" href="<?php echo $link; ?>">
        <span class="links-svg-block">
          <svg class="len-left-bottom-icon" aria-hidden="true">
            <use xlink:href="#<?php echo $icon; ?>"></use>
          </svg>
        </span>
      </a>
      <?php
    }
  }
}


register_sidebar(
  array(
    'name' => '左侧边栏[导航上面]', //侧边栏名称
    'id' => 'len_sidebar_left_top', //侧边栏ID
    'description' => '用于放在左侧边栏[导航上面]的小工具区块', //侧边栏描述
    'before_widget' => '<div class="animate__animated animate__slideInLeft len-sidebar-left-top">', //侧边栏前面的代码
    'after_widget' => "</div>", //侧边栏后面的代码
    'before_title' => '<h3 class="len-sidebar-left-top-title">', //侧边栏标题的前面的代码
    'after_title' => '</h3>', //侧边栏标题的后面的代码
  )
);
register_sidebar(
  array(
    'name' => '左侧边栏[导航下面]', //侧边栏名称
    'id' => 'len_sidebar_left_bottom', //侧边栏ID
    'description' => '用于放在左侧边栏[导航下面]的小工具区块', //侧边栏描述
    'before_widget' => '<div class="animate__animated animate__slideInLeft len-sidebar-left-bottom">', //侧边栏前面的代码
    'after_widget' => "</div>", //侧边栏后面的代码
    'before_title' => '<h3 class="len-sidebar-left-bottom-title">', //侧边栏标题的前面的代码
    'after_title' => '</h3>', //侧边栏标题的后面的代码
  )
);

register_sidebar(
  array(
    'name' => '右侧边栏', //侧边栏名称
    'id' => 'len_sidebar_right', //侧边栏ID
    'description' => '用于放在右侧边栏的小工具区块', //侧边栏描述
    'before_widget' => '<div class="animate__animated animate__slideInRight  len-sidebar-right">', //侧边栏前面的代码
    'after_widget' => "</div>", //侧边栏后面的代码
    'before_title' => '<h3 class="len-sidebar-left-title">', //侧边栏标题的前面的代码
    'after_title' => '</h3>', //侧边栏标题的后面的代码
  )
);


/**
 * 侧边栏设置模块
 */
if (class_exists('CSF')) {


  /**
   * 社交信息小工具
   */
  $Image_Format = '.webp';
  $Image_Url = get_template_directory_uri() . '/Assets/Len-Images/';
  $Image_Url_Admin = get_template_directory_uri() . '/Assets/Len-Images/Admin/';

  CSF::createWidget('len_linked_module', array(
    'title'       => '🍋 Len-社交小工具',
    'classname'   => 'Len_Linked_Module',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
      array(
        'id'      => 'Len_Linked_Module_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '我的社交',
      ),
      array(
        'id'     => 'Len_Linked_Module_Content',
        'type'   => 'repeater',
        'title'  => '社交信息模块',
        'button_title' => '增加社交信息',
        'max' => 10,
        'fields' => array(

          array(
            'id'    => 'Len_Linked_Module_svg',
            'type'  => 'icon',
            'title' => '图标选择',
          ),
          array(
            'id'    => 'Len_Linked_Module_text',
            'type'  => 'text',
            'title' => '文字内容',
          ),
          array(
            'id'    => 'Len_Linked_Module_link',
            'type'  => 'text',
            'title' => '链接跳转',
          ),
        ),
      ),

      array(
        'id'         => 'Len_All_Sidebar_Module_Show',
        'type'       => 'radio',
        'title'      => '选择哪个端是否显示',
        'options'    => array(
          'Show_Pc_And_Mobile' => '[PC]和[移动设备]都显示',
          'Show_Pc' => '只显示[PC]',
          'Show_PcMobile' => '只显示[移动设备]',
        ),
        'default'    => 'Show_Pc_And_Mobile',
      ),
    ),
  ));
  if (!function_exists('Len_Linked_Module')) {
    function Len_Linked_Module($args, $Linked_Module)
    {
      $Len_Linked_Module_Content = $Linked_Module['Len_Linked_Module_Content'];
      if (!empty($Len_Linked_Module_Content)) {
        echo $args['before_widget'];

        $Len_Linked_Module_title = $Linked_Module['Len_Linked_Module_title'];

        $Len_All_Sidebar_Module_Show = $Linked_Module['Len_All_Sidebar_Module_Show'];
        if ($Len_All_Sidebar_Module_Show == 'Show_Pc_And_Mobile') {
          $Show = 'sidebar-show-all';
        } elseif ($Len_All_Sidebar_Module_Show == 'Show_Pc') {
          $Show = 'sidebar-show-pc';
        } elseif ($Len_All_Sidebar_Module_Show == 'Show_Mobile') {
          $Show = 'sidebar-show-mobile';
        }
        echo '<div class="len-thirdparty ' .  $Show . '"><div class="len-sidebar-title"><p class="len-sidebar-title_block"><i class="fa-solid fa-bars"></i>' . $Len_Linked_Module_title . '</p></div><div class="len-sidebar-content">';

        //侧边栏内容值、


        foreach ($Len_Linked_Module_Content as $key) {
          $key_svg = $key['Len_Linked_Module_svg'];
          $key_text = $key['Len_Linked_Module_text'];
          $key_link = $key['Len_Linked_Module_link'];
      ?>
          <div class="len-thirdparty-line">
            <?php
            if (!empty($key_link)) {
              echo '<a href="' . $key_link . '">';
            }  ?>
            <svg class="len-thirdparty-icon" aria-hidden="true">
              <use xlink:href="#<?php echo $key_svg ?>"></use>
            </svg>
            <?php echo $key_text;
            if (empty($key_link)) {
              echo '</a>';
            }  ?>
          </div>
      <?php
        }



        echo '</div></div>';
        echo $args['after_widget'];
      }
    }
  }



  /**
   * 个人信息模块
   */
  CSF::createWidget('len_user_module', array(
    'title'       => '🍋 Len-个人信息模块',
    'classname'   => 'Len_User_Module',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
      array(
        'id'      => 'Len_User_Module_backerground',
        'type'  => 'upload',
        'preview' => true,
        'library'      => 'image',
        'title'   => '背景图[图片]',
        'default' => $Image_Url . 'user-background' . $Image_Format,
      ),
      array(
        'id'      => 'Len_User_Module_avatar',
        'type'  => 'upload',
        'preview' => true,
        'library'      => 'image',
        'title'   => '幻灯片[图片]',
        'default' => $Image_Url . 'user-avatar' . $Image_Format,
      ),
      array(
        'id'      => 'Len_User_Module_name',
        'type'  => 'text',
        'title'   => '用户名',
        'default' => '青柠',
      ),
      array(
        'id'      => 'Len_User_Module_text',
        'type'  => 'text',
        'title'   => '简介',
        'default' => '这个人很懒什么也没留下',
      ),
      array(
        'id'      => 'Len_User_Module_html',
        'type'  => 'textarea',
        'title'   => '自定义区',
      ),
      array(
        'id'         => 'Len_All_Sidebar_Module_Show',
        'type'       => 'radio',
        'title'      => '选择哪个端是否显示',
        'options'    => array(
          'Show_Pc_And_Mobile' => '[PC]和[移动设备]都显示',
          'Show_Pc' => '只显示[PC]',
          'Show_PcMobile' => '只显示[移动设备]',
        ),
        'default'    => 'Show_Pc_And_Mobile',
      ),
    ),
  ));

  if (!function_exists('Len_User_Module')) {
    function Len_User_Module($args, $User_Module)
    {

      echo $args['before_widget'];

      $Len_All_Sidebar_Module_Show = $User_Module['Len_All_Sidebar_Module_Show'];
      if ($Len_All_Sidebar_Module_Show == 'Show_Pc_And_Mobile') {
        $Show = 'sidebar-show-all';
      } elseif ($Len_All_Sidebar_Module_Show == 'Show_Pc') {
        $Show = 'sidebar-show-pc';
      } elseif ($Len_All_Sidebar_Module_Show == 'Show_Mobile') {
        $Show = 'sidebar-show-mobile';
      }
      echo '<div class="len-sidebar-content ' . $Show . '">';

      $Len_User_Module_backerground = $User_Module['Len_User_Module_backerground'];
      $Len_User_Module_avatar = $User_Module['Len_User_Module_avatar'];
      $Len_User_Module_name = $User_Module['Len_User_Module_name'];
      $Len_User_Module_text = $User_Module['Len_User_Module_text'];
      $Len_User_Module_html = $User_Module['Len_User_Module_html'];
      if (!empty($Len_User_Module_html)) {
        echo '';
      }

      ?>
      <div class="len-sidebar-user-information">
        <div class="user-background-image">
          <img class="information-background" src="<?php echo $Len_User_Module_backerground; ?>" alt="">
        </div>
        <div class="user-name-avatar">
          <div class="information-avatar">
            <img class="user-avatar" src="<?php echo $Len_User_Module_avatar; ?>" alt="">
          </div>
          <div class="user-name-word">
            <div class="user-name">
              <strong class="user-name-title"><?php echo $Len_User_Module_name; ?></strong>
            </div>

          </div>


        </div>

        <div class="user-word">
          <p class="user-word-title"><?php echo $Len_User_Module_text; ?></p>
        </div>
        <div class="user-statistics-right">
          <li class="user-statistics-li user-statistics-article">8<span class="user-statistics-span">文章</span></li>
          <li class="user-statistics-li user-statistics-comment">624<span class="user-statistics-span">评论</span></li>
          <li class="user-statistics-li user-statistics-like-none">43<span class="user-statistics-span">点赞</span></li>
        </div>

        <div>

          <?php echo $Len_User_Module_html; ?>
        </div>
      </div>
<?php

      echo '</div>';
      echo $args['after_widget'];
    }
  }

  CSF::createWidget('len_post_title_module', array(
    'title'       => '🍋 Len-文章导航目录',
    'classname'   => 'Len_Post_Title_Module',
    'description' => '此小工具只适用于文章页适用于各种页面',
    'fields'      => array(
      array(
        'id'      => 'Len_Post_Title_Module_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '导航目录',
      ),
      array(
        'id'         => 'Len_All_Sidebar_Module_Show',
        'type'       => 'radio',
        'title'      => '选择哪个端是否显示',
        'options'    => array(
          'Show_Pc_And_Mobile' => '[PC]和[移动设备]都显示',
          'Show_Pc' => '只显示[PC]',
          'Show_PcMobile' => '只显示[移动设备]',
        ),
        'default'    => 'Show_Pc_And_Mobile',
      ),
    ),
  ));
  if (!function_exists('Len_Post_Title_Module')) {
    function Len_Post_Title_Module($args, $Post_Title_Module)
    {
      if (is_single()) {
        $Len_Post_Title_Module_title = $Post_Title_Module['Len_Post_Title_Module_title'];

        $Len_All_Sidebar_Module_Show = $Post_Title_Module['Len_All_Sidebar_Module_Show'];
        if ($Len_All_Sidebar_Module_Show == 'Show_Pc_And_Mobile') {
          $Show = 'sidebar-show-all';
        } elseif ($Len_All_Sidebar_Module_Show == 'Show_Pc') {
          $Show = 'sidebar-show-pc';
        } elseif ($Len_All_Sidebar_Module_Show == 'Show_Mobile') {
          $Show = 'sidebar-show-mobile';
        }
        echo $args['before_widget'];
        echo '111' . $Len_Post_Title_Module_title;
        echo $args['after_widget'];
      } else {
        echo '';
      }
    }
  }
}
