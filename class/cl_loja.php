<?php
class Loja{
    private $nome;
    private $nome_completo;
    private $id_loja;
    private $email;
    private $tipo_conta;
    //====================
    
    // public function __construct(){
    //     $this->nome = 'dfasdfasdfs';
    // }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    } 
    public function getId_loja()
    {
        return $this->id_loja;
    }
    public function setId_loja($id_loja)
    {
        $this->id_loja = $id_loja;
    } 
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    } 
    public function getTipo_conta()
    {
        return $this->tipo_conta;
    }
    public function setTipo_conta($tipo_conta)
    {
        $this->tipo_conta = $tipo_conta;
    } 
    public function getNome_completo()
    {
        return $this->nome_completo;
    }
    public function setNome_completo($nome_completo)
    {
        $this->nome_completo = $nome_completo;
    }
}
?>