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
    ?> <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div  class="len-showcase-main">
          <!-- 文章展示模块开始 -->
          <div class="len-article-min-blcok">
            <div class="len-article-block-min">
              <div class="len-article-showcase-main">
                <div class="len-article-title-min">
                  <h1 class="len-article-title-block"><?php the_title(); ?></h1>
                </div>

                <div class="len-article-showcase-content">

                  <?php the_content(); ?>


                </div>

              </div>

            </div>
          </div>

      <?php

            endwhile;
          endif; ?>
      <!-- 互动模块开始 -->
      <div class="len-article-mutual-min">

      </div>
      <!-- 互动模块结束 -->
      <!-- 评论模块开始 -->
      <?php
      /**
       * 引用评论样式
       * require_once get_theme_file_path('comments.php');
       * 评论模块样式文件目录
       */
      if (comments_open()) {
        comments_template();
      }
      ?>
      <!-- 评论模块结束 -->
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