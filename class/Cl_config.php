<?php
// Buscar as informações do Usuario online
require_once('Select_DB.php');
class Configuracoes
{
    private $nome_completo;
    private $nome_fantasia;
    private $usuario;
    private $email;
    private $tipo_conta;
    private $id;

    public function infor_usuario($param){
        $resultado = null;
        $select = new Select_DB();
        $el = $select->exe_query("SELECT * FROM cadastro WHERE idcadastro = ".$param);
        foreach($el as $value){
            $nome_completo = $value['nome_completo'];
            $nome_fantasia = $value['nome_empresa'];
            $usuario = $value['username'];
            $tipo_conta = $value['tipo_conta'];
            $email = $value['email'];
            $id = $value['idcadastro'];
            $resultado = $this->setNome_completo($nome_completo);
            $resultado = $this->setNome_fantasia($nome_fantasia);
            $resultado = $this->setUsuario($usuario);
            $resultado = $this->setEmail($email);
            $resultado = $this->setTipo_conta($tipo_conta);
            $resultado =$this->setId($id);
        }
        return $resultado;
    }
    
    public function getNome_completo()
    {
        return $this->nome_completo;
    }
    public function setNome_completo($nome_completo)
    {
        $this->nome_completo = $nome_completo;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
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
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of nome_fantasia
     */ 
    public function getNome_fantasia()
    {
        return $this->nome_fantasia;
    }

    /**
     * Set the value of nome_fantasia
     *
     * @return  self
     */ 
    public function setNome_fantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;

        return $this;
    }
}
?>