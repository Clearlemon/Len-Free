<?php

/**
 * @About: Len主题顶部导航栏模块样式
 * @Author：青桔&dmy 
 * @Url： lmeon.com/len-thems
 * @Time：2024-1-4
 * @Email: Len@tqlen.com
 * @Project: Len主题
 * */
$Home_Module_3 = _len('Home_Module_3');
if ($Home_Module_3 == true) {
?>
    <div class="len-showcase-banner-nav-blcok">
        <ul class="banner-nav-ul">
            <li class="len-banner-nav banner-nav-li">
                <svg class="len-banner-nav-icon" aria-hidden="true">
                    <use xlink:href="#icon-mianxingningmeng"></use>
                </svg>
                <a class="banner-nav-a-links len-pjax-link-all-blcok" href="">
                    关于主题</a>
            </li>
            <li class="len-banner-nav banner-nav-li">
                <svg class="len-left-nav-icon" aria-hidden="true">
                    <use xlink:href="#icon-xieyi"></use>
                </svg>
                <a class="banner-nav-a-links len-pjax-link-all-blcok " href="">用户协议</a>
            </li>
            <li class="len-banner-nav banner-nav-li">
                <svg class="len-left-nav-icon" aria-hidden="true">
                    <use xlink:href="#icon-guanyuwomen"></use>
                </svg>
                <a class="banner-nav-a-links len-pjax-link-all-blcok" href="">关于作者</a>
            </li>
        </ul>
    </div>
<?php } ?>