<?php

/**
 * @About: Len主题幻灯片模块函数
 * @Author：青桔&dmy 
 * @Url： lmeon.com/len-thems
 * @Time：2024-3-22
 * @Email: Len@tqlen.com
 * @Project: Len主题
 * */


function Len_Slide_Module()
{
    $Module_1 = _len('Module_1');
    if (!empty($Module_1)) {
        foreach ($Module_1 as $key) {
            $img = $key['Module_1_1'];
            $Slide_Title = $key['Module_1_2'];
            $Slide_Article = $key['Module_1_3'];
            $Slide_Url = $key['Module_1_4'];
            $Slide_img = Len_Get_Img(array('src' => Len_Lazy_Thumbnail(), 'alt' => $Slide_Title, 'data-src' => $img, 'class' => array('len-swiper-slide-img', 'lazy'), 'id' => '',));
?>

            <div class="swiper-slide">
                <a class="len-swiper swiper-link" href="<?php echo $Slide_Url; ?>">
                    <?php echo $Slide_img; ?>
                    <div class="len-swiper-content-background">
                        <div class="len-swipre swiper-commend-title">
                            <span class="len-swiper swiper-commend">推荐</span>
                            <h2 class="len-swiper swiper-title"><?php echo $Slide_Title; ?></h2>
                        </div>
                        <p class="len-swiper swiper-content"><?php echo $Slide_Article; ?></p>
                    </div>
                </a>
            </div>

<?php
        }
    }
}
