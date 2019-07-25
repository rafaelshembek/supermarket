<?php
namespace class_Painel;
class Painel{
    private $identificador_loja;
    private $categoria;

    public function getIdentificador_loja()
    {
        return $this->identificador_loja;
    }
    public function setIdentificador_loja($identificador_loja)
    {
        $this->identificador_loja = $identificador_loja;
    } 
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
}
?>