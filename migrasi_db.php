<?php
include("koneksi.php");

$queries = [
    // Add nilai4_1 to nilai4_19
    "ALTER TABLE penilaian ADD COLUMN nilai4_1 int(2) NULL DEFAULT 0 AFTER nilai3_19",
    "ALTER TABLE penilaian ADD COLUMN nilai4_2 int(2) NULL DEFAULT 0 AFTER nilai4_1",
    "ALTER TABLE penilaian ADD COLUMN nilai4_3 int(2) NULL DEFAULT 0 AFTER nilai4_2",
    "ALTER TABLE penilaian ADD COLUMN nilai4_4 int(2) NULL DEFAULT 0 AFTER nilai4_3",
    "ALTER TABLE penilaian ADD COLUMN nilai4_5 int(2) NULL DEFAULT 0 AFTER nilai4_4",
    "ALTER TABLE penilaian ADD COLUMN nilai4_6 int(2) NULL DEFAULT 0 AFTER nilai4_5",
    "ALTER TABLE penilaian ADD COLUMN nilai4_7 int(2) NULL DEFAULT 0 AFTER nilai4_6",
    "ALTER TABLE penilaian ADD COLUMN nilai4_8 int(2) NULL DEFAULT 0 AFTER nilai4_7",
    "ALTER TABLE penilaian ADD COLUMN nilai4_9 int(2) NULL DEFAULT 0 AFTER nilai4_8",
    "ALTER TABLE penilaian ADD COLUMN nilai4_10 int(2) NULL DEFAULT 0 AFTER nilai4_9",
    "ALTER TABLE penilaian ADD COLUMN nilai4_11 int(2) NULL DEFAULT 0 AFTER nilai4_10",
    "ALTER TABLE penilaian ADD COLUMN nilai4_12 int(2) NULL DEFAULT 0 AFTER nilai4_11",
    "ALTER TABLE penilaian ADD COLUMN nilai4_13 int(2) NULL DEFAULT 0 AFTER nilai4_12",
    "ALTER TABLE penilaian ADD COLUMN nilai4_14 int(2) NULL DEFAULT 0 AFTER nilai4_13",
    "ALTER TABLE penilaian ADD COLUMN nilai4_15 int(2) NULL DEFAULT 0 AFTER nilai4_14",
    "ALTER TABLE penilaian ADD COLUMN nilai4_16 int(2) NULL DEFAULT 0 AFTER nilai4_15",
    "ALTER TABLE penilaian ADD COLUMN nilai4_17 int(2) NULL DEFAULT 0 AFTER nilai4_16",
    "ALTER TABLE penilaian ADD COLUMN nilai4_18 int(2) NULL DEFAULT 0 AFTER nilai4_17",
    "ALTER TABLE penilaian ADD COLUMN nilai4_19 int(2) NULL DEFAULT 0 AFTER nilai4_18",

    // Add total, rata, grade
    "ALTER TABLE penilaian ADD COLUMN total_nilai4 int(3) NULL DEFAULT 0 AFTER nilai4_19",
    "ALTER TABLE penilaian ADD COLUMN rata_nilai4 decimal(5,1) NULL DEFAULT 0 AFTER total_nilai4",
    "ALTER TABLE penilaian ADD COLUMN grade_nilai4 varchar(3) NULL DEFAULT '' AFTER rata_nilai4"
];

$success = true;
foreach ($queries as $q) {
    if (!mysqli_query($koneksi, $q)) {
        echo "Error executing query: " . mysqli_error($koneksi) . "<br>";
        $success = false;
    }
}

if ($success) {
    echo "Migrasi database berhasil! 22 kolom nilai4 berhasil ditambahkan ke tabel penilaian.";
} else {
    echo "Beberapa query gagal. (Mungkin kolom sudah ada).";
}
?>
