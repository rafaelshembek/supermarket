<?php
require_once('../class/Select_DB.php');
$delete = new Select_DB();

$id_delete = filter_input(1, 'del', 519);

if(isset($_GET['del']) && isset($_GET['refLoja'])){
    $params = array(
        ':id_delete' => $id_delete
    );
    $el = $delete->exe_query("DELETE FROM carrinho WHERE carrinho.id_carrinho = :id_delete", $params);
    header("Location:../../../interface/carrinho/".$_GET['refLoja']);
}else{
    echo 'erro';
}
?>