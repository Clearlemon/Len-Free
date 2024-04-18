// 定义初始化函数
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

    var mySwiper = new Swiper('#len-swiper', {
        loop: true, // 循环模式选项
    });
}

// 在页面加载完成时执行初始化函数
document.addEventListener('DOMContentLoaded', function () {
    initializePlugins();
});

// 定义点击加载更多按钮时执行的函数
jQuery(document).ready(function ($) {
    var button = $('#len-ajax-post'); // 选中按钮元素
    var page = 1; // 初始页码
    var category = parseInt(button.attr('category-id')); // 分类，默认为空
    var showcase = parseInt(button.attr('showcase')); // 获取按钮属性值


    // 点击加载更多按钮时执行的函数
    $('#len-ajax-post').click(function () {
        page++; // 增加页码

        // AJAX 请求
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'Len_Post_Ajax', // 后端 AJAX 处理函数的名称
                category: category, // 分类（可选）
                posts_per_page: showcase, // 每页文章数量
                paged: page // 当前页码
            },
            success: function (response) {
                // 在 #pots-ajax-min 元素中追加返回的文章内容
                $('#pots-ajax-min').append(response);

                // 每次加载更多后重新初始化插件
                initializePlugins();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});




//日期JS
const isLeapYear = (year) => {
    return (
        (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) ||
        (year % 100 === 0 && year % 400 === 0)
    );
};
const getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28;
};
let calendar = document.querySelector('.len-calendar');
const month_names = [
    '一月',
    '二月',
    '三月',
    '四月',
    '五月',
    '六月',
    '七月',
    '八月',
    '九月',
    '十月',
    '十一月',
    '十二月',
];
let month_picker = document.querySelector('#month-picker');
const dayTextFormate = document.querySelector('.day-text-formate ');
const timeFormate = document.querySelector('.time-formate');
const dateFormate = document.querySelector('.date-formate');

month_picker.onclick = () => {
    month_list.classList.remove('hideonce');
    month_list.classList.remove('hide');
    month_list.classList.add('show');
    dayTextFormate.classList.remove('showtime');
    dayTextFormate.classList.add('hidetime');
    timeFormate.classList.remove('showtime');
    timeFormate.classList.add('hideTime');
    dateFormate.classList.remove('showtime');
    dateFormate.classList.add('hideTime');
};

const generateCalendar = (month, year) => {
    let calendar_days = document.querySelector('.len-calendar-days');
    calendar_days.innerHTML = '';
    let calendar_header_year = document.querySelector('#year');
    let days_of_month = [
        31,
        getFebDays(year),
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
    ];

    let currentDate = new Date();

    month_picker.innerHTML = month_names[month];

    calendar_header_year.innerHTML = year;

    let first_day = new Date(year, month);


    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {

        let day = document.createElement('div');

        if (i >= first_day.getDay()) {
            day.innerHTML = i - first_day.getDay() + 1;

            if (i - first_day.getDay() + 1 === currentDate.getDate() &&
                year === currentDate.getFullYear() &&
                month === currentDate.getMonth()
            ) {
                day.classList.add('current-date');
            }
        }
        calendar_days.appendChild(day);
    }
};

let month_list = calendar.querySelector('.month-list');
month_names.forEach((e, index) => {
    let month = document.createElement('div');
    month.innerHTML = `<div>${e}</div>`;

    month_list.append(month);
    month.onclick = () => {
        currentMonth.value = index;
        generateCalendar(currentMonth.value, currentYear.value);
        month_list.classList.replace('show', 'hide');
        dayTextFormate.classList.remove('hideTime');
        dayTextFormate.classList.add('showtime');
        timeFormate.classList.remove('hideTime');
        timeFormate.classList.add('showtime');
        dateFormate.classList.remove('hideTime');
        dateFormate.classList.add('showtime');
    };
});

(function () {
    month_list.classList.add('hideonce');
})();
document.querySelector('#pre-year').onclick = () => {
    --currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};
document.querySelector('#next-year').onclick = () => {
    ++currentYear.value;
    generateCalendar(currentMonth.value, currentYear.value);
};

let currentDate = new Date();
let currentMonth = { value: currentDate.getMonth() };
let currentYear = { value: currentDate.getFullYear() };
generateCalendar(currentMonth.value, currentYear.value);

const todayShowTime = document.querySelector('.time-formate');
const todayShowDate = document.querySelector('.date-formate');

const currshowDate = new Date();
const showCurrentDateOption = {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    weekday: 'long',
};
const currentDateFormate = new Intl.DateTimeFormat(
    'en-US',
    showCurrentDateOption
).format(currshowDate);
todayShowDate.textContent = currentDateFormate;
setInterval(() => {
    const timer = new Date();
    const option = {
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
    };
    const formateTimer = new Intl.DateTimeFormat('en-us', option).format(timer);
    let time = `${`${timer.getHours()}`.padStart(
        2,
        '0'
    )}:${`${timer.getMinutes()}`.padStart(
        2,
        '0'
    )}: ${`${timer.getSeconds()}`.padStart(2, '0')}`;
    todayShowTime.textContent = formateTimer;
}, 1000);
// 文章

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


//文章AJAX加载
// function loadPage(pageNumber) {
//     $.ajax({
//         url: '/wp-admin/admin-ajax.php', // AJAX 请求的 URL
//         type: 'POST',
//         data: {
//             action: 'Len_Post_Ajax', // AJAX 处理函数的名称
//             paged: pageNumber // 当前页码
//         },
//         success: function (response) {
//             // 将 AJAX 返回的文章列表 HTML 替换到页面中
//             $('#pots-ajax-min').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error('AJAX Error:', error);
//         }
//     });
//     $.ajax({
//         url: '/wp-admin/admin-ajax.php', // 当前页面 URL
//         type: 'POST',
//         data: { 'paged': pageNumber }, // 向服务器发送的数据，包括页码
//         success: function (response) {
//             // 将 AJAX 返回的内容替换到页面中
//             var newContent = $(response).find('.len_post_page_block_all');
//             $('.len_post_page_block_all').replaceWith(newContent);
//         },
//         error: function (xhr, status, error) {
//             console.error('AJAX Error:', error);
//             initializePlugins();
//         }
//     });
// }


// $(document).on('click', '.len_post_page_block_all a.page-numbers', function (event) {
//     event.preventDefault(); // 阻止默认行为

//     var pageNumber = $(this).attr('href').split('/').pop(); // 获取页码
//     loadPage(pageNumber); // 加载页面
// });