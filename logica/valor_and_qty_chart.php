<?php
require_once('../class/cl_painel.php');
session_start();
if(isset($_SESSION['id_user'])){
    $id_empresa = $_SESSION['id_user'];
    $valor_and_qty = new cl_Painel();
    $el = $valor_and_qty->Valor_Qty_Mes($id_empresa);
    
    foreach($el as $values){
        $valor[] = $values;
    }
    echo json_encode($valor);
}
?>