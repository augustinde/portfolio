<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../vendor/autoload.php';

$nom = htmlspecialchars($_POST['nomPrenom']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

$mail = new PHPMailer();
$mail->setFrom($email, $nom);
$mail->addReplyTo($email, $nom);
$mail->addAddress('contact@desaintfucienaugustin.fr', 'Desaintfucien Augustin');
$mail->Subject = 'Formulaire de contact depuis le site web';
$mail->msgHTML($nom . '<br><br>'
    .$email.'<br><br>'
    .$message);
$mail->AltBody = $nom.' : '. $email.' : '. $message;


if (!$mail->send()) {
    $msgEmail = ['error' => 'Erreur lors de l\'envoie de l\'email : '.$mail->ErrorInfo];
} else {
    $msgEmail = ['succes' => 'Email envoyé avec succés !'];
}

echo json_encode($msgEmail);