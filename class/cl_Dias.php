<?php
require_once('Select_DB.php');
class Dias{
    // ===================================================
    public function dia_semana($id, $nome_dia, $nome_mes){

        $result = null;

        $select_compras = new Select_DB();
        $params = array(
            ':id_loja' => $id,
            ':dia_semana' => $nome_dia,
            ':nome_mes' => $nome_mes
        );
        $result = $select_compras->exe_query("SELECT *, CONCAT(datediff(curdate(), p.data_compra)) as registro, dayname(data_compra) as nome_dia, monthname(data_compra) as mes from pedido as p where p.id_loja = :id_loja having nome_dia = :dia_semana and mes = :nome_mes and registro = 0", $params);
        return $result;
    }
    // ===================================================
    public function search_id_clientes($id, $nome_dia, $nome_mes){

        $result = null;

        $select_compras = new Select_DB();
        $params = array(
            ':id_loja' => $id,
            ':dia_semana' => $nome_dia,
            ':nome_mes' => $nome_mes
        );
        $result = $select_compras->exe_query("SELECT *, dayname(p.data_compra) as nome_dia, monthname(p.data_compra) as mes from pedido as p join cadastro as c on p.id_usuario = c.idcadastro where p.id_loja = :id_loja group by p.data_compra desc having nome_dia = :dia_semana and mes = :nome_mes", $params);
        return $result;
    }
    // ===================================================
    public function dados_moradias($id_user_cliente){
        $result = null;
        $select_dados = new Select_DB();
        $param = array(
            ':id_user' => $id_user_cliente
        );
        $result = $select_dados->exe_query("SELECT * FROM dados_usuario as d WHERE d.id_user_online = :id_user ", $param);
        return $result;
    }
    // ===================================================
    public function getUsuario($id_user){
        $result = null;
        $select_usuario = new Select_DB();
        // $params = array(
        //     ':id_user' => $id_user
        // );
        $result = $select_usuario->exe_query("SELECT * FROM cadastro WHERE cadastro.idcadastro = :id_user", $params);
        return $result;
    }
    //===================================================
    public function getInformation($nome_dia = null, $id_loja){
        $result = null;
        $select_information = new Select_DB();
        $params = array(
            ':nameDay' => $nome_dia,
            ':id_loja' => $id_loja
        );
        $result = $select_information->exe_query("SELECT *, CONCAT(datediff(curdate(), pedido.data_compra)) AS registro, dayname(pedido.data_compra) AS nome_dia, hour(pedido.data_compra) AS hora_compra, minute(pedido.data_compra) AS minutos_compras FROM pedido LEFT JOIN cadastro ON pedido.id_usuario = cadastro.idcadastro WHERE pedido.id_loja = :id_loja and statu_compra = 0 GROUP BY pedido.data_compra HAVING registro = 0 and nome_dia = :nameDay ORDER BY pedido.data_compra DESC", $params);
        return $result;
    }
}
?>