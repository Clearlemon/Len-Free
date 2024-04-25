<main style="width:<?php $Home_Module_6_1 = _len('Home_Module_6_1');if (empty($Home_Module_6_1)) {$Home_Module_6_1 = "1500";}echo $Home_Module_6_1; ?>px;" class="len-body-main len-body-m">
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

                <?php Len_Login_Module(); ?>
            </div>
        </div>
    </header>