<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$name = $_POST['name']; 
$email = $_POST['email']; 
$msg = $_POST['message'];
$subject = $_POST['subject'];
//$subject = $_POST['subject']; 
//$msg = $_POST['message']; 
//$mailContent = 'Terima kasih sdr/sdri '.$nama.', Lamaran kerja Anda akan kami proses terlebih dahulu, mohon menunggu proses selanjutnya'; 

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'srv21.niagahoster.com';
$mail->SMTPAuth = true;
$mail->Username = 'customercare@resikcemerlang.com';
$mail->Password = 'customercare';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('customercare@resikcemerlang.com', 'Customer Care');
//$mail->addReplyTo('hanafi2268@gmail', 'Codingan');

// Menambahkan penerima
$mail->addAddress('customercare@resikcemerlang.id');
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
$mailContent = "From : ".$name.", Email : ".$email.",Message : ".$msg; 

$mail->Body = $mailContent;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
 ?>
 <script>
  alert('Send Message Failed');
 </script>
 <?php
 //header('Location: contact.html');
 //exit;
 
}
    
else{
 ?>
<script>
//if (window.confirm('Really go to another page?'))
// {
   alert("Message Successfully sent") 
   window.location.href = 'contact.html';
// }
 </script>
 <?php
 //header('Location: contact.html');
 exit;
}
    
