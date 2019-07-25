<?php
    require_once('cl_loja.php');
    class Teste extends Loja{
        private $nome;
        
        public function __construct(){
            $this->setNome($this->getNome());
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
    }
?>