<?php
require 'PHPMailer/PHPMailerAutoload.php';
PHPMailer::$validator = 'php';
$mail = new PHPMailer;
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
//$email = $_GET['email']; 
$pdf = $_GET['pdf'];
$id = $_GET['id'];
//
$qpenilaian=mysqli_query($koneksi,"select * from penilaian where id = '$id'");
$dpenilaian = mysqli_fetch_array($qpenilaian);
$karyawan = $dpenilaian['karyawan'];
$divisi = $dpenilaian['divisi'];
$jabatan = $dpenilaian['jabatan'];
$penilai = $dpenilaian['penilai'];
$mengetahui = $dpenilaian['mengetahui_2'];
$menyetujui = $dpenilaian['menyetujui'];

// Fallback to penyetuju if mengetahui_2 is empty or '-'
if ($mengetahui == '-' || $mengetahui == '') {
    $mengetahui = $menyetujui;
}

$qmengetahui = mysqli_query($koneksi,"select * from karyawan where nama = '$mengetahui'");
$dmengetahui = mysqli_fetch_array($qmengetahui);
$email_mengetahui = $dmengetahui['email'];

?>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
	<script type="text/javascript" src="js/sweetalert2.min.js"></script>
	<script>
	
	/*alert("Menunggu Persetujuan : "+"Bpk/Ibu <?php echo $mengetahui; ?>");*/
	echo "<script> window.onload = function() {
        myfunction();
        }; </script>";
	function myfunction()
        {
            var mengetahui = "<?php echo $mengetahui; ?>"; 
            swal.fire("Menunggu Persetujuan : Bpk/Ibu "+mengetahui);
        }
    </script>    
