<?php
function Len_Login_Module()
{

  if (is_user_logged_in()) {
?>
    <div id="user-login" class="len-login-avatar">
      <img class="user-avatar-login" src="http://0.gravatar.com/avatar/cb709f7b417e8dde3a152aa1e6c37721?s=96&d=mm&r=g" alt="">
    </div>
  <?php
  } else {
  ?>
    <div id="user-login" class="len-login-register">
      <i class="fa-solid fa-user"></i>
    </div>
    <div class="login-main">
      <div id="login-box" class="login-box">
        <form name="loginform" method="POST" action="<?php home_url(); ?>/wp-login.php">
          <div class="len-form-item form-username">
            <div class="len-login-username iconfont icon-atm">用户名&邮箱</div>
            <input class="len-login-input" type="text" name="log" placeholder="用户名/邮箱" size="20" required="required" />
          </div>
          <div class="len-form-item form-password">
            <div class="len-login-password iconfont icon-password">用户密码</div>
            <input class="len-login-input" type="password" name="pwd" placeholder="密码" size="20" required="required" />
          </div>
          <div class="len-form-item">
            <button class="len-login-button" type="submit" name="wp-submit">登录</button>
          </div>
        </form>
      </div>
    </div>
<?
  }
}


function Len_Login_Redirect($redirect_to, $request, $user)
{
  // 检查用户是不是管理员
  if (isset($user->roles) && is_array($user->roles) && in_array('administrator', $user->roles)) {
    // 如果是管理员，重定向到后台
    return admin_url();
  } else {
    // 如果是普通用户，重定向回当前页面
    return home_url();
  }
}
add_filter('login_redirect', 'Len_Login_Redirect', 10, 3);
