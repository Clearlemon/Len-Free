<?php

function Footer_Module($copy = true, $icp_1 = true, $icp_2 = true, $icp_3 = true, $one_word = true, $sql_search = true)
{
  $Footer_Module_4 = _len('Footer_Module_4');
  $Footer_Module_3 = _len('Footer_Module_3');
  $Footer_Module_2 = _len('Footer_Module_2');
  $Footer_Module_1 = _len('Footer_Module_1');
  if (!empty($Footer_Module_1)) {
    //萌ICP备案值
    $Footer_Module_1_1_1 = $Footer_Module_1['Footer_Module_1_1_1'];
    $Footer_Module_1_1_2 = $Footer_Module_1['Footer_Module_1_1_2'];
    $Footer_Module_1_1_3 = $Footer_Module_1['Footer_Module_1_1_3'];
    //公安ICP备案值
    $Footer_Module_1_2_1 = $Footer_Module_1['Footer_Module_1_2_1'];
    $Footer_Module_1_2_2 = $Footer_Module_1['Footer_Module_1_2_2'];
    $Footer_Module_1_2_3 = $Footer_Module_1['Footer_Module_1_2_3'];
    //ICP备案值
    $Footer_Module_1_3_1 = $Footer_Module_1['Footer_Module_1_3_1'];
    $Footer_Module_1_3_2 = $Footer_Module_1['Footer_Module_1_3_2'];
    $Footer_Module_1_3_3 = $Footer_Module_1['Footer_Module_1_3_3'];


    if ($copy == true && !empty($Footer_Module_2)) {
      echo '<div class="len-footer-web-copyright">' . $Footer_Module_2 . '</div>';
    } elseif ($icp_1 == true && $Footer_Module_1_1_1 == true) {
      echo '  <div class="len-moe-icp">
    <a href="' . $Footer_Module_1_1_3 . '">
        <svg class="len-left-footer-icp-icon" aria-hidden="true">
            <use xlink:href="#icon-moe-beian"></use>
        </svg>:' . $Footer_Module_1_1_2 . '
    </a>
</div>';
    } elseif ($icp_2 == true && $Footer_Module_1_2_1 == true) {
      echo '
    <div class="len-gov-icp">
    <a href="' . $Footer_Module_1_2_3 . '">
            <svg class="len-left-footer-icp-icon" aria-hidden="true">
                <use xlink:href="#icon-beianxinxi-ICP-gonganbeian"></use>
                </svg>:' . $Footer_Module_1_2_2 . '
        </a>
    </div>';
    } elseif ($icp_3 == true && $Footer_Module_1_3_1 == true) {
      echo '<div class="len-gov-icp">
    <a href="' . $Footer_Module_1_3_3 . '">
        <svg class="len-left-footer-icp-icon" aria-hidden="true">
            <use xlink:href="#icon-beian"></use>
            </svg>:' . $Footer_Module_1_3_2 . '
    </a>
</div>';
    } elseif ($sql_search == true && $Footer_Module_3 == true) {
      echo ' <span>数据库 ' . get_num_queries() . '次查询 |';
      return ' 用时：' . timer_stop(1, 7) . '秒 |</span>';
    } elseif ($one_word == true && $Footer_Module_4 == true) {
      return '<div class="len-on-word-source"></div><div class="len-on-word-dictum"></div>';
    }
  }
}
