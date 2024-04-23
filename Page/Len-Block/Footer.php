<footer class="len-footer">
    <div class="len-footer-min">
        <div class="len-footer-left">
            <?php
            Footer_Module(true, false, false, false, false, false)
            ?>
            <div class="len-footer-web-icp">
                <?php
                Footer_Module(false, true, false, false, false, false);
                Footer_Module(false, false, true, false, false, false);
                Footer_Module(false, false, false, true, false, false);
                ?>

            </div>
        </div>
        <div class="len-footer-right">
            <div class="len-footer-web-information">
                <?php echo Footer_Module(false, false, false, false,  false, true); ?>
                <span>
                    <svg class="len-left-footer-icon" aria-hidden="true">
                        <use xlink:href="#icon-mianxingningmeng"></use>
                    </svg>
                    Theme by Lemon
                </span>
                <span>
                    <svg class="len-left-footer-icon" aria-hidden="true">
                        <use xlink:href="#icon-wordpress"></use>
                    </svg>
                    CMS by Wordpress
                </span>

            </div>
            <div class="len-footer-one-word">

                <div class="len-on-word-source">艾伦 —————</div>
                <div class="len-on-word-dictum">『海的那边是什么？』</div>
            </div>
        </div>
    </div>
</footer>
<script>
    // document.getElementById('random-post').addEventListener('mouseover', onMouseUp); // {passive: true, capture: false}
    // document.getElementById('2').addEventListener('mouseup', onMouseUp, true); // {passive: true, capture: true}
    // document.getElementById('3').addEventListener('mouseup', onMouseUp, false); // {passive: true, capture: false}
    // document.getElementById('4').addEventListener('mouseup', onMouseUp, {
    //     passive: false
    // }); // {passive: false, capture: false}
    // document.getElementById('5').addEventListener('mouseup', onMouseUp, {
    //     passive: false,
    //     capture: false
    // }); // {passive: false, capture: false}
    // document.getElementById('6').addEventListener('mouseup', onMouseUp, {
    //     passive: false,
    //     capture: true
    // }); // {passive: false, capture: true}
    // document.getElementById('7').addEventListener('mouseup', onMouseUp, {
    //     passive: true,
    //     capture: false
    // }); // {passive: true, capture: false}
    document.getElementById('random-post').addEventListener('mouseover', mouseover);
    document.getElementById('random-post').addEventListener('mouseleave', mouseleave);



    document.addEventListener('scroll', onScroll);

    var mouseUpTriggered = false; // 用于记录是否已经触发过鼠标移入事件

    function onScroll(e) {
        // console.log('onScroll', this);
    }

    function mouseover(e) {
        if (!mouseUpTriggered) {
            document.getElementById('random-show').classList.add('random-show', 'animate__animated', 'animate__fadeIn', 'animate__slow');
            document.getElementById('login-box').classList.replace('animate__fadeInDown', 'animate__fadeOutDown');
            mouseUpTriggered = true; // 设置标志为已触发
        }
    }

    function mouseleave(e) {
        mouseUpTriggered = false; // 重置标志为未触发
        document.getElementById('random-show').classList.remove('random-show', 'animate__animated', 'animate__fadeIn', 'animate__slow');
        document.getElementById('login-box').classList.replace('animate__fadeInDown', 'animate__fadeOutDown');
    }
    var loginBoxVisible = false; // 初始登录框不可见

    document.getElementById('user-login').addEventListener('click', toggleLoginBox);

    function toggleLoginBox(e) {
        if (loginBoxVisible) {
            document.getElementById('login-box').classList.remove('login-show');
            document.getElementById('login-box').classList.replace('animate__fadeInDown', 'animate__fadeOutDown');
        } else {
            document.getElementById('login-box').classList.add('login-show', 'animate__animated', 'animate__fadeInDown');
            document.getElementById('login-box').classList.replace('animate__fadeOutDown', 'animate__fadeInDown', 'animate__slow');
        }

        // 切换登录框的显示状态
        loginBoxVisible = !loginBoxVisible;
    }


    // function mouseleave(e) {
    //     mouseUpTriggered = false; // 重置标志为未触发
    //     document.getElementById('random-show').classList.remove('random-show', 'animate__animated', 'animate__fadeIn', 'animate__slow');
    // }
</script>