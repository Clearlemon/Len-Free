document.addEventListener('DOMContentLoaded', function () {
    var button = document.getElementById('random-post');
    var currentUrl = window.location.protocol + '//' + window.location.host; // 获取当前页面的协议和主机名
    var searchBtn = document.getElementById('search-btn');
    var swiperElement = document.getElementById('len-swiper');


    // 点击按钮时触发
    button.addEventListener('click', function () {
        // 发送 AJAX 请求获取所有文章
        var xhr = new XMLHttpRequest();

        xhr.open('GET', currentUrl + '/wp-json/wp/v2/posts');
        xhr.onload = function () {
            if (xhr.status === 200) {
                var posts = JSON.parse(xhr.responseText);
                // 从文章数组中随机选择一篇文章
                var randomIndex = Math.floor(Math.random() * posts.length);
                var randomPost = posts[randomIndex];
                // 跳转到随机选择的文章链接
                setTimeout(function () {
                    window.location.href = randomPost.link;

                }, 2000); // 3秒延迟
                Qmsg.loading({
                    content: '正在随机跳转请等待2秒',
                    position: 'top',
                    showClose: true,
                    autoClose: true
                });
            } else {
                console.error('获取文章失败：' + xhr.status);
            }
        };
        xhr.send();
    });


    searchBtn.addEventListener('click', function () {
        document.getElementById('searchform').submit();
    });

    // 如果存在，则创建Swiper实例
    if (swiperElement) {
        var mySwiper = new Swiper('#len-swiper', {
            loop: true,
            speed: 2000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,

            },
            pagination: {
                el: '.swiper-pagination',
            },

        });
    }

});





function initializePlugins() {
    Fancybox.bind('[data-fancybox="gallery"]', {
        Toolbar: {
            display: {
                left: ["infobar"],
                middle: ["zoomIn", "zoomOut", "toggle1to1", "rotateCCW", "rotateCW", "flipX", "flipY",],
                right: ["iterateZoom",
                    "slideshow",
                    "fullscreen",
                    "thumbs",
                    "close",
                ],
            },
        },
    });
    var lazyload = new LazyLoad({
        // 可选配置项
    });



    window.sr = ScrollReveal()
        .reveal('.foo', fooReveal)

}

var fooReveal = {
    origin: 'top',
    delay: 10,
    distance: '20px',
    // easing: 'ease-in-out',
    rotate: { y: 0 },
    scale: 0.1
};

// 在页面加载完成时执行初始化函数
document.addEventListener('DOMContentLoaded', function () {
    initializePlugins();
});

