<?php

require_once('../class/Select_DB.php');

session_start();

$id_loja = $_SESSION['id_user'] ?? null;


$select = new Select_DB();

$mes = getdate(time());

$param = array(
    ':id_loja' => $id_loja
    // ':nomeMes' => $mes['month']
);
$r = $select->exe_query("SELECT id_loja, SUM(valor_total) AS total_compras, monthname(data_compra) AS mes FROM pedido WHERE id_loja = :id_loja group by mes", $param);

echo json_encode($r, JSON_PRETTY_PRINT);

?>