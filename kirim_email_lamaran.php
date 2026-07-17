<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$nama = $_GET['nama']; 
$email = $_GET['email']; 
$pdf = $_GET['pdf'];
$no = $_GET['no'];
//$subject = '(NO REPLY) - Confirmation Email from RESIK CEMERLANG';
$subject = '(No-Reply) - Confirmation Email for ID # '.$no; 
//$msg = $_POST['message']; 
$mailContent = '<h1 style="color:#777676;"><center>Hai,</center></h1>
<h1 style="color:#777676;"><center>'.$nama.'</center></h1>
<h5><br></h5>
<h1 style="color:#FFC300;"><center>CV Anda telah terkirim</center><h1>

<h1 style="color:#777676;"><center>Nomor CV Anda : '.$no.'</center></h1>
<hr style="color:#d5d4d4;">
<h6 style="color:#FF0000;"><center>Harap cetak dokumen terlampir saat anda dipanggil ke kantor pusat untuk mengikuti proses selanjutnya.</center></h6>
<h6 style="color:#FF0000;"><center>Terima kasih.</center></h6>
<h5><b5></h5>
<h4 style="color:#777676;"><center>Email ini merupakan konfirmasi bahwa CV anda telah diterima oleh PT. Resik Cemerlang</center></h4>
<hr style="color:#b8b7b7;">
<h4 style="color:#777676;"><center>Email ini dikirim oleh : PT RESIK CEMERLANG
<br>Graha Wijaya, Jl. Melawai IX No.6, Kebayoran Baru, 
<br>Jakarta Selatan 12160</center></h4>
<hr style="color:#b8b7b7;">'; 


// Konfigurasi SMTP

$mail->isSMTP();
$mail->Host = 'srv113.niagahoster.com';
$mail->SMTPAuth = true;
$mail->Username = 'recruitment@resikcemerlang.com';
$mail->Password = 'recruitment';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('recruitment@resikcemerlang.com', 'Recruitment PT. Resik Cemerlang (no-reply)');

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
$mail->addAttachment('pdf/'.$pdf);
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
   alert("CV Successfully sent") 
   window.location.href = 'career.php';
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
    
