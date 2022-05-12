<?php
error_reporting(0);
session_start();
$CONGIG = [ 
  "host_name"  => 'localhost',
  "username"  => 'hieupro',
  "password"  => 'hieupro',
  "database"  => 'hieupro',
];
$star = (object) $CONGIG;
$kunloc = new mysqli($star->host_name, $star->username, $star->password, $star->database);
$kunloc->set_charset('UTF8');
if ($kunloc->connect_error) die('Error : ('. $kunloc->connect_errno .') '. $kunloc->connect_error); 
date_default_timezone_set('Asia/Ho_Chi_Minh');

/* CẤU HÌNH EMAIL CONFIRM */
$emailer = "bincuteinfo@gmail.com";
$passmailer = "Hieupro";
/* Setup Thesieure.com */
$THESIEURE = [
 "loai"=>"The Sieu Re",
 "stk"=>"hieu1891",
 "name"=>"Ngọc Hiếu",
 "chinhanh"=>"null",
 "username" => "hieu1891",
 "password" => "hieupro",
 "noidung"=>"hieupro",
];
/* Chiết khấu admin */
$CHIETKHAU = [
 "admin"=> 0,
 "ctv"=> 0,
 "daily"=> 0,
 "member"=> 0,
];
/* Thông tin cấu hình */
$CONTACT = [
 "admin" => "Ngọc Hiếu",
 "email" => "bincuteionfo@gmail.com",
 "name" => "Ngọc Hiếu",
 "idfb" => "100043039299993",
 "chat" => "https://facebook.com/messages/t/100043039299993",
];
/////////////////////////
$WEBSITE_URL = "https://dichvu77.net";
$domain_url = "https://dichvu77.net";
$domain_name = "Dichvu77";
////////////////////////
$version = "1.0";
$verify = '<img src="/img/verify.png" data-toggle="tooltip" title="Tài khoản đã được xác minh" style="margin-top:-3px;width:15px;height:15px">';
$coin = '<img src="https://i.giphy.com/media/Ihy0gO3MVhUqSY2jvS/giphy.webp" style="margin-top:-5px;width:20px;height:20px">';
/* Function 1 */
include_once("API/functions.php");
/* Function 2 */
include_once("API/functions2.php");
/* Mailler */
include_once("Mailer/PHPMailerAutoload.php");
#----------------------------------------------------------------   
function SendEmail($email_nhan,$subject,$message,$bcc){
    global $emailer,$passmailer;
    $mail = new PHPMailer(); 
    $mail->SMTPDebug = 0;            
    $mail->isSMTP();         
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;   
    $mail->Username = $emailer;        
    $mail->Password = $passmailer;    
    $mail->SMTPSecure = 'tls'; 
    $mail->Port = 587;  
    $mail->setFrom('m', $bcc);
    $mail->addAddress($email_nhan);
    $mail->addReplyTo('m', $bcc);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->CharSet = 'UTF-8';
    $send = $mail->send();
    return $send;
}
?>