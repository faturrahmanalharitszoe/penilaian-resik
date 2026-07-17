<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$nama = $_GET['nama']; 
$pdf = $_GET['pdf'];
$email = $_GET['email']; 
$no = $_GET['no'];
//$subject = '(NO REPLY) - Confirmation Email from RESIK CEMERLANG';
$subject = '(NO REPLY) - CV ID # '.$no; 
//$msg = $_POST['message']; 
$mailContent = 'CV ID # '.$no;


// Konfigurasi SMTP

$mail->isSMTP();
$mail->Host = 'srv21.niagahoster.com';
$mail->SMTPAuth = true;
$mail->Username = 'recruitment@resikcemerlang.com';
$mail->Password = 'recruitment';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('recruitment@resikcemerlang.com', 'Recruitment');

//$mail->addReplyTo('hanafi2268@gmail', 'Codingan');

// Menambahkan penerima
$mail->addAddress('recruitment@resikcemerlang.id');
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
$mail->addAttachment('pdf/'.$pdf);
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
 //header('Location: form.php');
// if (file_exists('pdf/'.$pdf)) {unlink('pdf/'.$pdf);}
 //exit;
$mensagemRetorno = 'Error: '. print($mail->ErrorInfo);
    echo $mensagemRetorno;
}
else{
 //header('Location: form.php');
 //exit;
$mensagemRetorno = 'E-mail sent!';
    echo $mensagemRetorno;
     header('location:kirim_email_lamaran.php?nama='.$nama.'&email='.$email.'&no='.$no.'&pdf='.$pdf);
}
    
