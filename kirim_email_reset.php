<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$email = $_POST['email']; 
$subject = '(No-Reply) - Request Reset Password'; 
//$msg = $_POST['message']; 
$mailContent = '<h1 style="color:#777676;"><center></center></h1>
<h5><br></h5>
<h4 style="color:#777676;"><center>Silahkan klik link dibawah ini untuk reset password anda</center></h4>
<h4 style="color:#777676;"><center>Terima kasih.</center></h4>
<h5><b5></h5>
<h1 style="color:#777676;"><center><a href ="http://www.resikcemerlang.com/nilai/reset_password.php?email='.$email.'">Reset</a></center></h1>
<hr style="color:#b8b7b7;">
<h4 style="color:#777676;"><center>Email ini dikirim otomatis dari System
<br><br>PT RESIK CEMERLANG
<br>Graha Wijaya, Jl. Melawai IX No.6, Kebayoran Baru,
<br>Jakarta Selatan 12160</center></h4>
<hr style="color:#b8b7b7;">'; 

// Konfigurasi SMTP

$mail->isSMTP();
$mail->Host = 'srv113.niagahoster.com';
$mail->SMTPAuth = true;
$mail->Username = 'system@resikcemerlang.com';
$mail->Password = 'R3s!k2021';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('system@resikcemerlang.com', 'System PT. Resik Cemerlang (no-reply)');
//$mail->addReplyTo('hanafi2268@gmail', 'Codingan');

// Menambahkan penerima
//$mail->addAddress('hanafi@mrosemulti.com');
$mail->addAddress($email);

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
//$mailContent = "From : ".$name.", Email : ".$email.",Message : ".$msg; 

//$mail->Body = $mailContent;

$mail->Body = $mailContent; 

// Menambahkan lampiran
//$mail->addAttachment('pdf/'.$pdf);
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
 //header('Location: form.php');
 //exit;
$mensagemRetorno = 'Error: '. print($mail->ErrorInfo);
    echo $mensagemRetorno;
}
else{
?>
<script>
//if (window.confirm('Really go to another page?'))
// {
   alert("Request Reset Password Successfully sent") 
   window.location.href = 'login.php';
// }
 </script>
 <?php
//exit;
 //header('Location: form.php');
 //if (file_exists('pdf/'.$pdf)) {unlink('pdf/'.$pdf);}
 
 exit;
//$mensagemRetorno = 'E-mail sent!';
//    echo $mensagemRetorno;
}
    
