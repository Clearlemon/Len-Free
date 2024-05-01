<div  class="len-right-sidebar">
    <?php
    $Sidebar_Stickup_Module_1 = _len('Sidebar_Stickup_Module_1');
    if ($Sidebar_Stickup_Module_1 == true) {
        $Stickup = '<div id="sidebar2" class="sidebar2">';
    } else {
        $Stickup = '';
    }

    echo $Stickup;

    ?>

    <!-- 日期小工具开始 -->
    <div class="sidebar__inner">
        <?php dynamic_sidebar('len_sidebar_right'); ?>
    </div>
</div>
</div>