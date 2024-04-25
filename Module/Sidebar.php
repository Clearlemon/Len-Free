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
        echo '<div class="len-thirdparty ' .  $Show . '">
        <div class="len-sidebar-title"><p class="len-sidebar-title_block">
        <i class="fa-solid fa-bars"></i>' . $Len_Linked_Module_title . '</p>
        </div>
        <div class="len-sidebar-content">';

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



        echo '</div>
        </div>';
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
      $Len_Post_Counts = wp_count_posts();
      $Len_Comment_Count = wp_count_comments();


      if (!empty($Len_User_Module_html)) {
        echo '';
      }

      $Len_Like_Count = 0;

      // 构建一个查询以获取所有文章
      $link_args = array(
        'post_type' => 'post', // 文章类型
        'posts_per_page' => -1, // 获取所有文章
        'post_status' => 'publish', // 只获取已发布的文章
      );

      $query = new WP_Query($link_args);

      // 检查是否有文章
      if ($query->have_posts()) {
        // 循环遍历文章
        while ($query->have_posts()) {
          $query->the_post();

          // 获取当前文章的ID
          $post_id = get_the_ID();

          // 获取当前文章的点赞数量
          $likes = get_post_meta($post_id, 'bigfa_ding', true);

          // 如果点赞数量不为空，则将其加到总数中
          if (!empty($likes)) {
            $Len_Like_Count += intval($likes);
          }
        }

        // 重置文章查询
        wp_reset_postdata();
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
          <li class="user-statistics-li user-statistics-article"><?PHP echo $Len_Post_Counts->publish; ?><span class="user-statistics-span">文章</span></li>
          <li class="user-statistics-li user-statistics-comment"><?php echo $Len_Comment_Count->total_comments; ?><span class="user-statistics-span">评论</span></li>
          <li class="user-statistics-li user-statistics-like-none"><?php echo $Len_Like_Count ?><span class="user-statistics-span">点赞</span></li>
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
    'description' => '此小工具只适用于文章页',
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
      ?>
        <div class="len-pos-nav-int-min">
          <div class="len-pos-nav-title"><i class="fa-solid fa-plus"></i><?php echo $Len_Post_Title_Module_title; ?> </div>
          <div class="len-toc">
          </div>
        </div>
      <?php
        echo $args['after_widget'];
      } else {
        echo '';
      }
    }
  }


  CSF::createWidget('len_time_module', array(
    'title'       => '🍋 Len-粒子跳动时间',
    'classname'   => 'Len_Time_Module',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
      array(
        'id'      => 'Len_Time_Module_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '粒子跳动时间',
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
  if (!function_exists('Len_Time_Module')) {
    function Len_Time_Module($args, $Time_Module)
    {

      $Len_Time_Module_title = $Time_Module['Len_Time_Module_title'];

      $Len_All_Sidebar_Module_Show = $Time_Module['Len_All_Sidebar_Module_Show'];
      if ($Len_All_Sidebar_Module_Show == 'Show_Pc_And_Mobile') {
        $Show = 'sidebar-show-all';
      } elseif ($Len_All_Sidebar_Module_Show == 'Show_Pc') {
        $Show = 'sidebar-show-pc';
      } elseif ($Len_All_Sidebar_Module_Show == 'Show_Mobile') {
        $Show = 'sidebar-show-mobile';
      }
      echo $args['before_widget'];
      ?>
      <div class="len-pos-nav-int-min">
        <div class="len-pos-nav-title"><i class="fa-solid fa-calendar-days"></i><?php echo $Len_Time_Module_title; ?> </div>
        <canvas class="sidebar-time" id="canvas" style="width: 100%;" height="100" width="700"></canvas>
      </div>
    <?php
      echo $args['after_widget'];
    }
  }

  CSF::createWidget('len_post_module', array(
    'title'       => '🍋 Len-文章聚合',
    'classname'   => 'Len_Post_Module',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
      array(
        'id'      => 'Len_Post_Module_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '文章聚合',
      ),
      array(
        'id'          => 'Len_Post_Mode',
        'type'        => 'select',
        'title'       => '文章展示模式',
        'options'     => array(
          'Len_Post_Mode_1'  => '最新文章',
          'Len_Post_Mode_2'  => '随机文章',
          'Len_Post_Mode_3'  => '热门文章',
          'Len_Post_Mode_4'  => '喜欢文章',
        ),
        'default'     => 'Len_Post_Mode_1'
      ),
      array(
        'id'          => 'Len_Post_Number',
        'type'        => 'number',
        'title'       => '显示篇数',
        'unit'        => '篇',
        'default'     => 10,
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

  if (!function_exists('Len_Post_Module')) {
    function Len_Post_Module($args, $Post_Module)
    {

      $Len_Post_Module_title = $Post_Module['Len_Post_Module_title'];

      $Len_All_Sidebar_Module_Show = $Post_Module['Len_All_Sidebar_Module_Show'];
      if ($Len_All_Sidebar_Module_Show == 'Show_Pc_And_Mobile') {
        $Show = 'sidebar-show-all';
      } elseif ($Len_All_Sidebar_Module_Show == 'Show_Pc') {
        $Show = 'sidebar-show-pc';
      } elseif ($Len_All_Sidebar_Module_Show == 'Show_Mobile') {
        $Show = 'sidebar-show-mobile';
      }
      // $Len_Post_Mode = $Post_Module['Len_Post_Mode'];
      $Len_Post_Number = $Post_Module['Len_Post_Number'];

      echo $args['before_widget'];
    ?>
      <div class="len-pos-nav-int-min <?php echo $Show; ?>">
        <div class="len-pos-nav-title ">
          <i class="fa-solid fa-calendar-days"></i><?php echo $Len_Post_Module_title; ?>
        </div>
        <?php
        $Len_Post_Mode = $Post_Module['Len_Post_Mode'];
        if ($Len_Post_Mode == 'Len_Post_Mode_1') {
          //输出最新的文章内容
          $sidebar_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $Len_Post_Number, // 输出最新的8篇文章
            'post_status'    => 'publish', // 只查询发布状态的文章
            'orderby'        => 'date', // 按照发布日期排序
            'order'          => 'DESC', // 降序排列，即最新的文章排在前面
            'post__not_in'   => get_option('sticky_posts'),
          );
        } elseif ($Len_Post_Mode == 'Len_Post_Mode_2') {
          //随机输出文章内容
          $sidebar_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $Len_Post_Number, // 输出8篇文章
            'post_status'    => 'publish', // 只查询发布状态的文章
            'orderby'        => 'rand', // 随机排序
            'post__not_in'   => get_option('sticky_posts'), // 排除置顶文章
          );
        } elseif ($Len_Post_Mode == 'Len_Post_Mode_3') {
          // 浏览量排序文章
          $sidebar_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $Len_Post_Number, // 输出最新的8篇文章
            'post_status'    => 'publish', // 只查询发布状态的文章
            'orderby'        => 'meta_value_num', // 按照浏览次数排序
            'meta_key'       => 'views', // 使用浏览次数作为排序依据
            'order'          => 'DESC', // 降序排列，即浏览量高的文章排在前面
            'post__not_in'   => get_option('sticky_posts'),
          );
        } elseif ($Len_Post_Mode == 'Len_Post_Mode_4') {
          //点赞数量排列
          $sidebar_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $Len_Post_Number, // 输出最新的8篇文章
            'post_status'    => 'publish', // 只查询发布状态的文章
            'orderby'        => 'meta_value_num', // 按照点赞数量排序
            'meta_key'       => 'bigfa_ding', // 使用点赞数量作为排序依据
            'order'          => 'DESC', // 降序排列，即点赞数量多的文章排在前面
            'post__not_in'   => get_option('sticky_posts'),
          );
        }






        $query = new WP_Query($sidebar_args);

        // 检查是否有点赞数量多的文章
        if ($query->have_posts()) :
          $post_number = 1;
          // 循环输出点赞数量多的文章
          while ($query->have_posts()) : $query->the_post();
            Len_Sidebar_Pots_Module($post_number);
            $post_number++;
          endwhile;
          // 重置查询
          wp_reset_postdata();
        endif;

        ?>
      </div>
    <?php

      echo $args['after_widget'];
    }
  }

  CSF::createWidget('len_sidebar_comments_module', array(
    'title'       => '🍋 Len-最新评论',
    'classname'   => 'Len_Sidebar_Comments_Module',
    'description' => '此小工具适用于各种页面',
    'fields'      => array(
      array(
        'id'      => 'Len_Sidebar_Comments_Module_title',
        'type'    => 'text',
        'title'   => '小工具标题名称',
        'default' => '文章聚合',
      ),
      array(
        'id'          => 'Len_Sidebar_Comments_Number',
        'type'        => 'number',
        'title'       => '显示篇数',
        'unit'        => '篇',
        'default'     => 10,
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

  if (!function_exists('Len_Sidebar_Comments_Module')) {
    function Len_Sidebar_Comments_Module($args, $Comments_Module)
    {

      $Len_Sidebar_Comments_Module_title = $Comments_Module['Len_Sidebar_Comments_Module_title'];

      $Len_All_Sidebar_Module_Show = $Comments_Module['Len_All_Sidebar_Module_Show'];
      if ($Len_All_Sidebar_Module_Show == 'Show_Pc_And_Mobile') {
        $Show = 'sidebar-show-all';
      } elseif ($Len_All_Sidebar_Module_Show == 'Show_Pc') {
        $Show = 'sidebar-show-pc';
      } elseif ($Len_All_Sidebar_Module_Show == 'Show_Mobile') {
        $Show = 'sidebar-show-mobile';
      }
      $Len_Sidebar_Comments_Number = $Comments_Module['Len_Sidebar_Comments_Number'];

      echo $args['before_widget'];
    ?>
      <div class="len-pos-nav-int-min <?php echo $Show; ?>">
        <div class="len-pos-nav-title ">
          <i class="fa-solid fa-comment"></i><?php echo $Len_Sidebar_Comments_Module_title; ?>
        </div>

        <?php
        $comments_args = array(
          'number'      => $Len_Sidebar_Comments_Number, // 获取的评论数量
          'status'      => 'approve', // 仅获取已审核的评论
          'post_status' => 'publish', // 仅获取已发布的文章评论
          'order'       => 'DESC', // 按照时间降序排列
          'orderby'     => 'comment_date', // 按照评论日期排序
        );

        $comments = get_comments($comments_args);

        if ($comments) {
          foreach ($comments as $comment) {
            // 输出评论者名称
        ?>
            <div class="len-sidebar-block-min">
              <div class="sidebar-comments-avatar-blcok">
                <img class="comments-avatar-sidebar" src="<?php echo get_avatar_url($comment->comment_author_email); ?>" alt="">
              </div>
              <div class="sidebar-comments-contents-blcok-min">
                <div class="comments-time-name-sidebar"><span class="name-comments-sidebar"><?php if(empty($comment->comment_author)){ echo '匿名用户';} echo $comment->comment_author ; ?></span><span class="time-comments-sidebar"><?php echo $comment->comment_date; ?></span></div>
                <div class="comments-contents-sidebar">
                  <?php echo Len_Links_ALL_Module(array('href' => get_comment_link($comment->comment_ID), 'content' => '<p class="comments-contents-sidebar-p">' . $comment->comment_content . '</p>', 'data-fancybox' => '', 'class' => array('len-sidebar-comments sidebar-link-all'), 'title' => get_the_title($comment->comment_post_ID), 'id' => '',)); ?>

                </div>
              </div>
            </div>
        <?php
          }
        }

        ?>
      </div>
  <?php

      echo $args['after_widget'];
    }
  }
}



function Len_Sidebar_Pots_Module($post_number)
{

  $Post_ID = get_the_ID();
  $Title = get_the_title();
  $Thumbnail = Len_Get_Img(array('src' => Len_Lazy_Thumbnail(), 'alt' => $Title, 'data-src' => Len_Thumbnail_Module($Post_ID), 'class' => array('thumbnail-background-min', 'lazy'), 'id' => '',));
  if (empty($Title)) {
    $Title = '这篇文章作者没写标题';
  }
  $Link = get_permalink();
  ?>
  <div class="len-polymerization-top">
    <div class="sidebar-top-blcok">
      <div class="sidebar-top-min"><?php echo $post_number; ?></div>
    </div>
    <!-- 图片 -->
    <div class="len-polymerization-pic">
      <?php echo Len_Links_ALL_Module(array('href' => $Link, 'content' => $Thumbnail, 'data-fancybox' => '', 'class' => array('len-sidebar-link sidebar-link-all'), 'id' => '',)); ?>
    </div>
    <!-- 文字 -->
    <div class="len-polymerization-txt">
      <?php echo Len_Links_ALL_Module(array('href' => $Link, 'content' => $Title, 'data-fancybox' => '', 'class' => array('len-sidebar-link sidebar-link-all'), 'id' => '',)); ?>
      <!-- 标签 -->
      <div class="">
        <?php echo Len_Links_ALL_Module(array('href' => $Link, 'content' =>  ' <i class="fa-regular fa-folder"></i>' . Len_Parent_Category_Module($Post_ID, true, false, false), 'data-fancybox' => '', 'class' => array('len-sidebar-link sidebar-cat sidebar-link-all'), 'id' => '',)); ?>
      </div>
    </div>

  </div>
<?php
}
