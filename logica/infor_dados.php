<?php

namespace Dados_Moradias;

require_once('../class/Select_DB.php');

class Dados
{
    private $rua;
    private $numero;
    private $bairro;
    private $estado;
    private $cidade;
    private $referencia;
    private $id;
    
    public function infor_dados($id_online)
    {
        $select = new \Select_DB();
        $el = $select->exe_query("SELECT * FROM dados_usuario WHERE dados_usuario.id_user_online = $id_online");

        if(\count($el) != null){
            foreach($el as $values){
                $id_dados = $values['id_dados_contato'];
                $nome_rua = $values['rua_moradia'];
                $numero_casa = $values['numero_moradia'];
                $bairro_cidade = $values['bairro_moradia'];
                $cidade_estado = $values['cidade_moradia'];
                $estado_pais = $values['estado_moradia'];
                $referencia_cidade = $values['referencia_moradia'];
            }

            $this->setId($id_dados);
            $this->setRua($nome_rua);
            $this->setNumero($numero_casa);
            $this->setBairro($bairro_cidade);
            $this->setEstado($estado_pais);
            $this->setCidade($cidade_estado);
            $this->setReferencia($referencia_cidade);
        }else{
            $this->setId(null);
            $this->setRua('Vazio');
            $this->setNumero('Vazio');
            $this->setBairro('Vazio');
            $this->setEstado('Vazio');
            $this->setCidade('Vazio');
            $this->setReferencia('Vazio');
        }
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
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
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
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
}

?>