<?php
/*
Template Name: Link【友联页面】
*/
?>
<?php
Len_Links_Submit_Module(true, false)
?>
<?php

/**
 * wp_footer(); @引用Wordpress自带的顶部样式文件
 */

wp_head();


?>

  <?php
  /**
   * 引用底部样式
   * require_once get_theme_file_path('Page/Len-Block/Header.php');
   * Logo栏目模块样式文件目录
   */
  require_once get_theme_file_path('Page/Len-Block/Header.php');
  ?>
  <div id="len-content" class="len-content">
    <div class="len-content-min">
      <?php
      /**
       * 引用底部样式
       * require_once get_theme_file_path('Sidebars/Left-Sidebars.php');
       * 左侧边栏模块样式文件目录
       */
      require_once get_theme_file_path('Sidebars/Left-Sidebars.php');
      ?>
        <div style="width:<?php
                            $Home_Module_6_2 = _len('Home_Module_6_2');
                            if (empty($Home_Module_6_2)) {
                                $Home_Module_6_2 = "20";
                            }
                            echo $Home_Module_6_2;
                            ?>%;" class="len-showcase-main">
        <!-- 友链开始 -->
        <div class="len-link-block-cat animate__animated animate__fadeIn">

          <div class="lenk-content-main">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                the_content();
              endwhile;
            endif;
            Len_Links_Submit_Module(false, true)
            ?>

          </div>

          <?php if (function_exists('cmp_breadcrumbs')) cmp_breadcrumbs(); ?>




          <div class="len-links-block-main">
            <?php
            $Links_Module_1 = _len('Links_Module_1');
            if ($Links_Module_1 == true) {
              Len_Links_Module();
            } ?>
          </div>

        </div>


        <!-- 友链结束 -->
        <?php
        if (comments_open()) {
          comments_template();
        }
        ?>
      </div>

      <?php
      /**
       * 引用右侧边栏样式
       * require_once get_theme_file_path('Sidebars/Right-Sidebars.php');
       * 右侧边栏模块样式文件目录
       */
      require_once get_theme_file_path('Sidebars/Right-Sidebars.php');
      ?>
    </div>
  </div>
  </div>
  <?php
  /**
   * 引用底部样式
   * require_once get_theme_file_path('Page/Len-Block/Footer.php');
   * 底部模块样式文件目录
   */
  require_once get_theme_file_path('Page/Len-Block/Footer.php');


  /**
   * wp_footer(); @引用Wordpress自带的底部样式文件
   */
  wp_footer();
  ?>

