<?php
require_once('src/PHPMailer.php');
require_once('src/Exception.php');
require_once('src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];
$data = date("D/M/Y H:i:s");

$mail = new PHPMailer(true);

    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'parmassahcontato@gmail.com';
    $mail->Password = 'parmassah123';
    $mail->Port = 587;
    
    $mail->setFrom('parmassahcontato@gmail.com');
    $mail->addAddress('contato@parmassah.com.br');
    
    $mail->isHTML(true);
    $mail->Subject = $assunto;
    $mail->Body = "Nome : {$nome}<br>
    E-Mail : {$email}<br>
    Mensagem : {$mensagem}<br>
    Data/Hora : {$data}";
    
    if($mail->send()){
        echo "<script>alert('Email Enviado com Sucesso');window.location.href='contact.php';</script>";
        
    }
    
    else {
        echo "Não Enviado";
    }
    
    
?>