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
            <div josn-url="https://api.yangjuantech.com/api/yiyan/index.php?type=json&word=anime" class="len-footer-one-word">
                <?php echo Footer_Module(false, false, false, false, true, false); ?>
            </div>
        </div>
    </div>
</footer>
</main>
<?php echo Len_Diy_Cods_(false, true); ?>