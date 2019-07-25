<?php

namespace Forma_pagamento;

// class supe
class Forma_pagamento{
    
    private $id_online;
    private $id_loja;
    private $total_compras;

    public function getId_online()
    {
        return $this->id_online;
    }
    public function setId_online($id_online)
    {
        $this->id_online = $id_online;
    }
    public function getId_loja()
    {
        return $this->id_loja;
    }
    public function setId_loja($id_loja)
    {
        $this->id_loja = $id_loja;
    }
    public function getTotal_compras()
    {
        return $this->total_compras;
    }
    public function setTotal_compras($total_compras)
    {
        $this->total_compras = $total_compras;
    }

}
?>