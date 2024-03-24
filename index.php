<!DOCTYPE html>
<html lang="zh">
<?php
if (!wp_is_mobile()) {
    /**
     * wp_footer(); @引用Wordpress自带的顶部样式文件
     */
    wp_head();

    require_once get_theme_file_path('/Page/Index.php');

    /**
     * wp_footer(); @引用Wordpress自带的底部样式文件
     */
    wp_footer();
} else {
?>
    <!DOCTYPE html>
    <html lang="zh">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Len主题 - The World is beautiful</title>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            body {
                height: 100%;
                width: 100%;
            }

            .img-back {
                position: fixed;
                width: 100%;
                height: 100%;
                object-fit: cover;
                z-index: -1;
            }

            .content {
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                position: absolute;
            }

            .pop-content {
                margin: auto;
                width: 230px;
                height: 250px;
                position: relative;
                display: flex;
                box-shadow: inset 0 0 2px #c5c5c5d1;
                backdrop-filter: blur(20px);
                border-radius: 15px;
                padding: 20px;
                background-color: hsl(0deg 0% 100% / 50%);
                flex-direction: column;
                align-items: center;
            }

            button {
                padding: 5px;
                border: none;
                border-radius: 5px;
                background-color: aliceblue;
                margin-left: 10px;
            }

            .links {
                display: flex;
                align-items: center;
            }

            .links>svg {
                width: 35px;
                margin-right: 5px;
            }
        </style>
    </head>

    <body>
        <img class="img-back" src="https://t.mwm.moe/mp" alt="">
        <div class="content">
            <div class="pop-content">
                <div>
                    <h2>温馨提示</h2>
                </div>
                <p>本主题还未适配移动端</p>
                <p>请耐心等待谢谢！</p><br>
                <h3>关于主题：</h3>
                <p>此主题没什么值得拿出的优点</p>
                <p>唯一的介绍免费且简洁</p>
                <br>
                <br>
                <div class="links">
                    <svg height="32" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="32" data-view-component="true" class="octicon octicon-mark-github v-align-middle color-fg-default">
                        <path d="M8 0c4.42 0 8 3.58 8 8a8.013 8.013 0 0 1-5.45 7.59c-.4.08-.55-.17-.55-.38 0-.27.01-1.13.01-2.2 0-.75-.25-1.23-.54-1.48 1.78-.2 3.65-.88 3.65-3.95 0-.88-.31-1.59-.82-2.15.08-.2.36-1.02-.08-2.12 0 0-.67-.22-2.2.82-.64-.18-1.32-.27-2-.27-.68 0-1.36.09-2 .27-1.53-1.03-2.2-.82-2.2-.82-.44 1.1-.16 1.92-.08 2.12-.51.56-.82 1.28-.82 2.15 0 3.06 1.86 3.75 3.64 3.95-.23.2-.44.55-.51 1.07-.46.21-1.61.55-2.33-.66-.15-.24-.6-.83-1.23-.82-.67.01-.27.38.01.53.34.19.73.9.82 1.13.16.45.68 1.31 2.69.94 0 .67.01 1.3.01 1.49 0 .21-.15.45-.55.38A7.995 7.995 0 0 1 0 8c0-4.42 3.58-8 8-8Z">
                        </path>
                    </svg>
                    <a href="https://github.com/Clearlemon/Len-Free"><button>获取主题</button></a>
                    <a href="https://bbs.lentree.cn/?sort=top"><button>论坛提议</button></a>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>

</html>