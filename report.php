<?php
//session_start();
//ob_start();
date_default_timezone_set("Asia/Bangkok");
include("config.php"); //buat koneksi ke database
$ktp = $_GET['ktp'];
echo($ktp);
$db = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'resik';

//$query  = mysqli_query("SELECT * FROM datapelamar ORDER BY id DESC LIMIT 1");
$sql    = "SELECT * FROM datapelamar WHERE no_ktp = '$ktp'";
$query  = mysqli_query($con,$sql) or die (mysqli_error($con));
//$query = mysqli_query($myConnection, $sqlCommand) or die (mysqli_error($myConnection)); 

// might as well limit results to associative array since that's how you're using it:
$data = $query->fetch_assoc();
$pekerjaan  = $data['pekerjaan'];

$id     = $data['id'];
$email  = $data['email'];
$nama   = $data['nama'];
$vaksin = $data['vaksin'];


$kerja = mysqli_query($con,"SELECT nama_pekerjaan,inisial FROM pekerjaan WHERE id_pekerjaan='".$pekerjaan."'");
$data_kerja = mysqli_fetch_array($kerja);

$bagian  = $data['bagian'];
$kerja2 = mysqli_query($con,"SELECT nama_bagian,inisial FROM bagian WHERE id_bagian='".$bagian."'");
$data_kerja2 = mysqli_fetch_array($kerja2);

$provinsi  = $data['provinsi_kerja'];
$provinsi2 = mysqli_query($con,"SELECT nama_provinsi FROM provinsi WHERE id_provinsi='".$provinsi."'");
$data_provinsi = mysqli_fetch_array($provinsi2);

$kota  = $data['kota_kerja'];
$kota2 = mysqli_query($con,"SELECT nama_kota FROM kota WHERE id_kota='".$kota."'");
$data_kota = mysqli_fetch_array($kota2);

$inisial1 = $data_kerja['inisial'];
$inisial2 = $data_kerja2['inisial'];
if ($inisial1 == '')
 {
  $init = $inisial2;
 }
else
 {
  $init = $inisial1;
 } 


?>


<?php
//        koneksi ke database
//        mysql_connect('localhost', 'u6114745_root', 'kosong');
//        mysql_select_db('u6114745_resik');
      



include "fungsi_romawi.php";
$bulan = date('n');
$romawi = getRomawi($bulan);
$tahun = date ('Y');
$nomor = "/".$romawi."/".$tahun."/WEB";
// membaca kode  terbesar dari penomoran yang ada didatabase berdasarkan tanggal

$no= $id;
//Membuat Nomor dengan awalan depan 0 misalnya , 01,02 
//Jika ingin 003 ,tinggal ganti %03
$kode =  sprintf("%04s", $no);
$nomorbaru = $init."/".$kode.$nomor;
echo $nomorbaru

?>



<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['id']; ?></title>
<title>Form Pendaftaran</title>
<link href="print.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<img src="header.png" width="700" height="71" />
<br>
<br>
<div class="formulir-header">
<hr size="2px">
<br>
<strong>FORMULIR PENDAFTARAN</strong><br />
Nomor : <?php echo $nomorbaru;?>
</div>

<br>
<br>
<br>
<br>
<?php
echo '<table width="800" border="0" cellpadding="5" cellspacing="3" >
  <tr>
    <td width="180">Pekerjaan</td>
    <td width="10">:</td>
    <td width="250">'.$data_kerja['nama_pekerjaan'].'</td>
  </tr>
  <tr>
    <td>Bagian yang Dipilih</td>
    <td>:</td>
    <td>'.$data_kerja2['nama_bagian'].'</td>
  </tr>
  <tr>
    <td>Nama Lengkap</td>
    <td>:</td>
    <td>'.$data['nama'].'</td>
  </tr>
   <tr>
    <td>No. KTP</td>
    <td>:</td>
    <td>'.$data['no_ktp'].'</td>
  </tr>
  <tr>
    <td>No. KK</td>
    <td>:</td>
    <td>'.$data['no_kk'].'</td>
  </tr>
  <tr>
    <td>Alamat Lengkap</td>
    <td>:</td>
    <td>'.$data['alamat'].'</td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td>'.$data['jenis_kelamin'].'</td>
  </tr>
  <tr>
    <td>Tempat Lahir</td>
    <td>:</td>
    <td>'.$data['tempat_lahir'].'</td>
  </tr>
  <tr>
    <td>Tanggal Lahir</td>
    <td>:</td>
    <td>'.$data['tgl_lahir'].'</td>
  </tr>
  <tr>
    <td>Status</td>
    <td>:</td>
    <td>'.$data['status'].'</td>
  </tr>
  <tr>
    <td>Pendidikan</td>
    <td>:</td>
    <td>'.$data['pendidikan'].'</td>
  </tr>
  <tr>
    <td>No. Telp/HP</td>
    <td>:</td>
    <td>'.$data['no_tlp'].'</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>:</td>
    <td>'.$data['email'].'</td>
  </tr>
  <tr>
    <td>Nama Ibu</td>
    <td>:</td>
    <td>'.$data['nama_ibu'].'</td>
  </tr>
  <tr>
    <td>Sim</td>
    <td>:</td>
    <td>'.$data['sim'].'</td>
  </tr>
  <tr>
    <td>No. Sim</td>
    <td>:</td>
    <td>'.$data['no_sim'].'</td>
  </tr>
  <tr>
    <td>BPJS Kesehatan</td>
    <td>:</td>
    <td>'.$data['bpjs_kesehatan'].'</td>
  </tr>
  <tr>
    <td>BPJS Ketenagakerjaan</td>
    <td>:</td>
    <td>'.$data['bpjs_tenagakerja'].'</td>
  </tr>
  <tr>
    <td>Bahasa</td>
    <td>:</td>
    <td>'.$data['bahasa'].'</td>
  </tr>
  <tr>
    <td>Pengalaman</td>
    <td>:</td>
    <td>'.$data['pengalaman'].'</td>
  </tr>
  <tr>
    <td>Keahlian</td>
    <td>:</td>
    <td>'.$data['keahlian'].'</td>
  </tr>
  <tr>
    <td>Alasan Bekerja</td>
    <td>:</td>
    <td>'.$data['alasan'].'</td>
  </tr>
  <tr>
    <td>Provinsi Kerja</td>
    <td>:</td>
    <td>'.$data_provinsi['nama_provinsi'].'</td>
  </tr>
  <tr>
    <td>Kota Kerja</td>
    <td>:</td>
    <td>'.$data_kota['nama_kota'].'</td>
  </tr>
  <tr>
    <td>Vaksin Covid-19</td>
    <td>:</td>
    <td>'.$data['vaksin'].'</td>
  </tr>
</table>';


echo "<p>Data yang tertera di atas merupakan data yang benar</p>";
?>
<p>========================================================================================</p>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="pelamar-".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';




 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15',array(11,5 , 5, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  //$html2pdf->Output($filename);
  $html2pdf->Output('pdf/'.$filename.'','F');
  
 }
 catch(HTML2PDF_exception $e) { echo $e; }
 //header('location:form.php');
 header('location:kirim_email_hrd.php?nama='.$nama.'&email='.$email.'&no='.$nomorbaru.'&pdf='.$filename);

 ?>
  