// 定义点击加载更多按钮时执行的函数
jQuery(document).ready(function ($) {
    var categoryButton = $('#len-ajax-post-category'); // 分类页按钮
    var tagButton = $('#len-ajax-post-tag'); // 标签页按钮
    var searchButton = $('#len-ajax-post-search'); // 标签页按钮
    var homeButton = $('#len-ajax-post'); // 标签页按钮
    var canClick = true; // 控制按钮是否可点击的标志

    homeButton.click(function () {
        if (!canClick) return; // 如果按钮不可点击，直接返回
        var page = parseInt($(this).attr('page')) + 1; // 增加页码
        var showcase = parseInt($(this).attr('showcase')); // 获取每页文章数量
        var randomNumber = Math.floor(Math.random() * (1000 - 200 + 1)) + 0;
        // 创建加载中的提示
        var loadingDiv = Qmsg.loading({
            autoClose: true,
            content: "正在加载"
        });

        $('#pots-ajax-min').append(loadingDiv);

        // 禁用按钮点击
        canClick = false;

        // 延迟加载
        setTimeout(function () {
            // AJAX 请求
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action: 'Len_Post_Ajax', // 后端 AJAX 处理函数的名称
                    posts_per_page: showcase, // 每页文章数量
                    paged: page // 当前页码
                },
                success: function (response) {
                    // 删除加载中的提示
                    loadingDiv.close();
                    // 在 #pots-ajax-min 元素中追加返回的文章内容
                    $('#pots-ajax-min').append(response);

                    // 更新按钮的页码属性
                    categoryButton.attr('page', page);

                    // 每篇文章加载完成后的时间间隔
                    setTimeout(function () {
                        // 每次加载更多后重新初始化插件
                        initializePlugins();
                        // 重新启用按钮点击
                        canClick = true;
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    // 发生错误时也要重新启用按钮点击
                    canClick = true;
                }
            });
        }, randomNumber);
    });

    // 点击分类页加载更多按钮时执行的函数
    categoryButton.click(function () {
        if (!canClick) return; // 如果按钮不可点击，直接返回
        var page = parseInt($(this).attr('page')) + 1; // 增加页码
        var category = parseInt($(this).attr('category-id')); // 获取分类 ID
        var showcase = parseInt($(this).attr('showcase')); // 获取每页文章数量
        var randomNumber = Math.floor(Math.random() * (1000 - 200 + 1)) + 0;

        // 创建加载中的提示
        var loadingDiv = Qmsg.loading({
            autoClose: true,
            content: "正在加载"
        });
        $('#pots-ajax-min').append(loadingDiv);
        canClick = false;

        // 延迟加载
        setTimeout(function () {
            // AJAX 请求
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action: 'Len_Post_Ajax', // 后端 AJAX 处理函数的名称
                    category: category,
                    posts_per_page: showcase, // 每页文章数量
                    paged: page // 当前页码
                },
                success: function (response) {
                    // 删除加载中的提示
                    loadingDiv.close();

                    // 在 #pots-ajax-min 元素中追加返回的文章内容
                    $('#pots-ajax-min').append(response);

                    // 更新按钮的页码属性
                    categoryButton.attr('page', page);

                    // 每篇文章加载完成后的时间间隔
                    setTimeout(function () {
                        // 每次加载更多后重新初始化插件
                        initializePlugins();

                        canClick = true;
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);

                    canClick = true;
                }
            });
        }, randomNumber);
    });



    // 点击标签页加载更多按钮时执行的函数
    tagButton.click(function () {
        if (!canClick) return; // 如果按钮不可点击，直接返回
        var page = parseInt($(this).attr('page')) + 1; // 增加页码
        var tag = parseInt($(this).attr('tag-id')); // 获取标签 ID
        var showcase = parseInt($(this).attr('showcase')); // 获取每页文章数量
        var randomNumber = Math.floor(Math.random() * (1000 - 200 + 1)) + 0;

        var loadingDiv = Qmsg.loading({
            autoClose: true,
            content: "正在加载"
        });
        $('#pots-ajax-min').append(loadingDiv);

        canClick = false;


        // 延迟加载
        setTimeout(function () {
            // AJAX 请求
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action: 'Len_Post_Ajax', // 后端 AJAX 处理函数的名称
                    tag: tag,
                    posts_per_page: showcase, // 每页文章数量
                    paged: page // 当前页码
                },
                success: function (response) {
                    // 删除加载中的提示
                    loadingDiv.close();

                    // 在 #pots-ajax-min 元素中追加返回的文章内容
                    $('#pots-ajax-min').append(response);
                    // 更新按钮的页码属性
                    tagButton.attr('page', page);

                    setTimeout(function () {
                        // 每次加载更多后重新初始化插件
                        initializePlugins();

                        canClick = true;
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);

                    canClick = true;
                }
            });
        }, randomNumber);
    });


    searchButton.click(function () {
        if (!canClick) return; // 如果按钮不可点击，直接返回
        var page = parseInt($(this).attr('page')) + 1; // 增加页码
        var searchKeyword = $(this).attr('search-key'); // 获取搜索关键词
        var showcase = parseInt($(this).attr('showcase')); // 获取每页文章数量
        var randomNumber = Math.floor(Math.random() * (1000 - 200 + 1)) + 0;

        var loadingDiv = Qmsg.loading({
            autoClose: true,
            content: "正在加载"
        });
        $('#pots-ajax-min').append(loadingDiv);

        canClick = false;

        // 延迟加载
        setTimeout(function () {
            // AJAX 请求
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    action: 'Len_Post_Ajax', // 后端 AJAX 处理函数的名称
                    search: searchKeyword, // 使用正确的搜索关键词
                    posts_per_page: showcase, // 每页文章数量
                    paged: page // 当前页码
                },
                success: function (response) {
                    // 删除加载中的提示
                    loadingDiv.close();

                    // 在 #pots-ajax-min 元素中追加返回的文章内容
                    $('#pots-ajax-min').append(response);

                    // 更新按钮的页码属性
                    searchButton.attr('page', page);

                    setTimeout(function () {
                        // 每次加载更多后重新初始化插件
                        initializePlugins();

                        canClick = true;
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);

                    canClick = true;
                }
            });
        }, randomNumber);
    });

});


//导航
var toggleButtons = document.querySelectorAll('.toggleButton');
toggleButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        var ul = button.nextElementSibling;
        if (ul.style.display === 'none' || ul.style.display === '') {
            ul.style.display = 'block';
            button.classList.remove("fa-caret-right");
            button.classList.add("fa-caret-down");
        } else {
            ul.style.display = 'none';
            button.classList.remove("fa-caret-down");
            button.classList.add("fa-caret-right");
        }
    });
});

