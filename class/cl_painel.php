<?php

use class_Painel\Painel;

require_once('Painel.php');
require_once('Select_DB.php');

class cl_Painel extends Painel{

    // fazer a consultar e buscar as 3 categorias mais que venderam
    public function Categoria($id_loja){
        $this->setIdentificador_loja($id_loja);
        $select_categoria = new Select_DB();
        $param = array(
            ':id_loja' => $this->getIdentificador_loja()
        );
        if($this->getIdentificador_loja() != null){
            $resultado = $select_categoria->exe_query("SELECT sum(qty_produto) as total, sum(valor_total) as vendas_totais, CONCAT(datediff(curdate(), pedido.data_compra)) as registro from pedido where pedido.id_loja = :id_loja group by registro limit 3", $param);
            //Obs: having valor_total >= 90.00 limit 3
            return $resultado;
        }
        else{
            echo '<div class="container card-body text-center alert alert-danger">';
            echo '<h3 class="card-title">Error o ID da loja não foi localizador</h3>';
            echo '<p class="card-text">Entre em contato com um desenvolvedor para resolver esse problema!</p>';
            echo '</div>';
        }
    }
    // buscar o total de vendas
    public function PrecoTotal($id_loja){
        $this->setIdentificador_loja($id_loja);
        $param = array(
            ':id_loja' => $this->getIdentificador_loja()
        );
        $select_preco_total = new Select_DB();
        if($this->getIdentificador_loja() != null){
            $resultado = $select_preco_total->exe_query('SELECT sum(valor_total) as total_valor FROM pedido where pedido.id_loja = :id_loja', $param);
            return $resultado;
        }
    }
    // consultar a soma total de todos os valores a quantidade de produto de uma unica loja em um determinado mes
    public function Valor_Qty_Mes($id_loja){
        $this->setIdentificador_loja($id_loja);
        $select_valor_and_qty = new Select_DB();
        $param = array(
            ':id_loja' => $this->getIdentificador_loja()
        );
        if($this->getIdentificador_loja() >= 0){
            $resultado = $select_valor_and_qty->exe_query("SELECT sum(valor_total) as preco_total, count(idPedido) as qty_produto, monthname(data_compra) as meses, year(data_compra) as ano, month(data_compra) as mes_number from pedido join produto on pedido.id_produto = produto.id_produto where id_loja = :id_loja", $param);
            return $resultado;
        }
    }
    public function getValor_Total($id_loja){
        $this->setIdentificador_loja($id_loja);
        $select_valor = new Select_DB();
        $param = array(
            ':id_loja' => $this->getIdentificador_loja()
        );
        if($this->getIdentificador_loja() != null){
            $resultado = $select_valor->exe_query("SELECT monthname(data_compra) as mes, sum(valor_total) as total from pedido where pedido.id_loja = :id_loja", $param);
        }
    }
    public function registros_Vendas($id_loja){
        $this->setIdentificador_loja($id_loja);
        $select_registro = new Select_DB();
        $param = array(
            ':id_loja' => $this->getIdentificador_loja()
        );
        if($this->getIdentificador_loja() != null){
            $resultado = $select_registro->exe_query("SELECT COUNT(valor_total) as preco_unid, SUM(valor_total) as valor_total,
            CONCAT(datediff(curdate(), pedido.data_compra)) as registro 
            from pedido where pedido.id_loja = :id_loja group by registro limit 3", $param);
            return $resultado;
        }
    }
}

?>