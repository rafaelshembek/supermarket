<?php
require_once('Gestor_DB.php');
class Select_DB extends Gestor_DB{


    // executar um consulta na base de dado
    public function exe_query($string, $parameters = NULL, $close_conexao = true, $chasert = false){
        try{
            $resultado = null;
            $ligacao = new PDO('mysql:dbname='.$this->getBasedado().';host='.$this->getHost().'', $this->getUser(), $this->getPass());
            if($chasert){
                $ligacao->exec("SET NAMES utf8");
                if ($parameters != NULL){
                    $query = $ligacao->prepare($string);
                    $query->execute($parameters);
                    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    // $ligacao->exec("SET NAMES UTF8");
                    $query = $ligacao->prepare($string);
                    $query->execute();
                    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                }
                
                if($close_conexao){
                    $close_conexao = null;
                }
            }else{
                if ($parameters != NULL){
                    $query = $ligacao->prepare($string);
                    $query->execute($parameters);
                    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                }else{
                    // $ligacao->exec("SET NAMES UTF8");
                    $query = $ligacao->prepare($string);
                    $query->execute();
                    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                }
                
                if($close_conexao){
                    $close_conexao = null;
                }
            }

            return $resultado;
        }catch(Exception $e){
            echo '<p>'.$e->getMessage().'</p>';
        } 
    }
}
?>