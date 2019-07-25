<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../PHPMailer/src/PHPMailer.php');
require('../PHPMailer/src/SMTP.php');
require('../PHPMailer/src/Exception.php');

class Key{
    public function key_acessso($messagem, $chave, $assunto, $destinatario){
    try{

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->SMTPAuth = true;
        $mail->Username = 'rafaelshembek@gmail.com';
        $mail->Password = 'rafael159357';
        $mail->SMTPSecure = 'tls';
        $mail->CharSet = "UTF-8";

        $mail->setFrom('rafaelshembek@gmail.com', 'Confirmação de Cadastro', true);/* email do [remetente] e [assunto da mensagem]  */
        $mail->addAddress($destinatario); /* email do [destinatario] */
        $mail->addReplyTo('marketplace_rh@gmail.com', 'Plataforma de vendas Online'); /* email para o usuario responder */
        
        $mail->isHTML(true);
        /* assunto */
        $mail->Subject = $assunto;
        //Messagem
        $mail->Body = '<section style="background-color: #fff; padding: 12px; border: 0.25px solid #333;">';
            $mail->Body .= '<h1 style="font-family: Lucida Sans Regular; color: #777; text-align:center">Seja Bem Vindo</h1>';
            $mail->Body .= '<p style="text-align: center;">'.$messagem.'</p>';
            $mail->Body .= '<div style="padding: 12px;">';
            $mail->Body .= '<p style="text-align: center;">Essa é sua chave de Acesso para acessa o <strong>Painel Admin</strong> </p>';
            $mail->Body .= '<span style="padding: 12px; background: #c00; color: #fff; border-radius: 30px; text-align: center;">'.$chave.'</span>';
            $mail->Body .= '</div>';
        $mail->Body .= '</section>';

        $mail->send();

    }catch(Exception $e){

            }
    }
}
?>