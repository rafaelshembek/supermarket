<?php
require_once('../class/Insert_DB.php');
class Finaly_produto{
    // ===============================

    public function paga_Produto($array){
        // $insert = new Insert_DB();
        // $el = $insert->exe_insert("INSERT INTO carrinho_compras()");
        $arr = [];
        foreach($array as $value){
            $arr[] = $value;
        }
        // echo $arr;
        echo '<pre>';
        echo '"JSON" = '.json_encode($arr,JSON_PRETTY_PRINT);
        echo '</pre>';
        // $el = $insert->exe_insert("INSERT INTO carrinho_compras 
        // VALUES('{$this->getId_maximo()}','{$this->getId_compras()}', '{$this->getId_loja()}', '{$this->getId_cadastro()}', '{$this->getId_produto()}', '{$this->getNome_produto()}', '{$this->getCategoria()}', '{$this->getDescricao()}', '{$this->getData_compra()}', '{$this->getTotal()}')");
        
    }
    
}
?>