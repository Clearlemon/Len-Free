<?php
/*Template Name: 用户登录*/
?>
<?php
wp_head();
?>

<style>
  body {
    overflow: hidden;
  }

  .progress-wrap,
  .active-progress {
    display: none !important;
  }
</style>

<body>
  <?php
  if (is_user_logged_in()) {
    if (current_user_can('level_10')) {
      wp_redirect(home_url() . '/wp-admin', 302);
    } else {
      wp_redirect(home_url(), 302);
    }
  } else ?>
  <?php get_header(); ?>
  <div class="login-page">
    <div class="login-main">
      <img class="login-img" src="<?php echo get_template_directory_uri(); ?>/inc/random-img.php" alt="login">
      <div class="login-msg">
        <div class="login-box">
          <h2>欢迎回来！</h2>
          <div class="des">Welcome back!</div>
          <p style="color:#D43030">
            <?php
            $login = (isset($_GET['login'])) ? $_GET['login'] : 0;
            if ($login === "failed") {
              echo '用户名或密码错误！';
            }
            ?>
          </p>
          <form name="loginform" method="POST" action="<?php home_url(); ?>/wp-login.php">
            <div class="form-item form-username">
              <span class="iconfont icon-atm"></span>
              <input type="text" name="log" placeholder="用户名/邮箱" size="20" required="required" />
            </div>
            <div class="form-item form-password">
              <span class="iconfont icon-password"></span>
              <input type="password" name="pwd" placeholder="密码" size="20" required="required" />
            </div>
            <div class="form-item form-remember" style="display:none">
              <input name="rememberme" type="checkbox" value="forever" checked="checked" />
            </div>
            <div class="form-other">

              echo '<span>还没有账户？<a href="' . home_url() . '/register">立即注册</a></span>';

              echo '<span><a href="' . home_url() . '/forget">找回密码</a></span>';

            </div>
            <div class="form-item">
              <button type="submit" name="wp-submit">登录</button>
            </div>
          </form>
          <!-- <div class="login-third">
                        <div class="hr-line"><hr><p>第三方登录</p><hr></div>
                        <div class="qqlogin"><a href="#"><img src="<?php //echo i_static();
                                                                    ?>/images/qq.png" alt=""></a></div>
                    </div> -->
        </div>
      </div>
    </div>
  </div>
  <a class="down-link" href="链接"><button style="padding: 5px;border: none;background: #e0e1e1;border-radius: 5px;font-size: 12px;"><i style="padding: 0px 5px;" class="fa-solid fa-download"></i>下载链接</button></a>
</body>
<style>
  <?php
  wp_footer();
  ?>
</style>

</html>