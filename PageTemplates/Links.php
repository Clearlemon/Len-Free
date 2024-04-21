<?php
/*
Template Name: Link【友联页面】
*/

/**
 * wp_footer(); @引用Wordpress自带的顶部样式文件
 */
wp_head(); ?>
<main class="len-body-main len-body-m">
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
      <div class="len-showcase-main">
        <!-- 友链开始 -->
        <div class="len-link-content">
                  <!-- NO:1 -->
          <div class="len-link-url">
              <div class="len-link-information">
                  <div class="len-link-cardbody">
                      <div class="len-link-detailed">
                          <div class="len-link-api-img">
                            <!-- 这里是公司的网站获取 -->
                              <img src="http://api.yangjuantech.com/favicon/get.php?url=dmyblog.cn" alt="Image">
                          </div>
                          <div class="len-link-website-info">
                              <div class="len-link-website-title">
                                <a href="https://dmyblog.cn/" title="大绵羊博客" target="_blank"><strong>大绵羊博客</strong></a>
                              </div>
                              <p class="len-link-introduce">有幸遇见，恰巧合拍</p> <!-- 移除了不必要的类 -->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- NO:2 -->
          <div class="len-link-url">
            <div class="len-link-information">
                <div class="len-link-cardbody">
                    <div class="len-link-detailed">
                        <div class="len-link-api-img">
                          <!-- 这里是公司的网站获取 -->
                            <img src="http://api.yangjuantech.com/favicon/get.php?url=dmyblog.cn" alt="Image">
                        </div>
                        <div class="len-link-website-info">
                            <div class="len-link-website-title">
                              <a href="https://dmyblog.cn/" title="大绵羊博客" target="_blank"><strong>大绵羊博客</strong></a>
                            </div>
                            <p class="len-link-introduce">有幸遇见，恰巧合拍</p> <!-- 移除了不必要的类 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
      </div>
      

        <!-- 友链结束 -->
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

</main>
