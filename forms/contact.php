<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$email_pengirim = 'ozoragas@gmail.com'; // Isikan dengan email pengirim
$email_penerima = 'info@gas-ozora.com';   // Ambil email penerima dari inputan form
$nama_pengirim = $_POST['email']; // Isikan dengan nama pengirim
$subjek = $_POST['subject']; // Ambil subjek dari inputan form
$pesan = $_POST['message']; // Ambil pesan dari inputan form

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'yudha30052000'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';

$mail->Body = $pesan;
$mail->Subject = $subjek;

// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
    $send = $mail->send();
    if($send){ // Jika Email berhasil dikirim
        header('Location: http://gas-ozora.com/');
    }else{ // Jika Email gagal dikirim
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
?>