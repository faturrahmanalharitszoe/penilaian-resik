<?php

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'mail.resikcemerlang.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'system@resikcemerlang.com';
    $mail->Password = 'R3s!k2021';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('system@resikcemerlang.com', 'Resik System');
    $mail->addAddress('it_support@resikcemerlang.id'); // ganti dengan email tujuan

    $mail->isHTML(true);
    $mail->Subject = 'Tes Kirim Email';
    $mail->Body    = 'Email ini dikirim dari PHPMailer dengan konfigurasi SMTP.';

    $mail->send();
    echo 'Email berhasil dikirim!';
} catch (Exception $e) {
    echo "Gagal kirim email. Error: {$mail->ErrorInfo}";
}

?>