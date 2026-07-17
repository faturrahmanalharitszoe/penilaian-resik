<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
$email = $_GET['email']; 
$pdf = $_GET['pdf'];
$id = $_GET['id'];
$qpenilaian=mysqli_query($koneksi,"select * from penilaian where id = '$id'");
$dpenilaian=mysqli_fetch_array($qpenilaian);
$karyawan=$dpenilaian['karyawan'];
$penilai=$dpenilaian['penilai'];
$qdirut = mysqli_query($koneksi,"select * from karyawan where id_jabatan = 2");
$ddirut = mysqli_fetch_array($qdirut);
$emaildirut = $ddirut['email'];
$dirut = $ddirut['nama'];
$query=mysqli_query($koneksi,"select * from karyawan where nama = '$karyawan'");
$dquery=mysqli_fetch_array($query);
$divisi=$dquery['divisi'];
$jabatan=$dquery['jabatan'];
//$subject = '(NO REPLY) - Confirmation Email from RESIK CEMERLANG';
$subject = '(No-Reply) - Form Penilaian '.$karyawan; 
//$msg = $_POST['message']; 
$mailContent = '<h1 style="color:#777676;"><center>Hai,</center></h1>
<h1 style="color:#777676;"><center>'.$dirut.'</center></h1>
<hr style="color:#b8b7b7;">
<h3 style="color:#777676;"><center>Terlampir Form Hasil penilaian Karyawan</center></h3>
<h4 style="color:#777676;"><center>Penilai     : '.$penilai.'</center></h4>
<h4 style="color:#777676;"><center>Nama        : '.$karyawan.'</center></h4>
<h4 style="color:#777676;"><center>Divisi      : '.$divisi.'</center></h4>
<h4 style="color:#777676;"><center>Jabatan     : '.$jabatan.'</center></h4>
<hr style="color:#b8b7b7;">
<h5><b5></h5>
<h4 style="color:#777676;"><center>Silahkan klik link dibawah ini untuk Approve atau Reject</center></h4>
<h1 style="color:#777676;"><center><a href ="https://resikcemerlang.com/penilaian/approve_2.php?id='.$id.'"> Approve </a>
&nbsp;&nbsp;<a href ="https://resikcemerlang.com/penilaian/reject_2.php?id='.$id.'"> Reject </a></center></h1>
<h4 style="color:#777676;"><center>Terima kasih.</center></h4>
<h5><b5></h5>
<hr style="color:#b8b7b7;">
<h4 style="color:#777676;"><center>Email ini dikirim otomatis dari System
<br>
<br>PT RESIK CEMERLANG
<br>Graha Wijaya, Jl. Melawai IX No.6, Kebayoran Baru, 
<br>Jakarta Selatan 12160</center></h4>
<hr style="color:#b8b7b7;">'; 

// Konfigurasi SMTP

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'penilaianresik@gmail.com';
$mail->Password = 'R3s!k2021';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('penilaianresik@gmail.com', 'System PT. Resik Cemerlang (no-reply)');

//$mail->addReplyTo('hanafi2268@gmail', 'Codingan');

// Menambahkan penerima
//$mail->addAddress('hanafi@mrosemulti.com');
$mail->addAddress($emaildirut);

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
$mail->addAttachment('form_pdf/'.$pdf);
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
window.close;
}
</script>
<script>
//if (window.confirm('Really go to another page?'))
// {
   var email = "<?php echo $email; ?>";
   var nama = "<?php echo $penilai; ?>";
   window.location.href = 'form.php?email='+email+'&nama='+nama;
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
    
