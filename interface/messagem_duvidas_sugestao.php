<?php
require_once('../logica/messagem_sugestao.php');

$elEmail = new Email();
// ================================
// variavies do form da pagina
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$nome_completo = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_STRING);
$msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);
// ================================
// metodos da class Email()
$elEmail->enviar_messagem($msg, $email, $nome_completo);
?>