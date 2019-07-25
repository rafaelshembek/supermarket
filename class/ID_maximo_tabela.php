<?php
require_once('Gestor_DB.php');
class ID_maximo_tabela extends Gestor_DB{
    // verificar o id maximo de uma tabela
    public function exe_idMaximo($coluna, $tabela, $close_conexao = true){
        try{
            $resultado = null;
            $ligacao = new PDO('mysql:dbname='.$this->getBasedado().';host='.$this->getHost().'', $this->getUser(), $this->getPass());
            $query = $ligacao->prepare("SELECT MAX($coluna) AS IDmax FROM $tabela");
            $query->execute();
            $resultado = $query->fetch(PDO::FETCH_ASSOC)['IDmax'];
            
            if($resultado == null){
               $resultado = 0;
            }else{
               $resultado ++;
            }
            if($close_conexao){
                $close_conexao = null;
            }

            return $resultado;
        }catch(Exception $e){
            echo '<p>'.$e->getMessage().'</p>';
        } 
    }
}
?>