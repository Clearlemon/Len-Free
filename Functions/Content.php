<?php
function Len_Content()
{

    $Sign_up = Len_Sign_up_today();
    echo "今天注册的用户数量是： $Sign_up";


    $today_published_posts_count = get_today_published_posts_count();

    // 输出数量
    echo "今天发布的文章数量是： $today_published_posts_count";

    // 获取总文章数量
    // 获取所有已注册的文章类型
    $post_types = get_post_types(['public' => true], 'objects');

    // 初始化总文章数量
    $total_posts = 0;

    // 遍历计算总文章数量
    foreach ($post_types as $post_type) {
        $total_posts += wp_count_posts($post_type->name)->publish;
    }

    // 输出数量
    echo "总文章数量：$total_posts";

    // 获取用户数量
    $total_users = count_users()['total_users'];

    // 输出数量
    echo "总用户数量：$total_users";

    // 获取 "post" 类型的文章数量
    $total_posts = wp_count_posts('post')->publish;

    // 输出数量
    echo "文章数量：$total_posts";

    // 获取 "post" 类型的文章数量
    $total_diary = wp_count_posts('diary')->publish;

    // 输出数量
    echo "日记文章数量：$total_diary";

    // 获取 "post" 类型的文章数量
    $total_photo = wp_count_posts('photo')->publish;

    // 输出数量
    echo "相册文章数量：$total_photo";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <style>
            .echarts-min {
                height: 400px;
                width: 400px;
            }
        </style>
        <title>ECharts</title>
        <!-- 引入刚刚下载的 ECharts 文件 -->
    </head>

    <body>
        <!-- 为 ECharts 准备一个定义了宽高的 DOM -->
        <div id="main" class="echarts-min"></div>
        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main'));
            window.addEventListener('resize', function() {
                myChart.resize();
            });

            // 指定图表的配置项和数据
            var option = {
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    top: '5%',
                    left: 'center'
                },
                series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    itemStyle: {
                        borderRadius: 10,
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: 40,
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: [{
                            value: 1048,
                            name: 'Search Engine'
                        },
                        {
                            value: 735,
                            name: 'Direct'
                        },
                        {
                            value: 580,
                            name: 'Email'
                        },
                        {
                            value: 484,
                            name: 'Union Ads'
                        },
                        {
                            value: 300,
                            name: 'Video Ads'
                        }
                    ]
                }]
            };

            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        </script>
    </body>

    </html>



<?php
}
function Len_Sign_up_today()
{
    global $wpdb;

    $today = date('Y-m-d');
    $query = "SELECT COUNT(ID) FROM $wpdb->users WHERE DATE(user_registered) = '$today'";

    $count = $wpdb->get_var($query);

    return $count;
}

function get_today_published_posts_count()
{
    global $wpdb;

    $today = date('Y-m-d');

    $args = array(
        'post_type' => array('post', 'diary', 'photo'),  // 文章类型
        'post_status' => 'publish',  // 发布状态
        'posts_per_page' => -1,  // 获取所有文章
        'date_query' => array(
            array(
                'after' => $today,  // 今天之后的日期
                'before' => $today,  // 今天之前的日期
                'inclusive' => true,
            ),
        ),
    );

    $query = new WP_Query($args);

    $count = $query->post_count;

    return $count;
}

// 调用函数获取今天发布的文章数量
