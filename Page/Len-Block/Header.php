<main class="len-body-main len-body-m">
    <header class="len-head ">
        <div class="len-header-main">
            <div class="len-logo-search-min">
                <div id="sidebar-nav" class="top-nav-blcok">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <?php echo Len_Logo_Module(); ?>
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
        <div id="sidebar-nav-blcok" class="len-sidebar-nav-blcok">
            <div class="len-sidebar-nav-blcok-main">

                <?php echo Len_Logo_Module(); ?>

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

                <?php Len_Nav_Module(false, true); ?>

            </div>
            <div id="no-sidebar-show" class="blank-background"></div>
        </div>
    </header>