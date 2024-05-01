<div  class="len-left-sidebar">

    <?php
    $Sidebar_Stickup_Module_1 = _len('Sidebar_Stickup_Module_1');
    if ($Sidebar_Stickup_Module_1 == true) {
        $Stickup = '<div id="sidebar" class="sidebar">';
    } else {
        $Stickup = '';
    }

    echo $Stickup;
    ?>
    <div class="sidebar__inner">
        <?php
        dynamic_sidebar('len_sidebar_left_top');
        Len_Nav_Module(false, true);
        if (current_user_can('manage_options')) {
            $link = '/wp-admin';
        } else {
            $link = '/wp-login.php';
        }
        dynamic_sidebar('len_sidebar_left_bottom');
        ?>

    </div>
    <?php
    if ($Sidebar_Stickup_Module_1 == false) {
    ?>
        <div class="len-sidebar-links">
            <div class="links-display">

                <?php Len_Sidebar_Bottom_Module();
                ?>
                <a class="sidebar-link-block" href="<?php echo $link; ?>">
                    <span class="links-svg-block">
                        <svg class="len-left-bottom-icon" aria-hidden="true">
                            <use xlink:href="#icon-set-up-dot"></use>
                        </svg>
                    </span>
                </a>
            </div>
            <?php
            if ($Sidebar_Stickup_Module_1 == true) {
                $Stickup = '</div>';
            } else {
                $Stickup = '';
            }

            echo $Stickup;
            ?>
        </div>
    <?php
    }
    ?>
</div>
<?php
if ($Sidebar_Stickup_Module_1 == true) {
?>
    <div class="len-sidebar-links">
        <div class="links-display">

            <?php Len_Sidebar_Bottom_Module();
            ?>
            <a class="sidebar-link-block" href="<?php echo $link; ?>">
                <span class="links-svg-block">
                    <svg class="len-left-bottom-icon" aria-hidden="true">
                        <use xlink:href="#icon-set-up-dot"></use>
                    </svg>
                </span>
            </a>
        </div>
        <?php
        if ($Sidebar_Stickup_Module_1 == true) {
            $Stickup = '</div>';
        } else {
            $Stickup = '';
        }

        echo $Stickup;
        ?>
    </div>
<?php
}
?>