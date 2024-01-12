// //无刷新加载页面JS
// document.addEventListener('DOMContentLoaded', function () {
//     // 获取所有的<a>标签
//     var navLinks = document.querySelectorAll('.len-pjax-link-all-blcok');

//     // 获取要展示内容的容器
//     var showcaseMain = document.querySelector('.len-showcase-main');

//     // 获取加载动画的容器
//     var loadingSpinner = document.createElement('div');
//     loadingSpinner.className = 'loading-spinner';

//     // 保存旧内容
//     var oldContent = '';

//     // 给所有的<a>标签添加点击事件
//     navLinks.forEach(function (link) {
//         link.addEventListener('click', function (event) {
//             // 阻止默认的跳转行为
//             event.preventDefault();

//             // 检查是否点击的是当前已经显示的页面
//             if (link.classList.contains('active')) {
//                 return;
//             }

//             // 获取目标链接
//             var targetUrl = link.getAttribute('href');

//             // 检查链接是否为 # 或为空
//             if (targetUrl === '#' || targetUrl.trim() === '') {
//                 // 刷新当前页面
//                 location.reload();
//                 return;
//             }

//             // 显示加载动画
//             showcaseMain.innerHTML = '';
//             showcaseMain.appendChild(loadingSpinner);

//             // 保存旧内容
//             oldContent = showcaseMain.innerHTML;

//             // 使用 Fetch API 加载目标链接的内容
//             fetch(targetUrl)
//                 .then(response => response.text())
//                 .then(data => {
//                     // 隐藏加载动画，将内容插入到展示容器中
//                     showcaseMain.removeChild(loadingSpinner);
//                     showcaseMain.innerHTML = data;

//                     // 标记当前链接为活动状态
//                     navLinks.forEach(function (navLink) {
//                         navLink.classList.remove('active');
//                     });
//                     link.classList.add('active');
//                 })
//                 .catch(error => {
//                     console.error('Error fetching content:', error);
//                     // 如果加载出错，恢复旧内容
//                     showcaseMain.innerHTML = oldContent;
//                 });
//         });
//     });
// });






//等待优化的无刷新加载页面JS
// document.addEventListener('DOMContentLoaded', function () {
//     // 获取<a>标签
//     var diaryLink = document.querySelector('.len-nav-link-block[href="Page/diary.html"]');

//     // 获取要展示内容的容器
//     var showcaseMain = document.querySelector('.len-showcase-main');

//     // 获取加载动画的容器
//     var loadingSpinner = document.createElement('div');
//     loadingSpinner.className = 'loading-spinner';

//     // 给<a>标签添加点击事件
//     diaryLink.addEventListener('click', function (event) {
//         // 阻止默认的跳转行为
//         event.preventDefault();

//         // 显示加载动画
//         showcaseMain.innerHTML = '';
//         showcaseMain.appendChild(loadingSpinner);

//         // 获取目标链接
//         var targetUrl = diaryLink.getAttribute('href');

//         // 使用Fetch API加载目标链接的内容
//         fetch(targetUrl)
//             .then(response => response.text())
//             .then(data => {
//                 // 隐藏加载动画，将内容插入到展示容器中
//                 showcaseMain.removeChild(loadingSpinner);
//                 showcaseMain.innerHTML = data;

//                 // 保存加载的内容到本地存储
//                 localStorage.setItem('loadedContent', data);
//             })
//             .catch(error => {
//                 console.error('Error fetching content:', error);
//                 // 如果加载出错，恢复本地存储中的内容
//                 var storedContent = localStorage.getItem('loadedContent');
//                 if (storedContent) {
//                     showcaseMain.innerHTML = storedContent;
//                 } else {
//                     showcaseMain.innerHTML = '<p>Failed to load content.</p>';
//                 }
//             });
//     });

//     // 页面加载时，尝试从本地存储中恢复内容
//     var storedContent = localStorage.getItem('loadedContent');
//     if (storedContent) {
//         showcaseMain.innerHTML = storedContent;
//     }
// });

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
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
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
