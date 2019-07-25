<?php
require_once('../class/Select_DB.php');
class Funcoes
{
    // campos
    private $nome_loja;
    private $username;
    private $tipo_conta;
    private $email;
    private $id_loja;

    // funções $param = id da loja
    public function loja($param = null)
    {
        $resultado = null;
        $select = new Select_DB();
        $el = $select->exe_query("SELECT * FROM cadastro WHERE idcadastro = ".$param);
        foreach ($el as $value) {
            $nome_loja = $value['nome_completo'];
            $username = $value['username'];
            $typo_conta = $value['tipo_conta'];
            $email = $value['email'];
            $id_loja = $value['idcadastro'];
           $resultado = $this->setNome_loja($nome_loja);
           $resultado = $this->setUsername($username);
           $resultado = $this->setTipo_conta($typo_conta);
           $resultado = $this->setEmail($email);
           $resultado = $this->setId_loja($id_loja);
           ///echo $this->getNome_loja();
        }
        return $resultado;
    }
    // metodos esperciais
    public function getNome_loja()
    {
        return $this->nome_loja;
    }
    public function setNome_loja($nome_loja)
    {
        $this->nome_loja = $nome_loja;
    } 
    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    } 
    public function getTipo_conta()
    {
        return $this->tipo_conta;
    } 
    public function setTipo_conta($tipo_conta)
    {
        $this->tipo_conta = $tipo_conta;
    } 
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    } 
    public function getId_loja()
    {
        return $this->id_loja;
    }
    public function setId_loja($id_loja)
    {
        $this->id_loja = $id_loja;
    }
}
?>