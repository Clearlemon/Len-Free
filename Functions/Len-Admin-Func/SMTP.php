<?php

/**
 * SMTP 配置
 * @author Seaton Jiang <hi@seatonjiang.com>
 * @license GPL-3.0 License
 * @version 2022.04.29
 */

if (_len('Len_Smtp_Module_1') == true) {
  function mail_smtp($phpmailer)
  {
    $Len_Smtp_Module_2 = _len('Len_Smtp_Module_2');
    $Len_Smtp_Module_3 = _len('Len_Smtp_Module_3');
    $Len_Smtp_Module_4 = _len('Len_Smtp_Module_4');
    $Len_Smtp_Module_5 = _len('Len_Smtp_Module_5');
    $Len_Smtp_Module_6 = _len('Len_Smtp_Module_6');

    $phpmailer->isSMTP();
    $phpmailer->SMTPAuth = true;
    $phpmailer->CharSet = "utf-8";
    $phpmailer->SMTPSecure = $Len_Smtp_Module_4;
    $phpmailer->Port = $Len_Smtp_Module_3;
    $phpmailer->Host = $Len_Smtp_Module_2;
    $phpmailer->From = $Len_Smtp_Module_5;
    $phpmailer->Username = $Len_Smtp_Module_5;
    $phpmailer->Password = $Len_Smtp_Module_6;
  }
  add_action('phpmailer_init', 'mail_smtp');
}

// Debug
function wp_mail_debug($wp_error)
{
  return error_log(print_r($wp_error, true));
}

function comment_approved($comment)
{
  if (is_email($comment->comment_author_email)) {
    $Len_Smtp_Module_5 = _len('Len_Smtp_Module_5');
    $to = trim($comment->comment_author_email);
    $post_link = get_permalink($comment->comment_post_ID);
    $subject = __('[通知]您的留言已经通过审核', 'kratos');
    $message = '
            <div style="background:#ececec;width: 100%;padding: 50px 0;text-align:center;">
            <div style="background:#fff;width:750px;text-align:left;position:relative;margin:0 auto;font-size:14px;line-height:1.5;">
                    <div style="zoom:1;padding:25px 40px;background:#518bcb; border-bottom:1px solid #467ec3;">
                        <h1 style="color:#fff; font-size:25px;line-height:30px; margin:0;"><a href="' . get_option('home') . '" style="text-decoration: none;color: #FFF;">' . htmlspecialchars_decode(get_option('blogname'), ENT_QUOTES) . '</a></h1>
                    </div>
                <div style="padding:35px 40px 30px;">
                    <h2 style="font-size:18px;margin:5px 0;">' . __('您好，', 'kratos') . trim($comment->comment_author) . '：</h2>
                    <p style="color:#313131;line-height:20px;font-size:15px;margin:20px 0;">' . __('您的留言已经通过了管理员的审核，摘要信息如下：', 'kratos') . '</p>
                        <table cellspacing="0" style="font-size:14px;text-align:center;border:1px solid #ccc;table-layout:fixed;width:500px;">
                            <thead>
                                <tr>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf;" width="280px;">' . __('文章', 'kratos') . '</th>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf;" width="270px;">' . __('内容', 'kratos') . '</th>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf;" width="110px;">' . __('操作', 'kratos') . '</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">《' . get_the_title($comment->comment_post_ID) . '》</td>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">' . trim($comment->comment_content) . '</td>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><a href="' . get_comment_link($comment->comment_ID) . '" style="color:#1E5494;text-decoration:none;vertical-align:middle;" target="_blank">查看留言</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    <div style="font-size:13px;color:#a0a0a0;padding-top:10px">' . __('该邮件由系统自动发出，如果不是您本人操作，请忽略此邮件。', 'kratos') . '</div>
                    <div class="qmSysSign" style="padding-top:20px;font-size:12px;color:#a0a0a0;">
                        <p style="color:#a0a0a0;line-height:18px;font-size:12px;margin:5px 0;">' . htmlspecialchars_decode(get_option('blogname'), ENT_QUOTES) . '</p>
                        <p style="color:#a0a0a0;line-height:18px;font-size:12px;margin:5px 0;"><span style="border-bottom:1px dashed #ccc;" t="5" times="">' . wp_date("Y年m月d日", time()) . '</span></p>
                    </div>
                </div>
            </div>
        </div>';
    $from = "From: \"" . htmlspecialchars_decode(get_option('blogname'), ENT_QUOTES) . "\" <$Len_Smtp_Module_5>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail($to, $subject, $message, $headers);
  }
}
add_action('comment_unapproved_to_approved', 'comment_approved');

