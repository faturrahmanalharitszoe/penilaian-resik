<?php
function MasaKerja($tgl_masuk,$tahun_sekarang,$bulan_sekarang,$tanggal_sekarang)
{
   if($tgl_masuk=='0000-00-00')
   {
	   return 0;
   }
   else
   {
	   $date1 = $tgl_masuk;
	   $date2 = $tahun_sekarang.'-'.$bulan_sekarang.'-'.$tanggal_sekarang;
	   $ts1 = strtotime($date1);
	   $ts2 = strtotime($date2);

	   $year1 = date('Y', $ts1);
	   $year2 = date('Y', $ts2);

	   $month1 = date('m', $ts1);
	   $month2 = date('m', $ts2);

	   $day1 = date('d', $ts1);
	   $day2 = date('d', $ts2);

	   $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

	   $tahun=round($diff/12);
	   if(!is_integer($diff/12))
	   {
		   $tahun=$tahun-1;
	   }
	   if($tahun < 10)
	   {
		   $tahun='0'.$tahun;
	   }
	   $sisabulan=$diff % 12;

	   if($sisabulan < 10)
	   {
		  $sisabulan='0'.$sisabulan;
	   }
	   $data['jumlah_bulan']=$diff;
	
	   $d1 = new DateTime($date1);
	   $d2 = new DateTime($date2);

	   $diff = $d2->diff($d1);

	   $data['masa_kerja']=$diff->y.','.$sisabulan;
	   return $data;
   }
}

include "koneksi.php";
require('pdf/fpdf.php');
date_default_timezone_set("Asia/Bangkok");
$tgl = date("d-m-Y H:i:s");
$vtgl= date("YmdHis");
$sekarang=date("Y-m-d");
$day = date('d');
$month = date('m');
$year = date('Y');
if($month < 8 && $month > 1)
{
    $periode = 'Jan - Jun '.$year;
}
else
{
 	if($month = 1)
        {
            $year = $year;
            $periode = 'Jul - Des '.$year;
        }
        else
        {
 	 	    $periode = 'Jul - Des '.$year;
        }
}
ob_clean();

