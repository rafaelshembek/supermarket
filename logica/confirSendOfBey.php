<?php
require_once('../class/cl_GetRelatorioCompras.php');

$idCliente = $_GET['cliente'];
$data = $_GET['data'];

$my_dados_cliente = new GetRelatorioCompras();
$my_dados_cliente->setTrueCompra($idCliente, $data);  

?>