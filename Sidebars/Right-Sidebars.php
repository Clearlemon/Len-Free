<div style="width:<?php
                    $Home_Module_6_2 = _len('Home_Module_6_2');
                    if (empty($Home_Module_6_2)) {
                        $Home_Module_6_2 = "20";
                    } else {
                        $Home_Module_6_2 = (95 - $Home_Module_6_2) / 2;
                    }
                    echo $Home_Module_6_2; ?>%;" class="len-left-sidebar">
    <?php
    $Sidebar_Stickup_Module_1 = _len('Sidebar_Stickup_Module_1');
    if ($Sidebar_Stickup_Module_1 == true) {
        $Stickup = '<div id="sidebar2" class="sidebar2">';
    } else {
        $Stickup = '';
    }

    echo $Stickup;

    echo $Stickup;
    ?>

    <!-- 日期小工具开始 -->
    <div class="sidebar__inner">
        <?php dynamic_sidebar('len_sidebar_right'); ?>
    </div>
</div>
</div>