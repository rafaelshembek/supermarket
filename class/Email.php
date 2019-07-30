<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../PHPMailer/src/PHPMailer.php');
require('../PHPMailer/src/SMTP.php');
require('../PHPMailer/src/Exception.php');

class Email{
    public function enviar_Email($messagem, $senhaRandom, $assunto, $destinatario){
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

        $mail->setFrom('rafaelshembek@gmail.com', 'Comercio Legal', true);/* email do [remetente] e [assunto da mensagem]  */
        $mail->addAddress($destinatario); /* email do [destinatario] */
        $mail->addReplyTo('marketplace_rh@gmail.com', 'Plataforma de vendas Online'); /* email para o usuario responder */
        
        $mail->isHTML(true);
        /* assunto */
        $mail->Subject = $assunto;
        //Messagem
        $mail->Body = '<section style="background-color: #fff; padding: 12px;">';
            $mail->Body .= '<h1 style="font-family: Lucida Sans Regular; color: #777">Rescuperação de Senha!</h1>';
            $mail->Body .= '<p>'.$messagem.'</p>';
            $mail->Body .= '<div style="padding: 12px;">
                                <h1 style="text-decoration: none; border-radius: 3px; padding: 12px; background-color: rgb(48, 149, 87); color: #fff;">'.$senhaRandom.'</h1>
                            </div>';
        $mail->Body .= '</section>';

        $mail->send();
        echo '<div class="ui positive message">';
            echo '<p class="ui header">Seu email foi enviado com sucesso!</p>';
            echo '<div class=""><a class="ui basic button" href="../interface/esqueceu_senha.php">voltar</a></div>';
        echo '</div>';
    }catch(Exception $e){
            echo '<div class="ui negative message">';
                echo '<p class="ui header">Erro ao enviar o email!</p>';
                echo '<div class=""><a class="ui basic button" href="../interface/esqueceu_senha.php">voltar</a></div>';
            echo '</div>';
            }
    }
}
?>