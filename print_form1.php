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
    $pdf->SetX(11.5);
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
    $pdf->SetX(11.5);
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
    $pdf->SetX(11.5);
    $pdf->Cell(2.3, 0.6, 'Periode', 0, 0, 'L');
    $pdf->Cell(6.2, 0.6, ': '.$periode, 'R', 1, 'L');
    $pdf->Cell(18.8, 0.1, '', 'LR', 1, 'L');
    $pdf->Line(1,5.4,19.8,5.4);
    $pdf->SetLineWidth(0);
    $pdf->Line(1,5.47,19.8,5.47);
    $pdf->SetLineWidth(0);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(1.2, 1.2, 'NO', 'LBR', 0, 'C');
    $pdf->Cell(9.3, 1.2, 'ASPEK PENILAIAN', 'LBR', 0, 'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(8.3, 0.6, 'SKOR PENILAIAN', 'LBR', 1, 'C');
    $pdf->SetX(11.5);
    $pdf->Cell(2.07, 0.6, 'NILAI I', 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.6, 'NILAI II', 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.6, 'NILAI III', 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.6, 'AKHIR', 'LBR', 1, 'C');
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
   $pdf->Cell(9.3, 0.53, $kriteria[0], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_1, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_1, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir1, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '2', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[1], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_2, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_2, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir2, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '3', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[2], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_3, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_3, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir3, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '4', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[3], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_4, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_4, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir4, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '5', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[4], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_5, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_5, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir5, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '6', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[5], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_6, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_6, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir6, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '7', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[6], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_7, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_7, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir7, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '8', 'LBR', 0, 'C');
   $pdf->Cell(9.3, 0.53, $kriteria[7], 'LBR', 0, 'L');
    $pdf->SetX(11.5);
    $pdf->Cell(2.07, 0.53, $nilai1_8, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $nilai2_8, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $akhir8, 'LBR', 1, 'C');
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
    $pdf->Cell(9.3, 0.53, $kriteria[0], 'LBR', 0, 'L');
    $pdf->SetX(11.5);
    $pdf->Cell(2.07, 0.53, $nilai1_9, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $nilai2_9, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $akhir9, 'LBR', 1, 'C');
    $pdf->Cell(1.2, 0.53, '2', 'LBR', 0, 'C'); 
    $pdf->Cell(9.3, 0.53, $kriteria[1], 'LBR', 0, 'L');
    $pdf->SetX(11.5);
    $pdf->Cell(2.07, 0.53, $nilai1_10, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $nilai2_10, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $akhir10, 'LBR', 1, 'C');
    $pdf->Cell(1.2, 0.53, '3', 'LBR', 0, 'C'); 
    $pdf->Cell(9.3, 0.53, $kriteria[2], 'LBR', 0, 'L');
    $pdf->SetX(11.5);
    $pdf->Cell(2.07, 0.53, $nilai1_11, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $nilai2_11, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $akhir11, 'LBR', 1, 'C');
    $pdf->Cell(1.2, 0.53, '4', 'LBR', 0, 'C'); 
    $pdf->Cell(9.3, 0.53, $kriteria[3], 'LBR', 0, 'L');
    $pdf->SetX(11.5);
    $pdf->Cell(2.07, 0.53, $nilai1_12, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $nilai2_12, 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
    $pdf->Cell(2.07, 0.53, $akhir12, 'LBR', 1, 'C');
    $pdf->Cell(1.2, 0.53, '5', 'LBR', 0, 'C'); 
    $pdf->Cell(9.3, 0.53, $kriteria[4], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_13, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_13, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir13, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '6', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[5], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_14, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_14, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir14, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '7', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[6], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_15, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_15, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir15, 'LBR', 1, 'C');
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
   $pdf->Cell(9.3, 0.53, $kriteria[0], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_16, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_16, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir16, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '2', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[1], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_17, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_17, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir17, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '3', 'LBR', 0, 'C');
   $pdf->Cell(9.3, 0.53, $kriteria[2], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_18, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_18, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir18, 'LBR', 1, 'C');
   $pdf->Cell(1.2, 0.53, '4', 'LBR', 0, 'C'); 
   $pdf->Cell(9.3, 0.53, $kriteria[3], 'LBR', 0, 'L');
   $pdf->SetX(11.5);
   $pdf->Cell(2.07, 0.53, $nilai1_19, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $nilai2_19, 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, '', 'LBR', 0, 'C');
   $pdf->Cell(2.07, 0.53, $akhir19, 'LBR', 1, 'C');
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


    $pdf->Cell(10.5, 0.53, 'Total Nilai', 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $total_nilai1, 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $total_nilai2, 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, '', 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $total_akhir, 1, 1, 'C');
    $pdf->Cell(10.5, 0.53, 'Rata - rata Nilai', 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $rata_nilai1, 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $rata_nilai2, 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, '', 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $rata_akhir, 1, 1, 'C');
    $pdf->Cell(10.5, 0.53, 'Grade Nilai', 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $grade_nilai1, 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $grade_nilai2, 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, '', 1, 0, 'C');
    $pdf->Cell(2.07, 0.53, $grade_akhir, 1, 1, 'C');

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
    $pdf->Cell(18.8, 0.53, '', 'LR', 1, 'L');
    $pdf->Cell(18.8, 0.53, '', 'LR', 1, 'L');
    $pdf->Cell(4.7, 0.53, 'Dibuat Oleh', 1, 0, 'C');
    $pdf->Cell(9.4, 0.53, 'Diketahui Oleh', 1, 0, 'C');
    $pdf->Cell(4.7, 0.53, 'Disetujui Oleh', 1, 1, 'C');
    $pdf->Cell(4.7, 1.5, '', 'LR', 0, 'L');
    $pdf->Cell(4.7, 1.5, '', 'LR', 0, 'L');
    $pdf->Cell(4.7, 1.5, '', 'LR', 0, 'L');
    $pdf->Cell(4.7, 1.5, '', 'LR', 1, 'L');
    $pdf->Cell(4.7, 0.53, $penilai, 1, 0, 'C');
    $pdf->Cell(4.7, 0.53, $mengetahui_1, 1, 0, 'C');
    $pdf->Cell(4.7, 0.53, $mengetahui_2, 1, 0, 'C');
    $pdf->Cell(4.7, 0.53, '', 1, 0, 'C');
    $pdf->Output("form_pdf/Form_Penilaian_".$vtgl.$id.".pdf","F");
    //$fpdf="Form Penilaian ".$karyawan.".pdf";
    $fpdf="Form_Penilaian_".$vtgl.$id.".pdf";
    $qupdate=mysqli_query($koneksi,"update penilaian set form = '$fpdf' where id='$id'");
    if($qupdate)
    {
        ?>
        <IFRAME SRC="kirim_email_form.php?id=<?php echo $id;?>&nama=<?php echo $mengetahui_1;?>&pdf=<?php echo $fpdf;?>" WIDTH=0 HEIGHT=0></IFRAME>
        <?php if ($mengetahui_2 != '-' && $mengetahui_2 != '') { ?>
	        <IFRAME SRC="kirim_email_form_mengetahui2.php?id=<?php echo $id;?>&pdf=<?php echo $fpdf;?>" WIDTH=0 HEIGHT=0></IFRAME>
        <?php } else if ($menyetujui != '-' && $menyetujui != '') { ?>
            <IFRAME SRC="kirim_email_form_menyetujui.php?id=<?php echo $id;?>&pdf=<?php echo $fpdf;?>" WIDTH=0 HEIGHT=0></IFRAME>
        <?php } ?>
	    <!DOCTYPE html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            /* Center the loader */
            #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            }

            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */
            .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
            }

            #myDiv {
            display: none;
            text-align: center;
            }
        </style>
	    <body onload="myFunction()" style="margin:0;">

        <div id="loader"></div>

        <script>
            var myVar;

            function myFunction() 
            {
                myVar = setTimeout(showPage, 3000);
            }

            function showPage() 
            {
                var email = "<?php echo $email; ?>";
	            var nm_penilai = "<?php echo $penilai; ?>";
	            var pdf = "<?php echo $fpdf; ?>"; 
	            var mengetahui_2 = "<?php echo ($mengetahui_2 != '-' && $mengetahui_2 != '') ? $mengetahui_2 : $menyetujui; ?>";
	            alert("Menunggu Persetujuan Bpk/Ibu "+mengetahui_2);
	            window.location.href = "https://resikcemerlang.com/penilaian/form_pdf/"+pdf;
            }
        </script>

        </body>
	  
	     <?php
	}
?>

