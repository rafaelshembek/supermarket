<?php
// ================================
require_once('../class/Select_DB.php');
require_once('../class/Insert_DB.php');
require_once('../class/ID_maximo_tabela.php');
// ================================
session_start();
// =============================
// obter o proximo id da tabela
// ============================
$id_maximo = new ID_maximo_tabela();
$idMaximo = $id_maximo->exe_idMaximo('idempresa', 'empresa');

$id_loja = $_SESSION['id_user'];
$data_cadastro = date('Y-m-d h:i:s', time());

// buscar as informações da loja
$select = new Select_DB();
$params = array(
    ':id_empresa' => $id_loja
);
// buscar o id da empresa se estiver cadastradar
$el = $select->exe_query("SELECT * FROM empresa WHERE empresa.idempresa = :id_empresa", $params);
// verificar se existe algum retorno da empresa no banco de dado
if($el != NULL){
    foreach($el as $value){
        $id_empresa = $value['idempresa'];
    }
    if($id_empresa != NULL){
        echo 'Empresa esta ativada';
    }
}else{
    $params = array(
        ':id_maximo' => $idMaximo,
        ':id_empresa' => $id_loja,
        ':status_conta' => 1
    );
    // // adicionar a loja na tabela
    $insert = new Insert_DB();
    $insert->exe_insert("INSERT INTO empresa VALUES(:id_maximo, :id_empresa, :status_conta)", $params);
}


?>