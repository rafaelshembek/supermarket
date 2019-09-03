<?php

namespace dadosOfUsuario;

require_once('Select_DB.php');

class DadosUsuario {

    private $id;
    private $nameUsuario;
    private $tipoConta;
    private $img;
    private $email;
    private $data_aniver;

    // public function __construct(){

    // }

    public function onDados($idLoja){
        $mySelect = new \Select_DB();
        $params = array(
            ':id' => $idLoja
        );
        $result = $mySelect->exe_query("SELECT * FROM img_avatar RIGHT JOIN cadastro ON img_avatar.id_user = cadastro.idcadastro WHERE cadastro.idcadastro = :id", $params);

        // print_r($result[0]);
        if($idLoja != null){
            $this->setId($result[0]['id_user']);
            $this->setNameUsuario($result[0]['username']);
            $this->setTipoConta($result[0]['tipo_conta']);
            $this->setImg($result[0]['avatar']);
            $this->setEmail($result[0]['email']);
            $this->setData_aniver($result[0]['data_aniver']);
        }else{
            $this->setId(null);
            $this->setNameUsuario('Sem nome');
            $this->setTipoConta(null);
            $this->setImg(null);
            $this->setEmail(null);
            $this->setData_aniver(null);
        }
    }


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * Get the value of tipoConta
     */ 
    public function getTipoConta()
    {
        return $this->tipoConta;
    }
    public function setTipoConta($tipoConta)
    {
        $this->tipoConta = $tipoConta;
    }

    /**
     * Get the value of nameUsuario
     */ 
    public function getNameUsuario()
    {
        return $this->nameUsuario;
    }
    public function setNameUsuario($nameUsuario)
    {
        $this->nameUsuario = $nameUsuario;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of data_aniver
     */ 
    public function getData_aniver()
    {
        return $this->data_aniver;
    }
    public function setData_aniver($data_aniver)
    {
        $this->data_aniver = $data_aniver;
    }
}

?>