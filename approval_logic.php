<?php
/**
 * Helper: Cari satu karyawan aktif berdasarkan id_jabatan dan divisi.
 * Mendukung prefix matching:
 *   - 'OPS - *'      → fallback ke 'OPERASIONAL'
 *   - 'SDM - *'      → fallback ke 'SDM'
 *   - 'KEUANGAN - *' → fallback ke 'KEUANGAN'
 */
function find_by_jabatan_divisi($koneksi, $id_jabatan, $divisi_karyawan) {
    $divisi_cols = "divisi, divisi2, divisi3, divisi4, divisi5, divisi6, divisi7, divisi8";
    $esc_divisi  = mysqli_real_escape_string($koneksi, $divisi_karyawan);

    // Pencarian langsung berdasarkan nama divisi persis
    $q = mysqli_query($koneksi,
        "SELECT nama FROM karyawan
         WHERE aktif = 1
           AND id_jabatan = '$id_jabatan'
           AND ('$esc_divisi' IN ($divisi_cols))
         LIMIT 1");
    if ($row = mysqli_fetch_array($q)) return $row['nama'];

    // Mapping prefix → induk divisi
    $prefix_map = array(
        'OPS - '      => 'OPERASIONAL',
        'SDM - '      => 'SDM',
        'KEUANGAN - ' => 'KEUANGAN',
    );

    foreach ($prefix_map as $prefix => $parent) {
        if (strpos($divisi_karyawan, $prefix) === 0 || $divisi_karyawan === $parent) {
            $q2 = mysqli_query($koneksi,
                "SELECT nama FROM karyawan
                 WHERE aktif = 1
                   AND id_jabatan = '$id_jabatan'
                   AND '$parent' IN ($divisi_cols)
                 LIMIT 1");
            if ($row2 = mysqli_fetch_array($q2)) return $row2['nama'];
            break;
        }
    }

    return null; // tidak ditemukan
}

function get_approval_chain($koneksi, $id_penilai, $divisi_karyawan, $target_id_role_approval = 0, $target_divisi = '') {
    $nm_mengetahui_1 = '-';
    $nm_mengetahui_2 = '-';
    $nm_menyetujui = '-';

    // Jika target memiliki role approval spesifik, override hirarki standard
    if ($target_id_role_approval != 0) {
        $q_req_role = mysqli_query($koneksi, "SELECT * FROM role_approval WHERE id = '$target_id_role_approval' LIMIT 1");
        if ($req_role = mysqli_fetch_array($q_req_role)) {
            if ($req_role['id_mengetahui_1'] != 0) {
                $nm = find_by_jabatan_divisi($koneksi, $req_role['id_mengetahui_1'], $target_divisi);
                if ($nm) $nm_mengetahui_1 = $nm;
            }
            if ($req_role['id_mengetahui_2'] != 0) {
                $nm = find_by_jabatan_divisi($koneksi, $req_role['id_mengetahui_2'], $target_divisi);
                if ($nm) $nm_mengetahui_2 = $nm;
            }
            if ($req_role['id_menyetujui'] != 0) {
                if ($req_role['id_menyetujui'] == '1' || $req_role['id_menyetujui'] == '2') {
                    $q_s = mysqli_query($koneksi, "SELECT nama FROM karyawan WHERE aktif=1 AND id_jabatan='".$req_role['id_menyetujui']."' LIMIT 1");
                    if ($row_s = mysqli_fetch_array($q_s)) $nm_menyetujui = $row_s['nama'];
                } else {
                    $nm = find_by_jabatan_divisi($koneksi, $req_role['id_menyetujui'], $target_divisi);
                    if ($nm) $nm_menyetujui = $nm;
                }
            }
            return array('m1' => $nm_mengetahui_1, 'm2' => $nm_mengetahui_2, 'setuju' => $nm_menyetujui);
        }
    }

    $qrole = mysqli_query($koneksi,"select * from role_approval where id_penilai = '$id_penilai'");
    if(mysqli_num_rows($qrole) > 0) {
        $drole = mysqli_fetch_array($qrole);
        $id_mengetahui_1 = $drole['id_mengetahui_1'];
        $id_mengetahui_2 = $drole['id_mengetahui_2'];
        $id_menyetujui   = $drole['id_menyetujui'];

        $nm_m2_temp = '';
        $nm_s_temp = '';

        if ($id_penilai == '8' && $divisi_karyawan == 'KEUANGAN' ) {
            $nm_m2_temp = 'Suhendra';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '8' && $divisi_karyawan == 'PAYROLL' ) {
            $nm_m2_temp = 'Suhendra';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '8' && $divisi_karyawan == 'PAYMENT' ) {
            $nm_m2_temp = 'Suhendra';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '8' && $divisi_karyawan == 'SDM') {
            $nm_m2_temp = 'Saripudin, S.H';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '8' && in_array($divisi_karyawan, ['OPERASIONAL', 'OPS - PENGADAAN', 'OPS - RB', 'OPS - KORLAP', 'OPS - TEKNISI', 'OPS - RB '])) {
            $nm_m2_temp = 'Agus Heru Kurnia';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '8' && $divisi_karyawan == 'MARKETING') {
            $nm_m2_temp = 'Jayadi';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '8' && $divisi_karyawan == 'IT') {
            $nm_m2_temp = 'Suhendra';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '8' && $divisi_karyawan == 'GA') {
            $nm_m2_temp = 'Suhendra';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '7' && $divisi_karyawan == 'GA') {
            $nm_m2_temp = 'Joko Purwoto, S.E';
            $nm_s_temp = 'Budi Anitarini, S.Sn.,M.S.M';
        } else if ($id_penilai == '7' && $divisi_karyawan == 'MARKETING') {
            $nm_m2_temp = 'Joko Purwoto, S.E';
            $nm_s_temp = 'Budi Anitarini, S.Sn.,M.S.M';
        } else if ($id_penilai == '7' && in_array($divisi_karyawan, ['OPERASIONAL', 'OPS - PENGADAAN', 'OPS - RB', 'OPS - KORLAP', 'OPS - TEKNISI', 'OPS - RB '])) {
            $nm_m2_temp = 'Joko Purwoto, S.E';
            $nm_s_temp = 'Budi Anitarini, S.Sn.,M.S.M';
        } else if ($id_penilai == '7' && $divisi_karyawan == 'SDM') {
            $nm_m2_temp = 'Saripudin, S.H';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '7' && $divisi_karyawan == 'LEGAL') {
            $nm_m2_temp = 'Saripudin, S.H';
            $nm_s_temp = 'Joko Purwoto, S.E';
        } else if ($id_penilai == '5' && in_array($divisi_karyawan, ['OPERASIONAL', 'OPS - PENGADAAN', 'OPS - RB', 'OPS - KORLAP', 'OPS - TEKNISI', 'OPS - RB '])) {
            $nm_m2_temp = 'Budi Anitarini, S.Sn.,M.S.M';
            $nm_s_temp = 'Ir. Budi Darmastuti';
        } else if ($id_penilai == '5' && $divisi_karyawan == 'MARKETING') {
            $nm_m2_temp = 'Budi Anitarini, S.Sn.,M.S.M';
            $nm_s_temp = 'Ir. Budi Darmastuti';
        } else if ($id_penilai == '5' && $divisi_karyawan == 'GA') {
            $nm_m2_temp = 'Budi Anitarini, S.Sn.,M.S.M';
            $nm_s_temp = 'Ir. Budi Darmastuti';
        } else if ($id_penilai == '5' && $divisi_karyawan == 'SDM') {
            $nm_m2_temp = 'Budi Artiningrum, S.E.,M.S.M';
            $nm_s_temp = 'Ir. Budi Darmastuti';
        } else if ($id_penilai == '5' && $divisi_karyawan == 'KEUANGAN') {
            $nm_m2_temp = 'Budi Artiningrum, S.E.,M.S.M';
            $nm_s_temp = 'Ir. Budi Darmastuti';
        } else if ($id_penilai == '5' && $divisi_karyawan == 'ACCOUNTING') {
            $nm_m2_temp = 'Budi Artiningrum, S.E.,M.S.M';
            $nm_s_temp = 'Ir. Budi Darmastuti';
        } else if ($id_penilai == '6' && $divisi_karyawan == 'ACCOUNTING') {
            $nm_m2_temp = 'Joko Purwoto, S.E';
            $nm_s_temp = 'Budi Artiningrum, S.E.,M.S.M';
        } else if ($id_penilai == '6' && $divisi_karyawan == 'KEUANGAN') {
            $nm_m2_temp = 'Joko Purwoto, S.E';
            $nm_s_temp = 'Budi Artiningrum, S.E.,M.S.M';
        } else if ($id_penilai == '6' && $divisi_karyawan == 'SDM') {
            $nm_m2_temp = 'Joko Purwoto, S.E';
            $nm_s_temp = 'Budi Artiningrum, S.E.,M.S.M';
        } else if ($id_penilai == '9') {
            if (in_array($divisi_karyawan, ['OPS - PENGADAAN', 'OPS - RB', 'OPS - GA'])) {
                // Puji, Mega, Sardah langsung ke Agus Heru Kurnia
                $id_mengetahui_1 = 0; // Skip Asisten Manager (Chandra Isnaeni)
                $id_mengetahui_2 = 0; // Skip Manager (Ridwan B)
                $nm_m2_temp = 'Agus Heru Kurnia';
                $nm_s_temp = 'Budi Anitarini, S.Sn.,M.S.M';
            } else if ($divisi_karyawan == 'OPS - TEKNISI') {
                // Sugeng langsung ke Ridwan B -> Agus Heru Kurnia
                $id_mengetahui_1 = 0; // Skip Asisten Manager (Chandra Isnaeni)
                $nm_m2_temp = 'Ridwan B';
                $nm_s_temp = 'Agus Heru Kurnia';
            }
        }

        $nm_found = find_by_jabatan_divisi($koneksi, $id_mengetahui_1, $divisi_karyawan);
        if ($nm_found) $nm_mengetahui_1 = $nm_found;

        // Validate hardcoded M2 against database active status
        if ($nm_m2_temp != '') {
            $q_cek = mysqli_query($koneksi, "SELECT id_jabatan FROM karyawan WHERE nama = '$nm_m2_temp' AND aktif = 1");
            if (mysqli_num_rows($q_cek) > 0) {
                $nm_mengetahui_2 = $nm_m2_temp;
            } else {
                $nm_m2_temp = ''; // Name is inactive, clear it to trigger fallback
            }
        }

        if ($nm_m2_temp == '' && $id_mengetahui_2 != '' && $id_mengetahui_2 != 0) {
            $nm_found = find_by_jabatan_divisi($koneksi, $id_mengetahui_2, $divisi_karyawan);
            if ($nm_found) $nm_mengetahui_2 = $nm_found;
        }

        // Validate hardcoded Penyetuju against database active status
        if ($nm_s_temp != '') {
            $q_cek = mysqli_query($koneksi, "SELECT id_jabatan FROM karyawan WHERE nama = '$nm_s_temp' AND aktif = 1");
            if (mysqli_num_rows($q_cek) > 0) {
                $nm_menyetujui = $nm_s_temp;
            } else {
                $nm_s_temp = ''; // Name is inactive, clear it to trigger fallback
            }
        }

        if ($nm_s_temp == '' && $id_menyetujui != '' && $id_menyetujui != 0) {
            if ($id_menyetujui == '1' || $id_menyetujui == '2') {
                $q3 = mysqli_query($koneksi,"select nama from karyawan where aktif = 1 and id_jabatan = '$id_menyetujui' LIMIT 1");
                if($dsql3 = mysqli_fetch_array($q3)) $nm_menyetujui = $dsql3['nama'];
            } else {
                $nm_found = find_by_jabatan_divisi($koneksi, $id_menyetujui, $divisi_karyawan);
                if ($nm_found) $nm_menyetujui = $nm_found;
            }
        }
    }
    
    // Cegah duplikasi penilai ganda (skip ke level yang lebih tinggi)
    if ($nm_mengetahui_1 != '-' && $nm_mengetahui_1 == $nm_mengetahui_2) {
        $nm_mengetahui_1 = '-';
    }
    if ($nm_mengetahui_2 != '-' && $nm_mengetahui_2 == $nm_menyetujui) {
        $nm_mengetahui_2 = '-';
    }
    // Jika M1 dan M2 kosong tapi kebetulan M1 sama dengan Penyetuju
    if ($nm_mengetahui_1 != '-' && $nm_mengetahui_1 == $nm_menyetujui) {
        $nm_mengetahui_1 = '-';
    }

    return array('m1' => $nm_mengetahui_1, 'm2' => $nm_mengetahui_2, 'setuju' => $nm_menyetujui);
}
?>
