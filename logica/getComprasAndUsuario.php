<?php
session_start();
require_once('../class/Select_DB.php');
if(isset($_SESSION['id_user'])){
    $dados_pedido_usuario = new Select_DB();
    $return_row = $dados_pedido_usuario->exe_query("SELECT * FROM pedido LEFT JOIN cadastro ON pedido.id_usuario = cadastro.idcadastro");
    foreach($return_row as $column){
        $data_compra[] = $column;
    }
    echo json_encode($data_compra);
}
?>