<?php
$query=mysqli_query($koneksi,"select * from karyawan where nama = '$karyawan'");
$dquery=mysqli_fetch_array($query);
$divisi=$dquery['divisi'];
$divisi2=$dquery['divisi2'];
$divisi3=$dquery['divisi3'];
$jabatan=$dquery['jabatan'];
//$subject = '(NO REPLY) - Confirmation Email from RESIK CEMERLANG';
$subject = '(No-Reply) - Form Penilaian '.$karyawan; 
//$msg = $_POST['message'];
if ($divisi2 == 'NONE')
{
    $mailContent = '<h2 style="color:#777676;"><center>Hai,</center></h2>
    <h2 style="color:#777676;"><center>Bpk/Ibu '.$mengetahui.'</center></h2>
    <hr style="color:#b8b7b7;">
    <h3 style="color:#777676;"><center>Terlampir Form Hasil penilaian Karyawan</center></h3>
    <h4 style="color:#777676;"><center>Penilai     : '.$penilai.'</center></h4>
    <h4 style="color:#777676;"><center>Nama        : '.$karyawan.'</center></h4>
    <h4 style="color:#777676;"><center>Divisi      : '.$divisi.'</center></h4>
    <h4 style="color:#777676;"><center>Jabatan     : '.$jabatan.'</center></h4>
    <hr style="color:#b8b7b7;">
    <h5><b5></h5>
    <h4 style="color:#777676;"><center>Silahkan klik link dibawah ini untuk Approve atau Reject</center></h4>
    <!-- PRODUCTION:
    <h1 style="color:#777676;"><center><a href ="https://resikcemerlang.com/penilaian/update_approval_2.php?id='.$id.'"> Approve </a>
    &nbsp;&nbsp;<a href ="https://resikcemerlang.com/penilaian/edit_penilaian2.php?id='.$id.'"> Reject </a></center></h1>
    -->
    <h1 style="color:#777676;"><center><a href ="https://resikcemerlang.com/penilaian/update_approval_2.php?id='.$id.'"> Approve </a>
    &nbsp;&nbsp;<a href ="https://resikcemerlang.com/penilaian/edit_penilaian2.php?id='.$id.'"> Reject </a></center></h1>
    <h4 style="color:#777676;"><center>Terima kasih.</center></h4>
    <h5><b5></h5>
    <hr style="color:#b8b7b7;">
    <h4 style="color:#777676;"><center>Email ini dikirim otomatis dari System
    <br>
    <br>PT RESIK CEMERLANG
    <br>Graha Wijaya, Jl. Melawai IX No.6, Kebayoran Baru,
    <br>Jakarta Selatan 12160</center></h4>
    <hr style="color:#b8b7b7;">';
}
else
if($divisi3 == 'NONE')
{
    $mailContent = '<h2 style="color:#777676;"><center>Hai,</center></h2>
    <h2 style="color:#777676;"><center>Bpk/Ibu '.$mengetahui.'</center></h2>
    <hr style="color:#b8b7b7;">
    <h3 style="color:#777676;"><center>Terlampir Form Hasil penilaian Karyawan</center></h3>
    <h4 style="color:#777676;"><center>Penilai     : '.$penilai.'</center></h4>
    <h4 style="color:#777676;"><center>Nama        : '.$karyawan.'</center></h4>
    <h4 style="color:#777676;"><center>Divisi      : '.$divisi.' / '.$divisi2.'</center></h4>
    <h4 style="color:#777676;"><center>Jabatan     : '.$jabatan.'</center></h4>
    <hr style="color:#b8b7b7;">
    <h5><b5></h5>
    <h4 style="color:#777676;"><center>Silahkan klik link dibawah ini untuk Approve atau Reject</center></h4>
    <!-- PRODUCTION:
    <h1 style="color:#777676;"><center><a href ="https://resikcemerlang.com/penilaian/update_approval_2.php?id='.$id.'"> Approve </a>
    &nbsp;&nbsp;<a href ="https://resikcemerlang.com/penilaian/edit_penilaian2.php?id='.$id.'"> Reject </a></center></h1>
    -->
    <h1 style="color:#777676;"><center><a href ="https://resikcemerlang.com/penilaian/update_approval_2.php?id='.$id.'"> Approve </a>
    &nbsp;&nbsp;<a href ="https://resikcemerlang.com/penilaian/edit_penilaian2.php?id='.$id.'"> Reject </a></center></h1>
    <h4 style="color:#777676;"><center>Terima kasih.</center></h4>
    <h5><b5></h5>
    <hr style="color:#b8b7b7;">
    <h4 style="color:#777676;"><center>Email ini dikirim otomatis dari System
    <br>
    <br>PT RESIK CEMERLANG
    <br>Graha Wijaya, Jl. Melawai IX No.6, Kebayoran Baru,
    <br>Jakarta Selatan 12160</center></h4>
    <hr style="color:#b8b7b7;">';
}
else
{
    $mailContent = '<h2 style="color:#777676;"><center>Hai,</center></h2>
    <h2 style="color:#777676;"><center>Bpk/Ibu '.$mengetahui.'</center></h2>
    <hr style="color:#b8b7b7;">
    <h3 style="color:#777676;"><center>Terlampir Form Hasil penilaian Karyawan</center></h3>
    <h4 style="color:#777676;"><center>Penilai     : '.$penilai.'</center></h4>
    <h4 style="color:#777676;"><center>Nama        : '.$karyawan.'</center></h4>
    <h4 style="color:#777676;"><center>Divisi      : '.$divisi.' / '.$divisi2.' / '.$divisi3.'</center></h4>
    <h4 style="color:#777676;"><center>Jabatan     : '.$jabatan.'</center></h4>
    <hr style="color:#b8b7b7;">
    <h5><b5></h5>
    <h4 style="color:#777676;"><center>Silahkan klik link dibawah ini untuk Approve atau Reject</center></h4>
    <!-- PRODUCTION:
    <h1 style="color:#777676;"><center><a href ="https://resikcemerlang.com/penilaian/update_approval_2.php?id='.$id.'"> Approve </a>
    &nbsp;&nbsp;<a href ="https://resikcemerlang.com/penilaian/edit_penilaian2.php?id='.$id.'"> Reject </a></center></h1>
    -->
    <h1 style="color:#777676;"><center><a href ="https://resikcemerlang.com/penilaian/update_approval_2.php?id='.$id.'"> Approve </a>
    &nbsp;&nbsp;<a href ="https://resikcemerlang.com/penilaian/edit_penilaian2.php?id='.$id.'"> Reject </a></center></h1>
    <h4 style="color:#777676;"><center>Terima kasih.</center></h4>
    <h5><b5></h5>
    <hr style="color:#b8b7b7;">
    <h4 style="color:#777676;"><center>Email ini dikirim otomatis dari System
    <br>
    <br>PT RESIK CEMERLANG
    <br>Graha Wijaya, Jl. Melawai IX No.6, Kebayoran Baru,
    <br>Jakarta Selatan 12160</center></h4>
    <hr style="color:#b8b7b7;">';
}
// Konfigurasi SMTP
//$mail->isSMTP();
//$mail->Host = 'srv113.niagahoster.com';
//$mail->SMTPAuth = true;
//$mail->Username = 'system@resikcemerlang.com';
//$mail->Password = 'R3s!k2021';
//$mail->SMTPSecure = 'ssl';
//$mail->Port = 465;
//$mail->setFrom('system@resikcemerlang.com', 'System PT. Resik Cemerlang (no-reply)');

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.resikcemerlang.com';
$mail->SMTPAuth = true;
$mail->Username = 'penilaianresik@resikcemerlang.com';
$mail->Password = 'Resik1983';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('penilaianresik@resikcemerlang.com', 'System PT. Resik Cemerlang (no-reply)');
//$mail->addReplyTo('hanafi2268@gmail', 'Codingan');

// Menambahkan penerima
//$mail->addAddress('hanafi@mrosemulti.com');
if (!empty($email_mengetahui)) {
    $mail->addAddress($email_mengetahui);
} else {
    echo "Email mengetahui kosong!";
    exit;
}

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
</script>
<script>
//if (window.confirm('Really go to another page?'))
// {
   var email = "<?php echo isset($email_mengetahui2) ? $email_mengetahui2 : ''; ?>";
   var nama = "<?php echo $penilai; ?>";
   /*window.location.href = 'form.php?email='+email+'&nama='+nama;*/
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
?>

    
