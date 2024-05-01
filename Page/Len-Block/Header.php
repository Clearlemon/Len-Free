<main  class="len-body-main len-body-m">
    <header class="len-head ">
        <div class="len-header-main">
            <div class="len-logo-search-min">
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
    </header>