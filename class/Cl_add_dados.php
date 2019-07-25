<?php

namespace Dados_pessoais;

require_once("Insert_DB.php");
require_once("Select_DB.php");

class Cl_add_dados
{
    private $id;
    private $id_user;
    private $rua;
    private $numero;
    private $bairro;
    private $estados;
    private $cidade;
    private $referencia;

    public function __construct($id_maximo, $rua, $numero, $bairro, $estados, $cidade, $id_user, $referencia)
    {
        $this->setId($id_maximo);
        $this->setRua($rua);
        $this->setNumero($numero);
        $this->setBairro($bairro);
        $this->setEstados($estados);
        $this->setCidade($cidade);
        $this->setId_user($id_user);
        $this->setReferencia($referencia);
    }
    
    public function add_Dados(){
        $insert = new \Insert_DB();
        $select = new \Select_DB();

        $params = array(
            ':Id' => $this->getId(),
            ':Rua' => $this->getRua(),
            ':Numero' => $this->getNumero(),
            ':Bairro' => $this->getBairro(),
            ':Estado' => $this->getEstados(),
            ':Cidade' => $this->getCidade(),
            ':Id_user' => $this->getId_user(),
            ':Referencia' => $this->getReferencia()
        );
        $insert->exe_insert("INSERT INTO dados_usuario (id_dados_contato, id_user_online, rua_moradia, numero_moradia, bairro_moradia, cidade_moradia, estado_moradia, referencia_moradia)VALUES(:Id, :Id_user, :Rua, :Numero, :Bairro, :Cidade, :Estado, :Referencia)", $params);
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getRua()
    {
        return $this->rua;
    }
    public function setRua($rua)
    {
        $this->rua = $rua;
    } 
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    } 
    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    } 
    public function getEstados()
    {
        return $this->estados;
    }
    public function setEstados($estados)
    {
        $this->estados = $estados;
    } 
    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    } 
    public function getReferencia()
    {
        return $this->referencia;
    }
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    } 
    public function getId_user()
    {
        return $this->id_user;
    }
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }
}
