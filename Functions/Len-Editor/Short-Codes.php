<?php

/**
 * 登录可见短代码
 */
function content_hidden($atts, $content = null)
{
  // 检查用户是否处于登录状态
  $logged_in = is_user_logged_in();

  // 使用if-else语句根据登录状态输出不同内容
  if ($logged_in) {
    $output = '<div class="len-shored-codes-all len-login-hidden-block logged-in">' . do_shortcode($content) . '</div>';
  } else {
    $output = '<div class="len-shored-codes-all len-login-hidden-block not-logged-in"><i class="fa-solid fa-circle-exclamation"></i>你貌似还没有登录，不能查看这个隐藏的内容欸</div>';
  }

  return $output;
}

add_shortcode('hidden', 'content_hidden');

/**
 * 视频解析短代码
 */
function content_video_bilibili($atts, $content = null)
{
  // 构建输出内容
  $atts = shortcode_atts(array(
    'url' => '', // 设置默认标题为空
  ), $atts);


  $url = $atts['url'];


  $output = '<div class="len-shored-codes-all len-shored-codes-video len-bilbil" ><iframe src="//player.bilibili.com/player.html?bvid=' . esc_html($url) . '&page=1" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true" sandbox="allow-top-navigation allow-same-origin allow-forms allow-scripts"></iframe></div>';
  return $output;
}
add_shortcode('bilibili', 'content_video_bilibili');
//腾讯视频
function content_video_tencent($atts, $content = null)
{
  // 构建输出内容
  $atts = shortcode_atts(array(
    'url' => '', // 设置默认标题为空
  ), $atts);


  $url = $atts['url'];


  $output = '<div class="len-shored-codes-all len-shored-codes-video len-tx" ><iframe frameborder="0" src="https://v.qq.com/txp/iframe/player.html?vid=' . esc_html($url) . '&amp;auto=0" allowfullscreen="" frameborder="0"></iframe></div>';
  return $output;
}
add_shortcode('tencent', 'content_video_tencent');
//自定义视频
function content_video_leaf($atts, $content = null)
{
  // 构建输出内容
  $atts = shortcode_atts(array(
    'url' => '', // 设置默认标题为空
    'src' => '',
  ), $atts);

  $url = $atts['url'];
  $src = $atts['src'];

  $output = '<video id="len_plyr_video" class=="len-shored-codes-all len-shored-codes-video len-video" poster="' . esc_html($src) . '" data-poster="' . esc_html($src) . '"><source src="' . esc_html($url) . '"></video>';
  return $output;
}
add_shortcode('leafvideo', 'content_video_leaf');

/**
 *创建回复查看隐藏内容的短代码
 */
function cntent_reply_view($atts, $content = null)
{
  // 获取当前文章ID
  $current_post_id = get_the_ID();

  // 获取文章的作者ID
  $post_author_id = get_post_field('post_author', $current_post_id);

  // 获取当前用户ID
  $current_user_id = get_current_user_id();

  // 检查当前用户是否为文章的作者或网站管理员
  if ($current_user_id === $post_author_id || current_user_can('administrator')) {
    // 如果用户是文章的作者或网站管理员，直接显示隐藏内容
    return '<div class="len-shored-codes-all len-shored-codes-reply len-reply-in">' . $content . '</div>';
  } else {
    // 如果用户不是文章的作者或网站管理员，执行之前的判断逻辑
    $comment_args = array(
      'post_id' => $current_post_id,
      'user_id' => $current_user_id,
      'count' => true,
    );
    $comment_count = get_comments($comment_args);

    if ($comment_count > 0) {
      // 如果用户已在当前文章的评论中回复过，显示隐藏内容
      return '<div class="len-shored-codes-all len-shored-codes-reply len-reply-in">' . $content . '</div>';
    } else {
      // 如果用户没有在当前文章的评论中回复过，显示回复查看内容的提示
      return '<div class="len-shored-codes-all len-shored-codes-reply len-no-reply">请回复在评论再查看内容吧</div>';
    }
  }
}
add_shortcode('reply_view', 'cntent_reply_view');

