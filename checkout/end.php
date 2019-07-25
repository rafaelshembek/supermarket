<?php
namespace Finaly_Compra;

require_once('pagamento.php');
require_once('../class/ID_maximo_tabela.php');
require_once('../class/Select_DB.php');

class end_compras{
    // adicionar os produto do carrinho na tabela pedidos
    function checkout($id_usuario, $id_loja){
        $finaly = new \Add_pagamento\pagamento();
        $finaly->delete_produto_carrinho($id_usuario, $id_loja);

    }
    
    function produtos($dados){
        $id_maximo = new \ID_maximo_tabela();
        
        $idMaximo = $id_maximo->exe_idMaximo('idPedido', 'pedido');
        $finaly = new \Add_pagamento\pagamento();

        $insert = new \Insert_DB();
        $param = array(
            ':idPedido' => $idMaximo,
            ':id_usuario' => $dados[':id_usuario'],
            ':id_loja' => $dados[':id_loja'],
            ':produto' => $dados[':nome_produto'],
            ':descricao' => $dados[':descricao_produto'],
            ':preco' => $dados[':preco_produto'],
            ':qty_produto' => $dados[':qty'],
            ':vendas_total' => $dados[':valor_total'],
            ':dataPedido' => $dados[':dataPedido'],
            // ':status_compras' => 0
        );
        $insert->exe_insert("INSERT INTO pedido(idPedido, id_usuario, id_loja, produto, descricao, preco, qty_produto, valor_total, data_compra) VALUES(:idPedido, :id_usuario, :id_loja, :produto, :descricao, :preco, :qty_produto, :vendas_total, :dataPedido)", $param);
    }

    function dados_pagamento($dados){
        $finaly = new \Add_pagamento\pagamento();
        $params = array(
            ':0' => $dados[':id_maximo'],
            ':1' => $dados[':forma_pagamento'],
            ':2' => $dados[':total_compra'],
            ':3' => $dados[':id_loja'],
            ':4' => $dados[':id_usuario']
        );
     
        $finaly->Finalizar($params);
    }
}
?>