<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$nama = $GET['name'];
$email = $GET['email'];
$subject = $GET['subject'];
$msg = $GET['msg'];

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.zab.co.id ';
$mail->SMTPAuth = true;
$mail->Username = 'hanafi@zab.co.id';
$mail->Password = 'jasmine1968';
$mail->SMTPSecure = '';
$mail->Port = 26;

$mail->setFrom('hanafi@zab.co.id', 'Webmail');
//$mail->addReplyTo('hanafi2268@gmail', 'Codingan');

// Menambahkan penerima
//$mail->addAddress('hanafi@mrosemulti.com');

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
//$mail->addCC('cc@contoh.com');
//$mail->addBCC('bcc@contoh.com');

// Subjek email
//$mail->Subject = 'Kirim Email via SMTP Server di PHP menggunakan PHPMailer';
$mail->Subject = $subject;

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "<p> From : ".$nama.
    "<br>Email : ".$email.
	<br>Message : ".$msg</p>";

$mail->Body = $mailContent;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file1.pdf');
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){}
    
else{}
    
