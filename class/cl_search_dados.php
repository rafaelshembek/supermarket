<?php
require_once('./config/config.php');
$ligacao = new PDO("mysql:dbname=$baseDado; host=$host" , $user, $pass);
class SEARCH{
    private $nome;
    private $tipo_conta;
    private $username;
    private $email;

    //funções perquisar dados
    public function search_dados($id_user){
        global $baseDado, $host, $user, $pass, $ligacao;

        $sql = "SELECT * FROM login WHERE id_login = ?";
        $motor = $ligacao->prepare($sql);
        $motor->bindParam(1, $id_user, PDO::PARAM_INT);
        $motor->execute();

        if($motor->rowCount() == 0){
            echo '<p>Sem informações no banco de dado</p>';
        }else{
            $result = $motor->fetch(PDO::FETCH_ASSOC);
            //adicionar as coluna nas variaveis
            $nome = $result['nome_completo'];
            $tipo_conta = $result['tipo_conta'];
            $username = $result['username'];
            $email = $result['email'];
            //configura as informações nos setter
           $this->setNome($nome);
           $this->setTipo_conta($tipo_conta);
           $this->setUsername($username);
           $this->setEmail($email);
        }
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of tipo_conta
     */ 
    public function getTipo_conta()
    {
        return $this->tipo_conta;
    }

    /**
     * Set the value of tipo_conta
     *
     * @return  self
     */ 
    public function setTipo_conta($tipo_conta)
    {
        $this->tipo_conta = $tipo_conta;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}

?>