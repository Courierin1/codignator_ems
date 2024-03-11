

<?php defined('BASEPATH') OR exit('No direct script access allowed');
// $config = [
// 'protocol' => 'smtp',
// 'smtp_host' => 'smtp.gmail.com',
// 'smtp_port' => 587,
// 'smtp_crypto' => 'tls',
// 'mailtype' => 'html',
// 'smtp_user' => 'yourdesigndemo2@gmail.com',
// 'smtp_pass' => 'fasejukdcocaavww',
// 'crlf' => "\r\n",
// 'newline' => "\r\n",
// 'charset'=>'utf-8'
// ];
// // email
// $config['protocol']='smtp';
// // $config['mailpath'] = "/usr/bin/msmtp";
// $config['smtp_host']='smtp.gmail.com';
// $config['smtp_port']=587;
// $config['smtp_timeout']=30;
// $config['smtp_user']='yourdesigndemo2@gmail.com';
// $config['smtp_pass']='fasejukdcocaavww';
// $config['charset']='utf-8';  
// $config['newline']="\r\n";

// // email
// $config['protocol']='smtp';
// // $config['mailpath'] = "/usr/bin/msmtp";
// $config['smtp_host']='smtp.gmail.com';
// $config['smtp_port']=587;
// $config['smtp_timeout']=30;
// $config['smtp_user']='yourdesigndemo2@gmail.com';
// $config['smtp_pass']='fasejukdcocaavww';
// $config['charset']='utf-8';  
// $config['newline']="\r\n";
// MAIL_MAILER=smtp
// MAIL_HOST=mail.gowushu.com
// MAIL_PORT=465
// MAIL_USERNAME=admin@gowushu.com
// MAIL_PASSWORD="HSJmBN7RF6Ax"
// MAIL_FROM_ADDRESS=admin@gowushu.com
// MAIL_FROM_NAME="${APP_NAME}"
// MAIL_ENCRYPTION =ssl
$config = [
    'protocol' => 'smtp',
    'smtp_host' => 'mail.gowushu.com',
    'smtp_port' => 465,
    'smtp_crypto' => 'ssl',
    'mailtype' => 'html',
    'smtp_user' => 'admin@gowushu.com',
    'smtp_pass' => 'HSJmBN7RF6Ax',
    'crlf' => "\r\n",
    'newline' => "\r\n",
    'charset'=>'utf-8'
    ];