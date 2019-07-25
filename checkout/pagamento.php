<?php

namespace Add_pagamento;

require_once('../class/Insert_DB.php');
require_once('../class/Select_DB.php');
require_once('../class/ID_maximo_tabela.php');
require_once('../funcoes/fu_loja.php');
require_once('../class/Produtos_pedidos.php');

require_once('Add_pagamento.php');

use \Forma_pagamento\Forma_pagamento;

class pagamento extends \Forma_pagamento\Forma_pagamento{

    function add_produto($dados){
        $id_maximo = new \ID_maximo_tabela();
        $idMaximo = $id_maximo->exe_idMaximo('idPedido', 'pedido');
        $insert = new \Insert_DB();
        $param = array(
            ':idPedidos' => $idMaximo,
            ':id_usuario' => $dados[':1'],
            ':id_loja' => $dados[':2'],
            ':produto' => $dados[':3'],
            ':descricao' => $dados[':4'],
            ':preco' => $dados[':5'],
            ':qty_produto' => $dados[':6'],
            ':vendas_total' => $dados[':7'],
            ':troco' => $dados[':8'],
            ':dataPedido' => $dados[':9']
        );
        $insert->exe_insert("INSERT INTO pedido(idPedido, id_usuario, id_loja, produto, descricao, preco, qty_produto, valor_total, troco, dataPedido) VALUES(:idPedido, :id_usuario, :id_loja, :produto, :descricao, :preco, :qty_produto, :vendas_total, :troco, :dataPedido)", $param);
    }
    function Finalizar($dados){
        // adicionar as informações na tabela forma_pagamento
        $data_pagamento = date('Y-m-d H:i:s', time());
        $insert = new \Insert_DB();
        
        $params = array(
            ':id_maximo' => $dados[':0'],
            ':forma_pagamento' => $dados[':1'],
            ':total_compras' => $dados[':2'],
            ':id_loja' => $dados[':3'],
            ':id_usuario' => $dados[':4'],
            ':data_pagamento' => $data_pagamento
        );
       
        $insert->exe_insert("INSERT INTO forma_pagamento (id_pagamento, pagamento, id_loja, id_usuario, qty_compras, data_paga)VALUES(:id_maximo, :forma_pagamento, :id_loja, :id_usuario, :total_compras, :data_pagamento)", $params);
    }

    function delete_produto_carrinho($id_usuario, $id_loja){
        // class Select_DB();
        $update = new \Select_DB();
        
        $this->setId_online($id_usuario);
        $this->setId_loja($id_loja);

        $updateParam = array(
            ':id_online' => $this->getId_online(),
            ':id_loja' => $this->getId_loja()
        );
        // delete todos os produtos do carrinho do usuario
        $update->exe_query("DELETE FROM carrinho where carrinho.id_loja = :id_loja AND carrinho.id_usuario = :id_online", $updateParam);
    }
}

?>