/**
 * 密码查看内容短代码
 */
function cntent_password_viewing($atts, $content = null)
{
  // 获取传递的参数
  $atts = shortcode_atts(array(
    'key' => '',
    'illustrate' => '',
  ), $atts);

  // 检查是否提供了key参数
  if (empty($atts['key']) || !isset($atts['key'])) {
    return '请提供密码';
  }


  // 获取当前用户输入的密码
  $entered_password = isset($_POST['password']) ? sanitize_text_field($_POST['password']) : '';


  // 获取正确的密码（你可以根据自己的需求设置密码）
  $correct_password = $atts['key'];
  $illustrate = $atts['illustrate'];

  // 检查密码是否匹配
  if ($entered_password === $correct_password) {
    // 返回隐藏的内容
    return '<div class="len-shored-codes-all len-shored-codes-password-viewing password-viewing-in">' . do_shortcode($content) . '</div>';
  } else {
    // 返回密码输入框
    ob_start();
?>
    <form class="len-shored-codes-all len-shored-codes-password-viewing no-password-viewing" method="post">
      <div class="len-password-viewing-all-block">
        <div class="len-block-center">
          <label class="len-password-title" for="password">请输入密码：</label>
          <div class="len-password-input-button-block">
            <input class="len-password-input" type="password" name="password" id="password" required>
            <button class="len-password-button" type="submit" value="提交"><i class="fa-solid fa-check"></i>提交</button>
          </div>
          <div class="leaf-password-illustrate-block">
            <p class="leaf-password-illustrate-center"><?php echo esc_html($illustrate) ?></p>
          </div>
        </div>
      </div>
    </form>
<?php
    return ob_get_clean();
  }
}
add_shortcode('password_viewing', 'cntent_password_viewing');

/**
 *折叠面板内容
 */
function content_fold($atts, $content = null)
{
  // 提取短代码的属性
  $atts = shortcode_atts(array(
    'title' => '', // 设置默认标题为空
  ), $atts);

  // 获取标题
  $title = $atts['title'];

  // 构建输出内容
  $output = '<div class="len-shored-codes-all len-shored-codes-fold fold-block">';
  if ($title) {
    $output .= '<div id="flod-show" class="len-fold-title">' . esc_html($title) . '<i class="fa-solid fa-bars"></i></div>'; // 将标题添加到输出内容中
  }
  $output .= '<div id="flod-box" class="len-fold-hide-text">' . do_shortcode($content) . '</div>';
  $output .= '</div>';

  return $output;
}

add_shortcode('fold', 'content_fold');

/**
 *背景框选择
 */
function content_red_background($atts, $content = null)
{
  // 构建输出内容
  $output = '<div class="len-shored-codes-all len-shored-codes-background background-red">' . do_shortcode($content) . '</div>';
  return $output;
}
add_shortcode('redback', 'content_red_background');
//绿色背景
function content_green_background($atts, $content = null)
{
  // 构建输出内容
  $output = '<div class="len-shored-codes-all len-shored-codes-background background-green">' . do_shortcode($content) . '</div>';
  return $output;
}
add_shortcode('greenback', 'content_green_background');
//蓝色背景
function content_blue_background($atts, $content = null)
{
  // 构建输出内容
  $output = '<div class="len-shored-codes-all len-shored-codes-background background-blue">' . do_shortcode($content) . '</div>';
  return $output;
}
add_shortcode('blueback', 'content_blue_background');
//黄色背景
function content_yellow_background($atts, $content = null)
{
  // 构建输出内容
  $output = '<div class="len-shored-codes-all len-shored-codes-background background-yellow">' . do_shortcode($content) . '</div>';
  return $output;
}
add_shortcode('yellowback', 'content_yellow_background');

/**
 * 点击查看隐藏内容
 */
function content_click_view($atts, $content = null)
{
  // 构建输出内容
  $output = '<div class="len-shored-codes-all len-shored-codes-click-view click-view"><p class="len-click-view-text" >' . do_shortcode($content) . '</p></div>';
  return $output;
}
add_shortcode('click_view', 'content_click_view');