if (isset($_GET['id']))
{
   $id = $_GET['id'];
}  

   $qnilai = mysqli_query($koneksi,"select * from penilaian where id = '$id'");
   $dnilai = mysqli_fetch_array($qnilai);
   $karyawan = $dnilai['karyawan'];
   $divisi = $dnilai['divisi'];
   $jabatan = $dnilai['jabatan'];
   $penilai = $dnilai['penilai'];
   $mengetahui_1 = $dnilai['mengetahui_1'];
   $mengetahui_2 = $dnilai['mengetahui_2'];
   $menyetujui = $dnilai['menyetujui'];

   $qmengetahui = mysqli_query($koneksi,"select * from karyawan where nama = '$mengetahui_2'");
   $dmengetahui = mysqli_fetch_array($qmengetahui);
   $email = isset($dmengetahui['email']) ? $dmengetahui['email'] : '';

   $qmenyetujui = mysqli_query($koneksi,"select * from karyawan where nama = '$menyetujui'");
   $dmenyetujui = mysqli_fetch_array($qmenyetujui);
   $email_menyetujui = isset($dmenyetujui['email']) ? $dmenyetujui['email'] : '';

   $qheader=mysqli_query($koneksi,"select * from header");
   $dheader=mysqli_fetch_array($qheader);
   $form=$dheader['form'];
   $jenis_form=$dheader['jenis_form'];
   $company=$dheader['company'];
   $no_form=$dheader['no_form'];
   $judul_form=$dheader['judul_form'];
   $tgl_form=$dheader['tgl_form'];
   
   $i=0;
   $qaspek=mysqli_query($koneksi,"select * from aspek_penilaian order by id asc");
   while($row=mysqli_fetch_array($qaspek))
   {
	   $aspek[$i] = $row['aspek_penilaian'];
	   $id_aspek[$i] = $row['id_aspek'];
	   $i++;
   }
     
   $query2=mysqli_query($koneksi,"select * from karyawan where nama = '$karyawan'");
   $data2=mysqli_fetch_array($query2);
   $divisi=$data2['divisi'];
   $divisi2=$data2['divisi2'];
   $nik=$data2['nik'];
   $gol=$data2['golongan']; 
   $jabatan=$data2['jabatan'];
   $pendidikan=$data2['pendidikan'];
   $jurusan=$data2['jurusan'];
   $sekolah=$pendidikan.' - '.$jurusan;
   $tgl_masuk=$data2['tgl_masuk'];
   $diff  = date_diff( date_create($tgl_masuk), date_create() );
   $masakerja = $diff->format('%Y thn %m bln %d hr');
   
   $nilai1_1=$dnilai['nilai1_1'];
   $nilai1_2=$dnilai['nilai1_2'];
   $nilai1_3=$dnilai['nilai1_3'];
   $nilai1_4=$dnilai['nilai1_4'];
   $nilai1_5=$dnilai['nilai1_5'];
   $nilai1_6=$dnilai['nilai1_6'];
   $nilai1_7=$dnilai['nilai1_7'];
   $nilai1_8=$dnilai['nilai1_8'];
   $nilai1_9=$dnilai['nilai1_9'];
   $nilai1_10=$dnilai['nilai1_10'];
   $nilai1_11=$dnilai['nilai1_11'];
   $nilai1_12=$dnilai['nilai1_12'];
   $nilai1_13=$dnilai['nilai1_13'];
   $nilai1_14=$dnilai['nilai1_14'];
   $nilai1_15=$dnilai['nilai1_15'];
   $nilai1_16=$dnilai['nilai1_16'];
   $nilai1_17=$dnilai['nilai1_17'];
   $nilai1_18=$dnilai['nilai1_18'];
   $nilai1_19=$dnilai['nilai1_19'];
   $total_nilai1 = $dnilai['total_nilai1'];
   $rata_nilai1 = $dnilai['rata_nilai1'];
   $grade_nilai1 = $dnilai['grade_nilai1'];
   
   $nilai2_1=$dnilai['nilai2_1'];
   $nilai2_2=$dnilai['nilai2_2'];
   $nilai2_3=$dnilai['nilai2_3'];
   $nilai2_4=$dnilai['nilai2_4'];
   $nilai2_5=$dnilai['nilai2_5'];
   $nilai2_6=$dnilai['nilai2_6'];
   $nilai2_7=$dnilai['nilai2_7'];
   $nilai2_8=$dnilai['nilai2_8'];
   $nilai2_9=$dnilai['nilai2_9'];
   $nilai2_10=$dnilai['nilai2_10'];
   $nilai2_11=$dnilai['nilai2_11'];
   $nilai2_12=$dnilai['nilai2_12'];
   $nilai2_13=$dnilai['nilai2_13'];
   $nilai2_14=$dnilai['nilai2_14'];
   $nilai2_15=$dnilai['nilai2_15'];
   $nilai2_16=$dnilai['nilai2_16'];
   $nilai2_17=$dnilai['nilai2_17'];
   $nilai2_18=$dnilai['nilai2_18'];
   $nilai2_19=$dnilai['nilai2_19'];
   $total_nilai2 = $dnilai['total_nilai2'];
   $rata_nilai2 = $dnilai['rata_nilai2'];
   $grade_nilai2 = $dnilai['grade_nilai2'];
   
   $nilai3_1=$dnilai['nilai3_1'];
   $nilai3_2=$dnilai['nilai3_2'];
   $nilai3_3=$dnilai['nilai3_3'];
   $nilai3_4=$dnilai['nilai3_4'];
   $nilai3_5=$dnilai['nilai3_5'];
   $nilai3_6=$dnilai['nilai3_6'];
   $nilai3_7=$dnilai['nilai3_7'];
   $nilai3_8=$dnilai['nilai3_8'];
   $nilai3_9=$dnilai['nilai3_9'];
   $nilai3_10=$dnilai['nilai3_10'];
   $nilai3_11=$dnilai['nilai3_11'];
   $nilai3_12=$dnilai['nilai3_12'];
   $nilai3_13=$dnilai['nilai3_13'];
   $nilai3_14=$dnilai['nilai3_14'];
   $nilai3_15=$dnilai['nilai3_15'];
   $nilai3_16=$dnilai['nilai3_16'];
   $nilai3_17=$dnilai['nilai3_17'];
   $nilai3_18=$dnilai['nilai3_18'];
   $nilai3_19=$dnilai['nilai3_19'];
   $nilai4_1=$dnilai['nilai4_1'];
   $nilai4_2=$dnilai['nilai4_2'];
   $nilai4_3=$dnilai['nilai4_3'];
   $nilai4_4=$dnilai['nilai4_4'];
   $nilai4_5=$dnilai['nilai4_5'];
   $nilai4_6=$dnilai['nilai4_6'];
   $nilai4_7=$dnilai['nilai4_7'];
   $nilai4_8=$dnilai['nilai4_8'];
   $nilai4_9=$dnilai['nilai4_9'];
   $nilai4_10=$dnilai['nilai4_10'];
   $nilai4_11=$dnilai['nilai4_11'];
   $nilai4_12=$dnilai['nilai4_12'];
   $nilai4_13=$dnilai['nilai4_13'];
   $nilai4_14=$dnilai['nilai4_14'];
   $nilai4_15=$dnilai['nilai4_15'];
   $nilai4_16=$dnilai['nilai4_16'];
   $nilai4_17=$dnilai['nilai4_17'];
   $nilai4_18=$dnilai['nilai4_18'];
   $nilai4_19=$dnilai['nilai4_19'];
   $total_nilai4=$dnilai['total_nilai4'];
   $rata_nilai4=$dnilai['rata_nilai4'];
   $grade_nilai4=$dnilai['grade_nilai4'];

   $total_nilai3 = $dnilai['total_nilai3'];
   $rata_nilai3 = $dnilai['rata_nilai3'];
   $grade_nilai3 = $dnilai['grade_nilai3'];
   
   $akhir1=$dnilai['akhir1'];
   $akhir2=$dnilai['akhir2'];
   $akhir3=$dnilai['akhir3'];
   $akhir4=$dnilai['akhir4'];
   $akhir5=$dnilai['akhir5'];
   $akhir6=$dnilai['akhir6'];
   $akhir7=$dnilai['akhir7'];
   $akhir8=$dnilai['akhir8'];
   $akhir9=$dnilai['akhir9'];
   $akhir10=$dnilai['akhir10'];
   $akhir11=$dnilai['akhir11'];
   $akhir12=$dnilai['akhir12'];
   $akhir13=$dnilai['akhir13'];
   $akhir14=$dnilai['akhir14'];
   $akhir15=$dnilai['akhir15'];
   $akhir16=$dnilai['akhir16'];
   $akhir17=$dnilai['akhir17'];
   $akhir18=$dnilai['akhir18'];
   $akhir19=$dnilai['akhir19'];
   $total_akhir=$dnilai['total_akhir'];
   $rata_akhir=$dnilai['rata_akhir'];
   $grade_akhir=$dnilai['grade_akhir'];
      
   $catatan1=$dnilai['catatan1'];
   $catatan2=$dnilai['catatan2'];
   $catatan3=$dnilai['catatan3'];
   $catatan4=$dnilai['catatan4'];
   $catatan11=$dnilai['catatan11'];
   $catatan21=$dnilai['catatan21'];
   $catatan31=$dnilai['catatan31'];
   $catatan41=$dnilai['catatan41'];
   
   $catatan5=$dnilai['catatan_approval'];
   //$tgl=date("d-M-Y", strtotime($dtgl));
   $pdf = new FPDF("P","cm","A4");
   $pdf->SetMargins(1,0.5,1);
   $pdf->AliasNbPages();
   $pdf->AddPage();
   $pdf->SetFont('Times','B',11);
   $pdf->MultiCell(19.5,0.5,'',0,'L'); 
   $pdf->SetX(4);   
   $pdf->SetFont('Arial','B',10);
   $pdf->SetX(1);
   $pdf->Cell(3.5,1.8, '', 1, 0, 'C');
   $pdf->Image('images/logo.png',1.1,1.1,3.3,1.5);
   $pdf->SetX(4.5);
   $pdf->Cell(7, 0.6, $form, 'LTR', 0, 'C');
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(8.3, 0.6, $no_form, 'LTR', 1, 'C');
   $pdf->SetX(4.5);
   $pdf->SetFont('Arial','B',12);
   $pdf->Cell(7, 0.6, $company, 'LBR', 0, 'C');
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(8.3, 0.6, $judul_form, 'LBR', 1, 'C');
   $pdf->SetX(4.5);
   $pdf->Cell(4, 0.6, 'Halaman    : 1 dari 2', 'LB', 0, 'L');
   $pdf->Cell(3, 0.6, 'Revisi : 01', 'LBR', 0, 'C');
   $pdf->Cell(8.3, 0.6, 'Tanggal : '.$tgl_form, 'LBR', 1, 'C');
   $pdf->SetX(1);
   $pdf->SetFont('Arial','B',12);
   $pdf->Cell(18.8, 0.6, $jenis_form, 'LBR', 1, 'C');
   $pdf->SetFont('Arial','',10);
   $pdf->SetX(1);
   $pdf->Cell(18.8, 0.2, '', 'LR', 1, 'L');
   $pdf->SetX(1);
   $pdf->Cell(2.3, 0.6, 'Divisi', 'L', 0, 'L');
   if($divisi2 != 'NONE')
   {
      $pdf->Cell(7.7, 0.6, ': '.$divisi.' & '.$divisi2, 0, 0, 'L');
   }
   else
   {
      $pdf->Cell(7.7, 0.6, ': '.$divisi, 0, 0, 'L');  
   }	  
   $pdf->SetX(11.3);
   $pdf->Cell(2.3, 0.6, 'Masa Kerja', 0, 0, 'L');
   $pdf->Cell(6.2, 0.6, ': '.$masakerja, 'R', 1, 'L');
   $pdf->SetX(1);
   $pdf->Cell(2.3, 0.6, 'Nama / NIK', 'L', 0, 'L');
   $txt_nama = ': '.$karyawan.' / '.$nik;
