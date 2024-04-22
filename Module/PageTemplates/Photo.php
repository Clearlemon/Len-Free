<?php
function Len_Photo_Showcase()
{

  $Photo_post_max = _len('Photo_Module_1');

  // 获取当前页数
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  // 构建 WP_Query 参数
  $args = array(
    'post_type'      => 'photo', // 假设你要输出的是博客文章，如果是其他类型需要修改
    'posts_per_page' => $Photo_post_max, // 使用后台设置的博客页面至多显示数量
    'paged'          => $paged, // 指定当前页数
  );

  // 查询文章
  $blog_query = new WP_Query($args);

  // 输出文章
  if ($blog_query->have_posts()) :
    while ($blog_query->have_posts()) : $blog_query->the_post();
      // 输出文章内容，例如标题和摘要
      Len_photo_article();
    endwhile;

    // 重置查询
    wp_reset_postdata();
  endif;
}

function Len_photo_article()
{
  //获取文章ID
  $Post_ID = get_the_ID();
  //获取文章标题
  $Title = get_the_title();
  //获取文章特色图

  //获取文章用户ID以及信息
  $Author_ID = get_post_field('post_author', $Post_ID);
  $User = get_user_by('ID', $Author_ID);
  $User_name = $User->display_name;
  $Thumbnail = Len_Get_Img(array('src' => Len_Lazy_Thumbnail(), 'alt' =>  $User_name, 'data-src' => Len_Thumbnail_Module($Post_ID), 'class' => array('lazy'), 'id' => '',));
?>
  <div class="len-waterfall-content">
    <a data-source="<?php echo $Title; ?>" data-fancybox="gallery" href="<?php echo $Thumbnail; ?>">
      <?php echo $Thumbnail;  ?>
    </a>
  </div>
<?
}
