<?php

/**
 * @About: Len主题幻灯片模块样式
 * @Author：青桔&dmy 
 * @Url： lmeon.com/len-thems
 * @Time：2024-3-21
 * @Email: Len@tqlen.com
 * @Project: Len主题
 * */

$Home_Module_1 = _len('Home_Module_1');
if ($Home_Module_1 == true) {
?>
    <div class="len-swiper-block-min">
        <div id="len-swiper" class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="len-swiper-slide-img" src="wp-content/themes/Len-Free/Assets/Len-Images/post-background-1.png" alt="">
                    <div class="len-swiper-content-background">
                        <h3>这是标题</h3>
                        <p>这是内容</p>
                    </div>
                </div>
                <div class="swiper-slide"><img class="len-swiper-slide-img" src="/wp-content/themes/Len-Free/Assets/Len-Images/post-background-2.png" alt=""></div>
                <div class="swiper-slide"><img class="len-swiper-slide-img" src="/wp-content/themes/Len-Free/Assets/Len-Images/post-background-3.jpg" alt=""></div>
            </div>
        </div>
    </div>
<?php } ?>