$x_nama = $pdf->GetX();
$y_nama = $pdf->GetY();
if ($pdf->GetStringWidth($txt_nama) > 7.6) {
    $pdf->MultiCell(7.7, 0.3, $txt_nama, 0, 'L');
    $pdf->SetXY($x_nama + 7.7, $y_nama);
} else {
    $pdf->Cell(7.7, 0.6, $txt_nama, 0, 0, 'L');
}
   $pdf->SetX(11.3);
   $pdf->Cell(2.3, 0.6, 'Gol/Jabatan', 0, 0, 'L');
   if($gol == '')
   {
      $pdf->Cell(6.2, 0.6, ': '.$jabatan, 'R', 1, 'L'); 
   }
   else
   { 
   	  $pdf->Cell(6.2, 0.6, ': '.$gol.' / '.$jabatan, 'R', 1, 'L');
   } 
   $pdf->Cell(2.3, 0.6, 'Pendidikan', 'L', 0, 'L');
   $pdf->Cell(7.7, 0.6, ': '.$sekolah, 0, 0, 'L');
   $pdf->SetX(11.3);
   $pdf->Cell(2.3, 0.6, 'Periode', 0, 0, 'L');
   $pdf->Cell(6.2, 0.6, ': '.$periode, 'R', 1, 'L');
   $pdf->Cell(18.8, 0.1, '', 'LR', 1, 'L');
   $pdf->Line(1,5.4,19.8,5.4);
   $pdf->SetLineWidth(0);      
   $pdf->Line(1,5.47,19.8,5.47);   
   $pdf->SetLineWidth(0);
   $pdf->SetFont('Arial','B',12);
   $pdf->Cell(1.2, 1.2, 'NO', 'LBR', 0, 'C');  
   $pdf->Cell(9.1, 1.2, 'ASPEK PENILAIAN', 'LBR', 0, 'C');
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(8.5, 0.6, 'SKOR PENILAIAN', 'LBR', 1, 'C');
   $pdf->SetX(11.3);
   $pdf->Cell(2.1, 0.6, 'NILAI I', 'LBR', 0, 'C');
   $pdf->Cell(2.1, 0.6, 'NILAI II', 'LBR', 0, 'C');
   $pdf->Cell(2.1, 0.6, 'NILAI III', 'LBR', 0, 'C');
   $pdf->Cell(2.2, 0.6, 'AKHIR', 'LBR', 1, 'C');
   $pdf->Line(1,6.76,19.8,6.76);
   $pdf->SetLineWidth(0);      
   $pdf->SetX(1);
   $pdf->SetFont('Arial','B',10);
   $pdf->Cell(18.8, 0.6, 'A. '.$aspek[1], 'LBR', 1, 'L');
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(1.2, 0.53, '1', 'LBR', 0, 'C'); 
   $qkriteria=mysqli_query($koneksi,"select * from kriteria_penilaian where id_aspek = '$id_aspek[1]'");
   $i=0;
   while($row=mysqli_fetch_array($qkriteria))
   {
	   $kriteria[$i] = $row['kriteria'];
	   $i++;
   }
   $pdf->Cell(9.1, 0.53, $kriteria[0], 'LBR', 0, 'L');
   $pdf->SetX(11.3);
   $val1 = ($nilai1_1 == '0' || $nilai1_1 == '') ? 'N/A' : $nilai1_1;
   $val2 = ($nilai3_1 == '0' || $nilai3_1 == '') ? 'N/A' : $nilai3_1;
   if ($status == 'APPROVED') {
       if ($nilai4_1 > 0) { $val3 = $nilai4_1; }
       elseif ($nilai3_1 > 0) { $val3 = $nilai3_1; }
       elseif ($nilai2_1 > 0) { $val3 = $nilai2_1; }
       else { $val3 = $nilai1_1; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, 0.53, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, 0.53, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, 0.53, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, 0.53, $akhir1, 'LBR', 1, 'C');
   $txt = $kriteria[1];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '2', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_2 == '0' || $nilai1_2 == '') ? 'N/A' : $nilai1_2;
   $val2 = ($nilai3_2 == '0' || $nilai3_2 == '') ? 'N/A' : $nilai3_2;
   if ($status == 'APPROVED') {
       if ($nilai4_2 > 0) { $val3 = $nilai4_2; }
       elseif ($nilai3_2 > 0) { $val3 = $nilai3_2; }
       elseif ($nilai2_2 > 0) { $val3 = $nilai2_2; }
       else { $val3 = $nilai1_2; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir2, 'LBR', 1, 'C');
   $txt = $kriteria[2];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '3', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_3 == '0' || $nilai1_3 == '') ? 'N/A' : $nilai1_3;
   $val2 = ($nilai3_3 == '0' || $nilai3_3 == '') ? 'N/A' : $nilai3_3;
   if ($status == 'APPROVED') {
       if ($nilai4_3 > 0) { $val3 = $nilai4_3; }
       elseif ($nilai3_3 > 0) { $val3 = $nilai3_3; }
       elseif ($nilai2_3 > 0) { $val3 = $nilai2_3; }
       else { $val3 = $nilai1_3; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir3, 'LBR', 1, 'C');
   $txt = $kriteria[3];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '4', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_4 == '0' || $nilai1_4 == '') ? 'N/A' : $nilai1_4;
   $val2 = ($nilai3_4 == '0' || $nilai3_4 == '') ? 'N/A' : $nilai3_4;
   if ($status == 'APPROVED') {
       if ($nilai4_4 > 0) { $val3 = $nilai4_4; }
       elseif ($nilai3_4 > 0) { $val3 = $nilai3_4; }
       elseif ($nilai2_4 > 0) { $val3 = $nilai2_4; }
       else { $val3 = $nilai1_4; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir4, 'LBR', 1, 'C');
   $txt = $kriteria[4];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '5', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_5 == '0' || $nilai1_5 == '') ? 'N/A' : $nilai1_5;
   $val2 = ($nilai3_5 == '0' || $nilai3_5 == '') ? 'N/A' : $nilai3_5;
   if ($status == 'APPROVED') {
       if ($nilai4_5 > 0) { $val3 = $nilai4_5; }
       elseif ($nilai3_5 > 0) { $val3 = $nilai3_5; }
       elseif ($nilai2_5 > 0) { $val3 = $nilai2_5; }
       else { $val3 = $nilai1_5; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir5, 'LBR', 1, 'C');
   $txt = $kriteria[5];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '6', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_6 == '0' || $nilai1_6 == '') ? 'N/A' : $nilai1_6;
   $val2 = ($nilai3_6 == '0' || $nilai3_6 == '') ? 'N/A' : $nilai3_6;
   if ($status == 'APPROVED') {
       if ($nilai4_6 > 0) { $val3 = $nilai4_6; }
       elseif ($nilai3_6 > 0) { $val3 = $nilai3_6; }
       elseif ($nilai2_6 > 0) { $val3 = $nilai2_6; }
       else { $val3 = $nilai1_6; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir6, 'LBR', 1, 'C');
   $txt = $kriteria[6];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '7', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_7 == '0' || $nilai1_7 == '') ? 'N/A' : $nilai1_7;
   $val2 = ($nilai3_7 == '0' || $nilai3_7 == '') ? 'N/A' : $nilai3_7;
   if ($status == 'APPROVED') {
       if ($nilai4_7 > 0) { $val3 = $nilai4_7; }
       elseif ($nilai3_7 > 0) { $val3 = $nilai3_7; }
       elseif ($nilai2_7 > 0) { $val3 = $nilai2_7; }
       else { $val3 = $nilai1_7; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir7, 'LBR', 1, 'C');
   $txt = $kriteria[0];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '8', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_8 == '0' || $nilai1_8 == '') ? 'N/A' : $nilai1_8;
   $val2 = ($nilai3_8 == '0' || $nilai3_8 == '') ? 'N/A' : $nilai3_8;
   if ($status == 'APPROVED') {
       if ($nilai4_8 > 0) { $val3 = $nilai4_8; }
       elseif ($nilai3_8 > 0) { $val3 = $nilai3_8; }
       elseif ($nilai2_8 > 0) { $val3 = $nilai2_8; }
       else { $val3 = $nilai1_8; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir8, 'LBR', 1, 'C');
   $pdf->Cell(18.8, 0.53, 'CATATAN :', 'LR', 1, 'L');
   if($catatan11 == '')
    {
        $pdf->Cell(18.8, 0.53, $catatan1, 'LR', 1, 'L');
    }
    else
    {
        $pdf->Cell(18.8, 0.53, '1. '.$catatan1, 'LR', 1, 'L');
        $pdf->Cell(18.8, 0.53, '2. '.$catatan11, 'LR', 1, 'L');
    }
   
   $pdf->SetFont('Arial','B',10);
   $pdf->Cell(18.8, 0.6, 'B. '.$aspek[2], 1, 1, 'L');
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(1.2, 0.53, '1', 'LBR', 0, 'C'); 
   $qkriteria=mysqli_query($koneksi,"select * from kriteria_penilaian where id_aspek = '$id_aspek[2]'");
   $i=0;
   while($row=mysqli_fetch_array($qkriteria))
   {
	   $kriteria[$i] = $row['kriteria'];
	   $i++;
   }
   $pdf->Cell(9.1, 0.53, $kriteria[0], 'LBR', 0, 'L');
   $pdf->SetX(11.3);
   $val1 = ($nilai1_9 == '0' || $nilai1_9 == '') ? 'N/A' : $nilai1_9;
   $val2 = ($nilai3_9 == '0' || $nilai3_9 == '') ? 'N/A' : $nilai3_9;
   if ($status == 'APPROVED') {
       if ($nilai4_9 > 0) { $val3 = $nilai4_9; }
       elseif ($nilai3_9 > 0) { $val3 = $nilai3_9; }
       elseif ($nilai2_9 > 0) { $val3 = $nilai2_9; }
       else { $val3 = $nilai1_9; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, 0.53, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, 0.53, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, 0.53, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, 0.53, $akhir9, 'LBR', 1, 'C');
   $txt = $kriteria[1];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '2', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_10 == '0' || $nilai1_10 == '') ? 'N/A' : $nilai1_10;
   $val2 = ($nilai3_10 == '0' || $nilai3_10 == '') ? 'N/A' : $nilai3_10;
   if ($status == 'APPROVED') {
       if ($nilai4_10 > 0) { $val3 = $nilai4_10; }
       elseif ($nilai3_10 > 0) { $val3 = $nilai3_10; }
       elseif ($nilai2_10 > 0) { $val3 = $nilai2_10; }
       else { $val3 = $nilai1_10; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir10, 'LBR', 1, 'C');
   $txt = $kriteria[2];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '3', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_11 == '0' || $nilai1_11 == '') ? 'N/A' : $nilai1_11;
   $val2 = ($nilai3_11 == '0' || $nilai3_11 == '') ? 'N/A' : $nilai3_11;
   if ($status == 'APPROVED') {
       if ($nilai4_11 > 0) { $val3 = $nilai4_11; }
       elseif ($nilai3_11 > 0) { $val3 = $nilai3_11; }
       elseif ($nilai2_11 > 0) { $val3 = $nilai2_11; }
       else { $val3 = $nilai1_11; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir11, 'LBR', 1, 'C');
   $txt = $kriteria[3];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '4', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_12 == '0' || $nilai1_12 == '') ? 'N/A' : $nilai1_12;
   $val2 = ($nilai3_12 == '0' || $nilai3_12 == '') ? 'N/A' : $nilai3_12;
   if ($status == 'APPROVED') {
       if ($nilai4_12 > 0) { $val3 = $nilai4_12; }
       elseif ($nilai3_12 > 0) { $val3 = $nilai3_12; }
       elseif ($nilai2_12 > 0) { $val3 = $nilai2_12; }
       else { $val3 = $nilai1_12; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir12, 'LBR', 1, 'C');
   $txt = $kriteria[4];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '5', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_13 == '0' || $nilai1_13 == '') ? 'N/A' : $nilai1_13;
   $val2 = ($nilai3_13 == '0' || $nilai3_13 == '') ? 'N/A' : $nilai3_13;
   if ($status == 'APPROVED') {
       if ($nilai4_13 > 0) { $val3 = $nilai4_13; }
       elseif ($nilai3_13 > 0) { $val3 = $nilai3_13; }
       elseif ($nilai2_13 > 0) { $val3 = $nilai2_13; }
       else { $val3 = $nilai1_13; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir13, 'LBR', 1, 'C');
   $txt = $kriteria[5];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '6', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_14 == '0' || $nilai1_14 == '') ? 'N/A' : $nilai1_14;
   $val2 = ($nilai3_14 == '0' || $nilai3_14 == '') ? 'N/A' : $nilai3_14;
   if ($status == 'APPROVED') {
       if ($nilai4_14 > 0) { $val3 = $nilai4_14; }
       elseif ($nilai3_14 > 0) { $val3 = $nilai3_14; }
       elseif ($nilai2_14 > 0) { $val3 = $nilai2_14; }
       else { $val3 = $nilai1_14; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir14, 'LBR', 1, 'C');
   $txt = $kriteria[6];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '7', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_15 == '0' || $nilai1_15 == '') ? 'N/A' : $nilai1_15;
   $val2 = ($nilai3_15 == '0' || $nilai3_15 == '') ? 'N/A' : $nilai3_15;
   if ($status == 'APPROVED') {
       if ($nilai4_15 > 0) { $val3 = $nilai4_15; }
       elseif ($nilai3_15 > 0) { $val3 = $nilai3_15; }
       elseif ($nilai2_15 > 0) { $val3 = $nilai2_15; }
       else { $val3 = $nilai1_15; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir15, 'LBR', 1, 'C');
   $pdf->Cell(18.8, 0.53, 'CATATAN :', 'LR', 1, 'L');
   if($catatan21 == '')
    {
        $pdf->Cell(18.8, 0.53, $catatan2, 'LR', 1, 'L');
    }
    else
    {
        $pdf->Cell(18.8, 0.53, '1. '.$catatan2, 'LR', 1, 'L');
        $pdf->Cell(18.8, 0.53, '2. '.$catatan21, 'LR', 1, 'L');
    }

   $pdf->SetFont('Arial','B',10);
   $pdf->Cell(18.8, 0.6, 'C. '.$aspek[0], 1, 1, 'L');
   $pdf->SetFont('Arial','',10);
   $pdf->Cell(1.2, 0.53, '1', 'LBR', 0, 'C'); 
   $qkriteria=mysqli_query($koneksi,"select * from kriteria_penilaian where id_aspek = '$id_aspek[0]'");
   $i=0;
   while($row=mysqli_fetch_array($qkriteria))
   {
	   $kriteria[$i] = $row['kriteria'];
	   $i++;
   } 
   $pdf->Cell(9.1, 0.53, $kriteria[0], 'LBR', 0, 'L');
   $pdf->SetX(11.3);
   $val1 = ($nilai1_16 == '0' || $nilai1_16 == '') ? 'N/A' : $nilai1_16;
   $val2 = ($nilai3_16 == '0' || $nilai3_16 == '') ? 'N/A' : $nilai3_16;
   if ($status == 'APPROVED') {
       if ($nilai4_16 > 0) { $val3 = $nilai4_16; }
       elseif ($nilai3_16 > 0) { $val3 = $nilai3_16; }
       elseif ($nilai2_16 > 0) { $val3 = $nilai2_16; }
       else { $val3 = $nilai1_16; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, 0.53, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, 0.53, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, 0.53, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, 0.53, $akhir16, 'LBR', 1, 'C');
   $txt = $kriteria[1];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '2', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_17 == '0' || $nilai1_17 == '') ? 'N/A' : $nilai1_17;
   $val2 = ($nilai3_17 == '0' || $nilai3_17 == '') ? 'N/A' : $nilai3_17;
   if ($status == 'APPROVED') {
       if ($nilai4_17 > 0) { $val3 = $nilai4_17; }
       elseif ($nilai3_17 > 0) { $val3 = $nilai3_17; }
       elseif ($nilai2_17 > 0) { $val3 = $nilai2_17; }
       else { $val3 = $nilai1_17; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir17, 'LBR', 1, 'C');
   $txt = $kriteria[2];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '3', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_18 == '0' || $nilai1_18 == '') ? 'N/A' : $nilai1_18;
   $val2 = ($nilai3_18 == '0' || $nilai3_18 == '') ? 'N/A' : $nilai3_18;
   if ($status == 'APPROVED') {
       if ($nilai4_18 > 0) { $val3 = $nilai4_18; }
       elseif ($nilai3_18 > 0) { $val3 = $nilai3_18; }
       elseif ($nilai2_18 > 0) { $val3 = $nilai2_18; }
       else { $val3 = $nilai1_18; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir18, 'LBR', 1, 'C');
    $txt = $kriteria[3];
$h = ($pdf->GetStringWidth($txt) > 8.9) ? 1.06 : 0.53;
$pdf->Cell(1.2, $h, '4', 'LBR', 0, 'C');
$startX = $pdf->GetX();
$startY = $pdf->GetY();
if ($h == 1.06) {
    $pdf->MultiCell(9.1, 0.53, $txt, 'LBR', 'L');
    $pdf->SetXY($startX + 9.1, $startY);
} else {
    $pdf->Cell(9.1, $h, $txt, 'LBR', 0, 'L');
}
$pdf->SetX(11.3);
   $val1 = ($nilai1_19 == '0' || $nilai1_19 == '') ? 'N/A' : $nilai1_19;
   $val2 = ($nilai3_19 == '0' || $nilai3_19 == '') ? 'N/A' : $nilai3_19;
   if ($status == 'APPROVED') {
       if ($nilai4_19 > 0) { $val3 = $nilai4_19; }
       elseif ($nilai3_19 > 0) { $val3 = $nilai3_19; }
       elseif ($nilai2_19 > 0) { $val3 = $nilai2_19; }
       else { $val3 = $nilai1_19; }
   } else {
       $val3 = 'N/A';
   }
   $val3 = ($val3 == '0' || $val3 == '') ? 'N/A' : $val3;
   $pdf->Cell(2.1, $h, $val1, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val2, 'LBR', 0, 'C');
   $pdf->Cell(2.1, $h, $val3, 'LBR', 0, 'C');
   $pdf->Cell(2.2, $h, $akhir19, 'LBR', 1, 'C');
   $pdf->Cell(18.8, 0.53, 'CATATAN :', 'LR', 1, 'L');
   if($catatan31 == '')
    {
        $pdf->Cell(18.8, 0.53, $catatan3, 'LR', 1, 'L');
    }
    else
    {
        $pdf->Cell(18.8, 0.53, '1. '.$catatan3, 'LR', 1, 'L');
        $pdf->Cell(18.8, 0.53, '2. '.$catatan31, 'LR', 1, 'L');
    }

   $pdf->Cell(10.3, 0.53, 'Total Nilai', 1, 0, 'C');
   $val_tot1 = ($total_nilai1 == '0' || $total_nilai1 == '') ? 'N/A' : $total_nilai1;
   $val_tot2 = ($total_nilai3 == '0' || $total_nilai3 == '') ? 'N/A' : $total_nilai3;
   if ($status == 'APPROVED') {
       if ($total_nilai4 > 0) { $val_tot3 = $total_nilai4; }
       elseif ($total_nilai3 > 0) { $val_tot3 = $total_nilai3; }
       elseif ($total_nilai2 > 0) { $val_tot3 = $total_nilai2; }
       else { $val_tot3 = $total_nilai1; }
   } else {
       $val_tot3 = 'N/A';
   }
   $val_tot3 = ($val_tot3 == '0' || $val_tot3 == '') ? 'N/A' : $val_tot3;
   $pdf->Cell(2.1, 0.53, $val_tot1, 1, 0, 'C');
   $pdf->Cell(2.1, 0.53, $val_tot2, 1, 0, 'C');
   $pdf->Cell(2.1, 0.53, $val_tot3, 1, 0, 'C');
   $pdf->Cell(2.2, 0.53, $total_akhir, 1, 1, 'C');
   $pdf->Cell(10.3, 0.53, 'Rata - rata Nilai', 1, 0, 'C');
   $val_rata1 = ($rata_nilai1 == '0' || $rata_nilai1 == '') ? 'N/A' : $rata_nilai1;
   $val_rata2 = ($rata_nilai3 == '0' || $rata_nilai3 == '') ? 'N/A' : $rata_nilai3;
   if ($status == 'APPROVED') {
       if ($rata_nilai4 > 0) { $val_rata3 = $rata_nilai4; }
       elseif ($rata_nilai3 > 0) { $val_rata3 = $rata_nilai3; }
       elseif ($rata_nilai2 > 0) { $val_rata3 = $rata_nilai2; }
       else { $val_rata3 = $rata_nilai1; }
   } else {
       $val_rata3 = 'N/A';
   }
   $val_rata3 = ($val_rata3 == '0' || $val_rata3 == '') ? 'N/A' : $val_rata3;
   $pdf->Cell(2.1, 0.53, $val_rata1, 1, 0, 'C');
   $pdf->Cell(2.1, 0.53, $val_rata2, 1, 0, 'C');
   $pdf->Cell(2.1, 0.53, $val_rata3, 1, 0, 'C');
   $pdf->Cell(2.2, 0.53, $rata_akhir, 1, 1, 'C');
   $pdf->Cell(10.3, 0.53, 'Grade Nilai', 1, 0, 'C');
   $val_grade1 = ($grade_nilai1 == '') ? 'N/A' : $grade_nilai1;
   $val_grade2 = ($grade_nilai3 == '') ? 'N/A' : $grade_nilai3;
   if ($status == 'APPROVED') {
       if ($grade_nilai4 != '') { $val_grade3 = $grade_nilai4; }
       elseif ($grade_nilai3 != '') { $val_grade3 = $grade_nilai3; }
       elseif ($grade_nilai2 != '') { $val_grade3 = $grade_nilai2; }
       else { $val_grade3 = $grade_nilai1; }
   } else {
       $val_grade3 = 'N/A';
   }
   $val_grade3 = ($val_grade3 == '') ? 'N/A' : $val_grade3;
   $pdf->Cell(2.1, 0.53, $val_grade1, 1, 0, 'C');
   $pdf->Cell(2.1, 0.53, $val_grade2, 1, 0, 'C');
   $pdf->Cell(2.1, 0.53, $val_grade3, 1, 0, 'C');
   $pdf->Cell(2.2, 0.53, $grade_akhir, 1, 1, 'C');

   $pdf->Cell(18.8, 0.53, 'CATATAN TAMBAHAN :', 'LR', 1, 'L');
   if(!isset($catatan41) || $catatan41 == '')
   {
        $pdf->Cell(18.8, 0.53, substr($catatan4,0,100), 'LR', 1, 'L');
        $pdf->Cell(18.8, 0.53, substr($catatan4,101,200), 'LR', 1, 'L');
   }
   else
   {
        $pdf->Cell(18.8, 0.53, '1. '.substr($catatan4,0,94), 'LR', 1, 'L');
        $pdf->Cell(18.8, 0.53, '2. '.substr($catatan41,0,94), 'LR', 1, 'L');
   }
   $pdf->Cell(18.8, 0.53, 'CATATAN APPROVAL :', 'LR', 1, 'L');
   $pdf->Cell(18.8, 0.53, $catatan5, 'LR', 1, 'L');
   $pdf->Cell(6.26, 0.53, 'Dibuat Oleh', 1, 0, 'C');
   $pdf->Cell(6.28, 0.53, 'Diketahui Oleh', 1, 0, 'C');
   $pdf->Cell(6.26, 0.53, 'Disetujui Oleh', 1, 1, 'C');
   $pdf->Cell(6.26, 1.5, '', 'LR', 0, 'L');
   $pdf->Cell(6.28, 1.5, '', 'LR', 0, 'L');
   $pdf->Cell(6.26, 1.5, '', 'LR', 1, 'L');
   $pdf->Cell(6.26, 0.53, $penilai, 1, 0, 'C');
   $pdf->Cell(6.28, 0.53, ($mengetahui_2 == '-' || $mengetahui_2 == '') ? '' : $mengetahui_2, 1, 0, 'C');
   $pdf->Cell(6.26, 0.53, ($menyetujui == '-' || $menyetujui == '') ? '' : $menyetujui, 1, 1, 'C');
   $pdf->Output("form_pdf/Form_Penilaian_".$vtgl.$id.".pdf","F");
   //$fpdf="Form Penilaian ".$karyawan.".pdf";
   $fpdf="Form_Penilaian_".$vtgl.$id.".pdf";
   $qupdate=mysqli_query($koneksi,"update penilaian set form = '$fpdf' where id='$id'");
   if($qupdate)
   {
      ?>
      <IFRAME SRC="kirim_email_approval.php?id=<?php echo $id;?>&nama=<?php echo $karyawan;?>&email=<?php echo $email; ?>&pdf=<?php echo $fpdf;?>" WIDTH=0 HEIGHT=0></IFRAME>
	  <!--<IFRAME SRC="kirim_email_form_menyetujui.php?id=<?php echo $id;?>&nama=<?php echo $karyawan;?>&penilai=<?php echo $penilai;?>&email=<?php echo $email_approval;?>&pdf=<?php echo $fpdf;?>" WIDTH=0 HEIGHT=0></IFRAME>-->
	  <!--<IFRAME SRC="kirim_email_form_mengetahui.php?nama=<?php echo $karyawan;?>&penilai=<?php echo $penilai;?>&email=<?php echo $email_mengetahui2;?>&pdf=<?php echo $fpdf;?>" WIDTH=0 HEIGHT=0></IFRAME>-->
	  <!--<IFRAME SRC="kirim_email_form_menyetujui.php?nama=<?php echo $karyawan;?>&penilai=<?php echo $penilai;?>&email=<?php echo $email_menyetujui;?>&pdf=<?php echo $fpdf;?>" WIDTH=0 HEIGHT=0></IFRAME>-->
	  <?php


	?>
	<script>
	  var pdf = "<?php echo $fpdf;?>";
	  /*window.location.href = 'form.php?email='+email+'&nama='+nm_penilai;*/
	  window.location.href = 'https://resikcemerlang.com/penilaian/form_pdf/'+pdf;
      /*window.location.href = 'https://resikcemerlang.com/penilaian/form_pdf/'+pdf;*/
	</script>
	<?php
	}
?>

