


document.addEventListener('DOMContentLoaded', function () {
    // 检查页面中是否存在具有指定ID的元素
    var swiperElement = document.getElementById('len-swiper');

    // 如果存在，则创建Swiper实例
    if (swiperElement) {
        var mySwiper = new Swiper('#len-swiper', {
            loop: true, // 循环模式选项
            // 其他Swiper选项...
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

    var fooReveal = {
        origin: 'top',
        delay: 10,
        distance: '20px',
        // easing: 'ease-in-out',
        rotate: { y: 0 },
        scale: 0.3
    };

    window.sr = ScrollReveal()
        .reveal('.foo', fooReveal)

}
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

    homeButton.click(function () {
        var page = parseInt($(this).attr('page')) + 1; // 增加页码
        var showcase = parseInt($(this).attr('showcase')); // 获取每页文章数量
        var randomNumber = Math.floor(Math.random() * (1000 - 200 + 1)) + 0;

        // 创建加载中的提示
        var loadingDiv = $('<div>Loading...</div>');
        $('#pots-ajax-min').append(loadingDiv);

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
                    loadingDiv.remove();

                    // 在 #pots-ajax-min 元素中追加返回的文章内容
                    $('#pots-ajax-min').append(response);

                    // 更新按钮的页码属性
                    categoryButton.attr('page', page);

                    // 每篇文章加载完成后的时间间隔
                    setTimeout(function () {
                        // 每次加载更多后重新初始化插件
                        initializePlugins();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }, randomNumber);
    });

    // 点击分类页加载更多按钮时执行的函数
    categoryButton.click(function () {
        var page = parseInt($(this).attr('page')) + 1; // 增加页码
        var category = parseInt($(this).attr('category-id')); // 获取分类 ID
        var showcase = parseInt($(this).attr('showcase')); // 获取每页文章数量
        var randomNumber = Math.floor(Math.random() * (1000 - 200 + 1)) + 0;

        // 创建加载中的提示
        var loadingDiv = $('<div>Loading...</div>');
        $('#pots-ajax-min').append(loadingDiv);

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
                    loadingDiv.remove();

                    // 在 #pots-ajax-min 元素中追加返回的文章内容
                    $('#pots-ajax-min').append(response);

                    // 更新按钮的页码属性
                    categoryButton.attr('page', page);

                    // 每篇文章加载完成后的时间间隔
                    setTimeout(function () {
                        // 每次加载更多后重新初始化插件
                        initializePlugins();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }, randomNumber);
    });



    // 点击标签页加载更多按钮时执行的函数
    tagButton.click(function () {
        var page = parseInt($(this).attr('page')) + 1; // 增加页码
        var tag = parseInt($(this).attr('tag-id')); // 获取标签 ID
        var showcase = parseInt($(this).attr('showcase')); // 获取每页文章数量
        var randomNumber = Math.floor(Math.random() * (1000 - 200 + 1)) + 0;

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
                    // 在 #pots-ajax-min 元素中追加返回的文章内容
                    $('#pots-ajax-min').append(response);

                    // 更新按钮的页码属性
                    tagButton.attr('page', page);

                    setTimeout(function () {
                        // 每次加载更多后重新初始化插件
                        initializePlugins();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }, randomNumber);
    });
    searchButton.click(function () {
        var page = parseInt($(this).attr('page')) + 1; // 增加页码
        var searchKeyword = $(this).attr('search-key'); // 获取搜索关键词
        var showcase = parseInt($(this).attr('showcase')); // 获取每页文章数量
        var randomNumber = Math.floor(Math.random() * (1000 - 200 + 1)) + 0;
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
                    // 在 #pots-ajax-min 元素中追加返回的文章内容
                    $('#pots-ajax-min').append(response);

                    // 更新按钮的页码属性
                    searchButton.attr('page', page);

                    setTimeout(function () {
                        // 每次加载更多后重新初始化插件
                        initializePlugins();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
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

