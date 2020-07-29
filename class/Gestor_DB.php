<?php 
// class para se conectar com o servidor
class gestor_DB{
    // variaveis com os dados da conexao com o servidor
    private $basedado;
    private $host;
    private $user;
    private $pass;

    //função construtor
    public function __construct()
    {
        // hospedagem 
        // $this->basedado = "epiz_23571897_mercadofacil";
        // $this->host = "sql304.epizy.com";
        // $this->user = "epiz_23571897";
        // $this->pass = "taJrHyI5";
        // localhost
        $this->basedado = "marketplace";
        $this->host = "localhost";
        $this->user = "rafael";
        $this->pass = "rafael159357";
    }

     
    public function getBasedado()
    {
        return $this->basedado;
    }
    public function setBasedado($basedado)
    {
        $this->basedado = $basedado;
    } 
    public function getHost()
    {
        return $this->host;
    }
    public function setHost($host)
    {
        $this->host = $host;
    } 
    public function getUser()
    {
        return $this->user;
    }
    public function setUser($user)
    {
        $this->user = $user;
    } 
    public function getPass()
    {
        return $this->pass;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
}
?>