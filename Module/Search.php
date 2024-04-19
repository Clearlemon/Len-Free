<?php

function Len_Search_Banner()
{
  $search_query = get_search_query();
  $search_number = get_search_query();
  // 构建搜索查询参数
  $args = array(
    'post_type' => 'post',  // 文章类型
    'posts_per_page' => -1, // 显示所有文章
    's' => $search_query,   // 搜索查询关键词
    'post_status' => 'publish' // 只查询已发布的文章
  );

  // 创建 WP_Query 实例
  $search_query = new WP_Query($args);

  // 获取搜索结果文章数量
  $search_count = $search_query->found_posts;
?>
  <!-- 文章顶部导航区块Banner开始 -->
  <!-- 搜索查询Banner开始 -->
  <div class="len-search-block">
    <div class="len-search-title">以下是关键字[<b id="search_keyword"><?php echo $search_number; ?></b>]文章，检索到的文章共有[<?php echo $search_count;
                                                                                                              wp_reset_postdata(); ?>]篇</div>
  </div>
  <!-- 搜索查询Banner结束 -->
<?php
}
