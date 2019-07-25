<?php
require_once('../class/Select_DB.php');

class Calc{
    
    public function calcular($param1, $param2){
        $calc = new Select_DB();
        $resultado = null;
        $el = $calc->exe_query("SELECT SUM(preco_total) as preco from carrinho where carrinho.id_usuario = $param1 and carrinho.id_loja = $param2");
        foreach($el as $values){
            $resultado = $values['preco'];
            
        }
        return $resultado;
    }

    public function total_produto($param1, $param2){
        $buscar = new Select_DB();
        $resultado = null;
        $el = $buscar->exe_query("SELECT SUM(qty) as qty_total FROM carrinho WHERE carrinho.id_usuario = $param1 AND carrinho.id_loja = $param2");
        foreach($el as $items){
            $resultado = $items['qty_total'];
        }
        return $resultado;
    }
}
?>