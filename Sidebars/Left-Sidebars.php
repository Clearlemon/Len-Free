<div class="len-left-sidebar">
    <div class="len-sidebar-user-information">
        <div class="user-background-image">
            <img class="information-background" src="wp-content/themes/Len-Free/Assets/Len-Images/user-background.jpg" alt="">
        </div>
        <div class="user-name-avatar">
            <div class="information-avatar">
                <img class="user-avatar" src="wp-content/themes/Len-Free/Assets/Len-Images/user-avatar.jpg" alt="">
            </div>
            <div class="user-name-word">
                <div class="user-name">
                    <strong class="user-name-title">青桔柠檬</strong>
                </div>
                <div class="user-word">
                    <p class="user-word-title">你好世界</p>
                </div>
            </div>


        </div>

        <div class="user-biography"></div>
        <div class="user-statistics-right">
            <li class="user-statistics-li user-statistics-article">8<span class="user-statistics-span">文章</span></li>
            <li class="user-statistics-li user-statistics-comment">624<span class="user-statistics-span">评论</span></li>
            <li class="user-statistics-li user-statistics-like-none">43<span class="user-statistics-span">点赞</span></li>
        </div>

        <div></div>
    </div>

    <?php
    Len_Nav_Module(false, true);
    if (current_user_can('manage_options')) {
        $link = '/wp-admin';
    } else {
        $link = '/wp-login.php';
    }
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
    </div>
</div>