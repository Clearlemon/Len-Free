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

$.fn.postLike = function () {
    if ($(this).hasClass('done')) {
        return false;
    } else {
        $(this).addClass('done');
        var id = $(this).data("id"),
            action = $(this).data('action'),
            rateHolder = $(this).children('.count');
        var ajax_data = {
            action: "bigfa_like",
            um_id: id,
            um_action: action
        };
        $.post("/wp-admin/admin-ajax.php", ajax_data,
            function (data) {
                $(rateHolder).html(data);
            });
        return false;
    }
};
$(document).on("click", ".favorite",
    function () {
        $(this).postLike();
    });

//表情包引用
var apiUrl = window.location.origin + '/wp-content/themes/Len-Free/Assets/Lne-JavaScript/memes.json';
var OwO_demo = new OwO({
    logo: '表情包',
    container: document.getElementsByClassName('OwO')[0],
    target: document.getElementsByClassName('OwO-textarea')[0],
    api: apiUrl,
    position: 'down',
    width: '50%',
    maxHeight: '250px'
});

//评论表单
jQuery(document).ready(function ($) {
    var initialFormLocation = $('#commentform').parent();
    var replyTargetId = null;

    // 提交评论
    $('#commentform').submit(function (event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: '/wp-comments-post.php',
            method: 'POST',
            data: formData,
            dataType: 'html',
            success: function (response) {
                $('#commentform')[0].reset();
                $('#len-comments-module').load(location.href + ' #len-comments-module');

                // 如果存在回复目标 ID，则将表单放回原始位置
                if (replyTargetId !== null) {
                    $('#commentform').detach().appendTo(initialFormLocation);
                    replyTargetId = null;
                }
            },
            error: function (error) {
                console.error('Error:', error);
            },
        });
    });

    // 使用事件委托绑定回复评论的处理程序
    $('#comments').on('click', '.comment-reply-link', function (event) {
        event.preventDefault();

        var parentCommentId = $(this).data('commentid');

        // 更新回复链接的参数
        var replyLink = $(this).attr('href');
        replyLink += (replyLink.indexOf('?') !== -1 ? '&' : '?') + 'replytocom=' + parentCommentId + '#respond';
        $(this).attr('href', replyLink);

        // 如果用户再次点击相同的回复链接，将表单放回原始位置
        if (replyTargetId === parentCommentId) {
            $('#commentform').detach().appendTo(initialFormLocation);
            replyTargetId = null;
        } else {
            // 否则，将表单移到新的回复目标位置
            $('#commentform').detach().appendTo('#comment-' + parentCommentId);
            replyTargetId = parentCommentId;
        }

        $('#comment_parent').val(parentCommentId);
    });

    // 加载更多评论
    $('.comment_loadmore').click(function () {
        var button = $(this);
        var currentPage = parseInt(button.attr('page-id')); // 获取当前页数并转换为整数
        var parent_post_id = button.attr('post-id');
        var max_page = button.attr('max-comments');

        // 检查当前页数是否大于 1，如果是则递减，否则不执行任何操作
        if (currentPage == max_page) {
            currentPage--; // 递减当前页数
        } else if (currentPage < max_page) {
            currentPage++;
        }

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data: {
                'action': 'cloadmore',
                'post_id': parent_post_id, // 当前文章
                'cpage': currentPage, // 当前评论页
            },
            type: 'POST',
            beforeSend: function (xhr) {
                button.text('加载中...');
            },
            success: function (data) {
                if (data) {
                    $('ol.len-comments-ol-block').append(data);
                    currentPage--; // 更新页数
                    button.attr('page-id', currentPage); // 更新按钮的 page-id 属性值
                    button.text('加载更多');
                    // 如果最后一页，则删除按钮
                    if (currentPage == -1) {
                        button.text('没有更多的评论了....');
                    } else if (currentPage < max_page) {
                        button.text('没有更多的评论了....');
                    }
                }
            }
        });
        return false;
    });

});
