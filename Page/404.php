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
        <!-- 文章展示模块开始 -->
        <section class="animate__bounceIn len-top-404">
          <div class="page-content">

            <img src="<?php echo get_template_directory_uri(); ?>/Assets/Len-Images/404.svg" alt="404 Image">

            <!-- <img style="padding-top: 50px;" echo get_template_directory_uri() . '/Assets/Len-Images/404.svg';"> -->

            <div class="error-404">
              <h1>404 呜呜呜 页面已走丢</h1>
              <p>当前页面已丢失 或者是可恶的站长不想让你康</p>
              <p>或者随便点击上面的链接吧 </p>
            </div>
            <div style="padding-top: 50px;"> </div>
          </div><!-- .page-content -->
        </section>
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

</main>
<style>
  .len-top-404 {
    background: #fff;
    min-height: 500px;
    border-radius: 15px;
  }
  .error-404 h1 {
    font-size: 20px;
    margin: 26px 0 16px;
    font-weight: 600;
    text-align: center;
  }
  .error-404 p {
    text-align: center;
    margin-bottom: 5px;
  }
  .page-content img {
    width: 100%;
  }
</style>