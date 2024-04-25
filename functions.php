<?php
//函数文件
require_once get_theme_file_path('/Functions/Len-Admin-Func/Fnc.php');

// function mail_smtp($phpmailer)
// {

//   $phpmailer->isSMTP();
//   $phpmailer->SMTPAuth = true;
//   $phpmailer->CharSet = "utf-8";
//   $phpmailer->SMTPSecure = 'ssl';
//   $phpmailer->Port = '465';
//   $phpmailer->Host = 'smtp.qq.com';
//   $phpmailer->From = '2650684600@qq.com';
//   $phpmailer->Username = '2650684600@qq.com';
//   $phpmailer->Password = 'zttpmmsloylzecca';
// }
// add_action('phpmailer_init', 'mail_smtp');

// add_action('wp_ajax_send_test_email', 'send_test_email');
// add_action('wp_ajax_nopriv_send_test_email', 'send_test_email');

// function send_test_email()
// {


//   $to = 'len@tqlen.com';
//   $subject = 'Test Email';
//   $message = 'This is a test email sent using AJAX.';
//   $headers = array('Content-Type: text/html; charset=UTF-8');

//   $result = wp_mail($to, $subject, $message, $headers);

//   return $result;

//   wp_die();
// }


