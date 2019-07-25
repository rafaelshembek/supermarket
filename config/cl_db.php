<?php
class BD{

    private $bd_name = "marketplace";
    private $host = 'localhost';
    private $user = 'rafael';
    private $pass = '159357';

    public function conexao_db(){
        $ligacao = new PDO("mysql:dbname={$this->getDBname()};host={$this->getHost()}", $this->getUser(), $this->getPass());
        $ligacao->exec("SET NAMES UTF8");
    }
    //metodos get e set
    public function getDBname(){
        return $this->bd_name;
    }
    public function setDBname($bd_name){
        $this->bd_name = $bd_name;
    }
    public function getHost(){
        return $this->host;
    }
    public function setHost($host){
        $this->host = $host;
    }
    public function getUser(){
        return $this->user;
    }
    public function setUser($user){
        $this->user = $user;
    }
    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        $this->pass = $pass;
    }
}

?>