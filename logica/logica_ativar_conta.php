<?php
require_once('../class/Select_DB.php');
session_start();

if(isset($_SESSION['id_user'])){

    $id_empresa = $_SESSION['id_user'];
    // echo $id_empresa;
    $select = new Select_DB();
    $params = array(
        ':id_empresa' => $id_empresa
    );
    $dados = $select->exe_query('SELECT * from empresa WHERE idcadastro = :id_empresa', $params);
    $myDados = [];
    foreach($dados as $value){
        $myDados[] = $value;
    }
    echo json_encode($myDados, JSON_PRETTY_PRINT);
}

?>