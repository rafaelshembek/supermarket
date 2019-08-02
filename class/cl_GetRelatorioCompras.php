<?php
require_once('Select_DB.php');
class GetRelatorioCompras{
    // ==================================
    public function getRelatorio($id){ //obter os dados de moradia do usuario
        $relatorio = new Select_DB();
        $params = array(
            ':id_usuario' => $id
        );
        $resultRow = $relatorio->exe_query("SELECT * FROM dados_usuario left join cadastro on dados_usuario.id_user_online = cadastro.idcadastro where dados_usuario.id_user_online = :id_usuario", $params);
        return $resultRow;
    }
    // ==================================
    public function getComprasUsuario($id, $status){
        $relatorio = new Select_DB();
        $params = array(
            ':id' => $id,
            ':status_compras' => $status
        );
        $infor_Day = getdate();
        $resultRow = $relatorio->exe_query("SELECT * FROM pedido as p LEFT JOIN cadastro as c ON p.id_usuario = c.idcadastro WHERE p.id_usuario = :id and statu_compra = :status_compras", $params);
        
        return $resultRow;
    }
    // ============ CONFIRMAR O ENVIOR DAS COMPRAS ========
    public function setTrueCompra($id_cliente, $data_compra){
        $update = new Select_DB();
        $params = array(
            ':id_cliente' => $id_cliente,
            ':novo_value' => 1,
            ':data_compra' => $data_compra
        );
        $update->exe_query("UPDATE pedido SET statu_compra = :novo_value WHERE id_usuario = :id_cliente AND data_compra = :data_compra", $params);
    }
    //==================================
    public function getForma_pagamento(){
        $get_pagamento = new Select_DB();
        $return = $get_pagamento->exe_query("SELECT *, CONCAT(datediff(curdate(), forma_pagamento.data_paga)) as registro from forma_pagamento left join cadastro on forma_pagamento.id_usuario = cadastro.idcadastro");
        return $return;
    }
    // OBTER OS DADOS DA COMPRAS JUNTO COM AS INFORMAÇÕES DO USUARIO
    public function getForma_pagamento2($cliente = null, $data = null){
        $get_pagamento = new Select_DB();
        $param = array(
            ':client' => $cliente,
            ':data_compra' => $data
        );
        $return = $get_pagamento->exe_query("SELECT *, CONCAT(datediff(curdate(), forma_pagamento.data_paga)) AS registro 
        FROM forma_pagamento LEFT JOIN cadastro ON forma_pagamento.id_usuario = cadastro.idcadastro WHERE forma_pagamento.id_usuario = :client AND forma_pagamento.data_paga = :data_compra", $param);
        return $return;
    }
    public function getInformation($cliente = null, $data = null){
        $select = new Select_DB();
        $mArray = array(
            ':cliente' => $cliente,
            ':data_compra' => $data
        );
        return $return = $select->exe_query("SELECT * FROM pedido LEFT JOIN produto ON pedido.id_produto = produto.id_produto where pedido.id_usuario = :cliente AND pedido.data_compra = :data_compra", $mArray);
    }
}
?>