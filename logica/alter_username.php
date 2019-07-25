<?php
require_once('../class/Select_DB.php');

$username = filter_input(INPUT_POST, 'new_username', FILTER_SANITIZE_STRING);
$id_user_online = filter_input(INPUT_POST, 'id_user_online', FILTER_SANITIZE_NUMBER_INT);

$params = array(
    ':id_user_online' => $id_user_online,
    ':nome_fantasia' => $username
);
$insert = new Select_DB();
$insert->exe_query("UPDATE cadastro SET nome_empresa = :nome_fantasia Where idcadastro = :id_user_online", $params, true,false);

?>