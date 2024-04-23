<?php
// 获取链接分类
function Len_Links_Module()
{

  $bookmark_categories = get_terms('link_category');

  // 检查是否有分类
  if ($bookmark_categories) {
    // 遍历分类
    foreach ($bookmark_categories as $category) {
      echo '<h2 class="len-link-cat-h3">' . $category->name . '</h2>';
      echo '<div class="len-link-content">';

      // 获取当前分类下的链接
      $bookmarks = get_bookmarks(array(
        'category' => $category->term_id,
      ));

      // 检查当前分类下是否有链接
      if ($bookmarks) {
        // 遍历链接并输出详细信息
        foreach ($bookmarks as $bookmark) {
          // 检查链接是否为私密
          $is_private = get_post_meta($bookmark->link_id, 'is_private', true);
          if (empty($is_private) || $is_private != 'true') {
?>
            <div class="len-link-url">
              <div class="len-link-information">
                <div class="len-link-cardbody">
                  <div class="len-link-detailed">
                    <div class="len-link-api-img">
                      <img src="<?php echo $bookmark->link_image ?>" alt="Image">
                    </div>
                    <div class="len-link-website-info">
                      <div class="len-link-website-title">
                        <a href="<?php echo $bookmark->link_url ?>" title="大绵羊博客" target="<?php echo $bookmark->link_target ?>"><strong><?php echo $bookmark->link_name ?></strong></a>
                      </div>
                      <p class="len-link-introduce"><?php echo $bookmark->link_description ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      <?php
          }
        }
      }
      echo '</div>';
    }
  }

  $all_bookmarks = get_bookmarks(); // 获取所有链接

  if ($all_bookmarks) {
    echo '<h2 class="len-link-cat-h3">未分类</h2>';
    echo '<div class="len-link-content">';
    foreach ($all_bookmarks as $bookmark) {
      // 获取当前链接的分类
      $categories = wp_get_object_terms($bookmark->link_id, 'link_category', array('fields' => 'ids'));

      // 如果链接没有分类，则输出
      if (empty($categories)) {
        // 输出链接信息
        echo '<div class="len-link-url">
              <div class="len-link-information">
                <div class="len-link-cardbody">
                  <div class="len-link-detailed">
                    <div class="len-link-api-img">
                      <img src="' . $bookmark->link_image . '" alt="Image">
                    </div>
                    <div class="len-link-website-info">
                      <div class="len-link-website-title">
                        <a href="' . $bookmark->link_url . '" title="大绵羊博客" target="' . $bookmark->link_target . '"><strong>' . $bookmark->link_name . '</strong></a>
                      </div>
                      <p class="len-link-introduce">' . $bookmark->link_description . '</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
      }
    }
    echo '</div>';
  }
}


function Len_Links_Submit_Module($php = true, $html  = true)
{
  if (is_page_template('PageTemplates/Links.php')) {
    $Links_Module_2 = _len('Links_Module_2');
    if ($php == true && $Links_Module_2 == true) {
      if (isset($_POST['blink_form']) && $_POST['blink_form'] == 'send') {
        global $wpdb;

        // 表单变量初始化
        $link_name = isset($_POST['blink_name']) ? trim(htmlspecialchars($_POST['blink_name'], ENT_QUOTES)) : '';
        $link_url = isset($_POST['blink_url']) ? trim(htmlspecialchars($_POST['blink_url'], ENT_QUOTES)) : '';
        $link_image = isset($_POST['blink_image']) ? trim(htmlspecialchars($_POST['blink_image'], ENT_QUOTES)) : ''; // 获取图片链接
        $link_description = isset($_POST['blink_jianjie']) ? trim(htmlspecialchars($_POST['blink_jianjie'], ENT_QUOTES)) : ''; // 获取简介
        $link_target = "_blank";
        $link_visible = "N"; // 设置链接为私密

        // 表单项数据验证
        if (empty($link_name) || mb_strlen($link_name) > 20 || empty($link_url) || strlen($link_url) > 60 || !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $link_url)) {
          wp_redirect(get_permalink());
          exit();
        }

        // 插入数据
        $sql_link = $wpdb->insert(
          $wpdb->links,
          array(
            'link_name' => $link_name,
            'link_url' => $link_url,
            'link_target' => $link_target,
            'link_image' => $link_image, // 将图片链接存储到链接设置中的图片地址
            'link_description' => $link_description, // 将简介存储到链接设置中的描述
            'link_visible' => $link_visible // 设置链接为私密
          )
        );

        // 检查是否插入成功
        if ($sql_link) {
          // 插入成功后重定向到另一个页面或同一页面的不带POST数据的版本
          wp_redirect(get_permalink());
          exit();
        }
      }
    } elseif ($html == true && $Links_Module_2 == true) {
      ?>
      <div class="len-links-submit-block">
        <!--表单开始-->
        <form method="post" class="mt20" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" style="margin-bottom:20px; ">

          <div class="form-group">
            <label for="blink_name">
              名称
            </label>
            <input type="text" size="40" value="" class="form-control" id="blink_name" placeholder="请输入链接名称" name="blink_name" />
          </div>

          <div class="form-group">
            <label for="blink_url">
              链接
            </label>
            <input type="text" size="40" value="" class="form-control" id="blink_url" placeholder="请输入链接，带http://或https://哦！" name="blink_url" />
          </div>

          <div class="form-group">
            <label for="blink_image">
              头像
            </label>
            <input type="text" size="40" value="" class="form-control" id="blink_image" placeholder="请输入头像地址" name="blink_image" />
          </div>

          <div class="form-group">
            <label for="blink_jianjie">
              简介
            </label>
            <input type="text" size="40" value="" class="form-control" id="blink_jianjie" placeholder="请输入简介" name="blink_jianjie" />
          </div>

          <div class="button-blcok">
            <input type="hidden" value="send" name="blink_form" />
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>提交申请</button>
            <button type="reset" class="btn btn-default"><i class="fa-solid fa-arrow-rotate-right"></i>重填</button>
          </div>
        </form>
      </div>
      <!--表单结束-->

<?php
    }
  }
}
