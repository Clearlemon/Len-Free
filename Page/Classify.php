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
    <div s class="len-showcase-main">
      <!-- 文章顶部导航区块Banner开始 -->
      <?php
      /**
       * 引用顶部导航栏样式
       * require_once get_theme_file_path('Page/Len-Block/Nav.php');
       * 顶部导航栏模块样式文件目录
       */
      require_once get_theme_file_path('Page/Len-Block/Nav.php');
      ?>
      <!-- 文章顶部导航区块Banner开始 -->
      <!-- -->
      <!-- 分类头部展示块开始 -->
      <?php
      Classify_Banner_Open_Module(get_queried_object_id())
      ?>
      <!-- 分类头部展示块结束 -->
      <!-- 文章展示模块开始 -->
      <div id="pots-ajax-min" class="len-showcase-post-block-main">
        <?php Len_Article_Showcase();   ?>
      </div>
      <?php
      Len_Post_Page_Tradition_Ajax(get_queried_object());

      ?>
      <!-- 文章展示模块结束 -->
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
?>