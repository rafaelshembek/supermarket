<?php
require_once("../class/Select_DB.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_online = $_POST['id_user']; // id do usuario esta esta online
    $id_dados = $_POST['id_dados'];
    $id_loja = $_POST['id_loja'];
    $rua_moradia = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $numero_moradia = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $bairro_moradia = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade_moradia = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado_moradia = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $referencia_moradia = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING);

    // class para adicionar as informações na tabela
    $params = array(
        ':id_dados' => $id_dados,
        ':id_user' => $id_online,
        ':Rua' => $rua_moradia,
        ':Numero' => $numero_moradia,
        ':Bairro' => $bairro_moradia,
        ':Estado' => $estado_moradia,
        ':Cidade' => $cidade_moradia,
        ':Referencia' => $referencia_moradia
    );
    $update = new \Select_DB();
    $update->exe_query("UPDATE dados_usuario SET rua_moradia = :Rua, numero_moradia = :Numero, bairro_moradia = :Bairro, cidade_moradia = :Cidade, estado_moradia = :Estado, referencia_moradia = :Referencia WHERE dados_usuario.id_dados_contato = :id_dados and dados_usuario.id_user_online = :id_user", $params);

    echo '<p>Dados Update</p>';
    echo '<a href=" ../interface/configuracoes.php?loja='.$id_loja.'">voltar para as configurações</a>';
    // header("Location: ../interface/configuracoes.php?loja=$id_loja");
}
?>