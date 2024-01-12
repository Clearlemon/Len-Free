document.addEventListener('DOMContentLoaded', function () {
    // 获取点击的元素
    var tippingDiv = document.querySelector('.len-article-tipping');
    var payOpenDiv = document.querySelector('.len-pay-open');

    // 获取要显示/隐藏的元素
    var wxPayDiv = document.querySelector('.len-al-wx-pay');
    var pupDiv = document.querySelector('.len-pop-ups');

    // 添加点击事件监听器（用于len-article-tipping）
    tippingDiv.addEventListener('click', toggleWxPayVisibility);

    // 添加点击事件监听器（用于len-pay-open）
    payOpenDiv.addEventListener('click', toggleWxPayVisibility);

    // 定义显示/隐藏的函数
    function toggleWxPayVisibility() {
        // 切换显示/隐藏状态
        if (wxPayDiv.style.display === 'none') {
            wxPayDiv.style.display = 'block';
        } else {
            wxPayDiv.style.display = 'none';
        }

        if (pupDiv.style.display === 'none') {
            pupDiv.style.display = 'block';
        } else {
            pupDiv.style.display = 'none';
        }

    }
});

document.addEventListener('DOMContentLoaded', function () {
    // 获取点击的元素
    var shareDiv = document.querySelector('.len-article-share');
    var shareOpenDiv = document.querySelector('.len-share-open');

    // 获取要显示/隐藏的元素
    var shareblockDiv = document.querySelector('.len-share-blcok');
    var pupDiv = document.querySelector('.len-pop-ups');

    // 添加点击事件监听器（用于len-article-tipping）
    shareDiv.addEventListener('click', toggleWxPayVisibility);

    // 添加点击事件监听器（用于len-pay-open）
    shareOpenDiv.addEventListener('click', toggleWxPayVisibility);

    // 定义显示/隐藏的函数
    function toggleWxPayVisibility() {
        // 切换显示/隐藏状态
        if (shareblockDiv.style.display === 'none') {
            shareblockDiv.style.display = 'block';
        } else {
            shareblockDiv.style.display = 'none';
        }

        if (pupDiv.style.display === 'none') {
            pupDiv.style.display = 'block';
        } else {
            pupDiv.style.display = 'none';
        }

    }
});

function togglePayment(paymentMethod) {
    var alipayQr = document.querySelector('.wx-alpay-qr .pay-qr-img:nth-child(1)');
    var wechatQr = document.querySelector('.wx-alpay-qr .pay-qr-img:nth-child(2)');

    if (paymentMethod === 'alipay') {
        alipayQr.style.display = 'block';
        wechatQr.style.display = 'none';
    } else if (paymentMethod === 'wechat') {
        alipayQr.style.display = 'none';
        wechatQr.style.display = 'block';
    }
}