function comment_notify($comment_id)
{
  $comment = get_comment($comment_id);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  $spam_confirmed = $comment->comment_approved;
  if (($parent_id != '') && ($spam_confirmed == '1')) {
    $Len_Smtp_Module_5 = _len('Len_Smtp_Module_5');
    $to = trim(get_comment($parent_id)->comment_author_email);
    $subject = __('[通知]您的留言有了新的回复', 'kratos');
    $message = '
            <div style="background:#ececec;width: 100%;padding: 50px 0;text-align:center;">
            <div style="background:#fff;width:750px;text-align:left;position:relative;margin:0 auto;font-size:14px;line-height:1.5;">
                    <div style="zoom:1;padding:25px 40px;background:#518bcb; border-bottom:1px solid #467ec3;">
                        <h1 style="color:#fff; font-size:25px;line-height:30px; margin:0;"><a href="' . get_option('home') . '" style="text-decoration: none;color: #FFF;">' . htmlspecialchars_decode(get_option('blogname'), ENT_QUOTES) . '</a></h1>
                    </div>
                <div style="padding:35px 40px 30px;">
                    <h2 style="font-size:18px;margin:5px 0;">' . __('您好，', 'kratos') . trim(get_comment($parent_id)->comment_author) . '：</h2>
                    <p style="color:#313131;line-height:20px;font-size:15px;margin:20px 0;">' . __('您的留言有了新的回复，摘要信息如下：', 'kratos') . '</p>
                        <table cellspacing="0" style="font-size:14px;text-align:center;border:1px solid #ccc;table-layout:fixed;width:500px;">
                            <thead>
                                <tr>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf;" width="235px;">' . __('原文', 'kratos') . '</th>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf;" width="235px;">' . __('回复', 'kratos') . '</th>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf;" width="100px;">' . __('作者', 'kratos') . '</th>
                                    <th style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:normal;color:#a0a0a0;background:#eee;border-color:#dfdfdf;" width="90px;" >' . __('操作', 'kratos') . '</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">' . trim(get_comment($parent_id)->comment_content) . '</td>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">' . trim($comment->comment_content) . '</td>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">' . trim($comment->comment_author) . '</td>
                                    <td style="padding:5px 0;text-indent:8px;border:1px solid #eee;border-width:0 1px 1px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><a href="' . get_comment_link($comment->comment_ID) . '" style="color:#1E5494;text-decoration:none;vertical-align:middle;" target="_blank">' . __('查看回复', 'kratos') . '</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    <div style="font-size:13px;color:#a0a0a0;padding-top:10px">' . __('该邮件由系统自动发出，如果不是您本人操作，请忽略此邮件。', 'kratos') . '</div>
                    <div class="qmSysSign" style="padding-top:20px;font-size:12px;color:#a0a0a0;">
                        <p style="color:#a0a0a0;line-height:18px;font-size:12px;margin:5px 0;">' . htmlspecialchars_decode(get_option('blogname'), ENT_QUOTES) . '</p>
                        <p style="color:#a0a0a0;line-height:18px;font-size:12px;margin:5px 0;"><span style="border-bottom:1px dashed #ccc;" t="5" times="">' . wp_date("Y年m月d日", time()) . '</span></p>
                    </div>
                </div>
            </div>
        </div>';
    $from = "From: \"" . htmlspecialchars_decode(get_option('blogname'), ENT_QUOTES) . "\" <$Len_Smtp_Module_5>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail($to, $subject, $message, $headers);
  }
}
add_action('comment_post', 'comment_notify');
add_action('comment_unapproved_to_approved', 'comment_notify');
