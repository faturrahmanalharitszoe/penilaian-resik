<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$nama = $_GET['nama']; 
$email = $_GET['email']; 
$no = $_GET['nomor'];
$pass = $_GET['id'];
$temp = str_replace("e60b7b98b43be1c85903fda55711ab47","",$pass);
//e60b7b98b43be1c85903fda55711ab47
$password = base64_decode($temp);
$subject = '(No-Reply) - Activation Confirmation Email'; 
//$msg = $_POST['message']; 
$mailContent = '<h1 style="color:#777676;"><center>Hai,</center></h1>
<h1 style="color:#777676;"><center>Bpk/Ibu '.$nama.'</center></h1>
<h5><br></h5>
<h4 style="color:#777676;"><center>Silahkan klik link dibawah ini untuk aktivasi dan login</center></h4>
<h4 style="color:#777676;"><center>dengan Email anda dan password anda : </center></h4>
<h3 style="color:#777676;"><center>'.$password.'</center></h3>
<h4 style="color:#777676;"><center>Terima kasih.</center></h4>
<h5><b5></h5>
<h1 style="color:#777676;"><center><a href ="http://www.resikcemerlang.com/penilaian/activasi.php?email='.$email.'">Aktivasi</a></center></h1>
<hr style="color:#b8b7b7;">
<h4 style="color:#777676;"><center>Email ini dikirim otomatis dari System
<br>PT RESIK CEMERLANG</center></h4></center>
<br>Graha Wijaya, Jl. Melawai IX No.6, Kebayoran Baru,</center></h4> 
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
   alert("Registration Successfully sent, please check your email") 
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
    
