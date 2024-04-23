<?php

// 修改登录成功后的重定向行为


?>
<header class="len-head ">
    <div class="len-header-main">
        <div class="len-logo-search-min">
            <div class="len-logo-fig"><img src="wp-content/themes/Len-Free/Assets/Len-Images/logo.png" alt=""></div>
            <div class="len-search-block">
                <form class="mobile_navbar-form" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <div class="leaf-banner_search">
                        <input class="len-search" type="text" class="form-control" name="s" size="35" placeholder="搜索一下？" id="keywords" maxlength="100">
                        <span class="input-group-btn" id="search-btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>
                </form>

            </div>
        </div>
        <div class="message-register">
            <div id="random-post" class="len-message-boards">
                <svg class="len-header-random-post" aria-hidden="true">
                    <use xlink:href="#icon-wenzhangliebiao"></use>
                </svg>
                <div id="random-show" class="random-post-illustrate">
                    文章黑洞?探索看看吧！
                </div>
            </div>
            <?php Len_Login_Module(); ?>
        </div>
    </div>
</header>