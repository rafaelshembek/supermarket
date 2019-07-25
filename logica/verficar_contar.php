<?php
// ============================
require_once('../class/Select_DB.php');

$select = new Select_DB();

$params = array(
    ':id_empresas' => ''
);

$el = $select->exe_query("SELECT * FROM nome_empresas WHERE id_empresas = and id_loja = ", $params);
?>