<?php

/**
 * @About: Len主题幻灯片模块样式
 * @Author：青桔&dmy
 * @Url： https://github.com/Clearlemon/Len-Free
 * @Time：2024-3-21
 * @Email: Len@tqlen.com
 * @Project: Len主题
 * */

$Home_Module_1 = _len('Home_Module_1');
if ($Home_Module_1 == true) {
    $Module_1 = _len('Module_1');
    if (!empty($Module_1)) {
?>
        <div class="animate__animated animate__fadeIn len-swiper-block-min">
            <div id="len-swiper" class="swiper">
                <div class="swiper-wrapper">
                    <?php Len_Slide_Module() ?>
                </div>
            </div>
        </div>
<?php }
} ?>