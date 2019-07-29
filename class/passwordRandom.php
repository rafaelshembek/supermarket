<?php
// ///////////// APELIDO DA CLASS PARA EVITAR COMFLITOR COM OUTRAS CLASS Password() ////////////////
namespace RandomPassword;
// class para gera uma nova senha com 12 caracter
class Password{
    // //////////// PROPRIEDADES PRIVATE  //////
    private $caracter;
    private $number_limit_string;
    private $psw_random;
// ////////////////////////////////////////////////////
// ///////////// CONSTRUTOR DA CLASS ////////////////
    public function __construct(){
        $this->setCaracter("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"); // conjuntos de caracter a-z A-Z 0-9
        $this->setNumber_limit_string(12); //quantidade de caracter que a senha tera
        $this->setPsw_random(null); // methodo para obter a senha ja construida
    }
// /////////////// CHAMA PARA MOSTRA A SENHA GERADA ////////////////
    public function getPassword(){ // methodo para mostra a senha gerada
        // verificar se existe caracter para ser gerada
        if($this->getCaracter()){
            return $this->getPsw_random();
        }else{ // mensagem de aviso caso se não existe nenhum caracter para criar uma senha
            return 'Error consulter um desenvolvedor';
        }
    }
// ////////////////////////////////////////////////////
//    methodos Getter e Setter private para ter o accesso so por methodos publicos
    private function getCaracter()
    {
        return $this->caracter;
    }

    private function setCaracter($caracter)
    {
        $this->caracter = $caracter;
    }
// ////////////////////////////////////////////////////   
    private function getNumber_limit_string()
    {
        return $this->number_limit_string;
    }

    private function setNumber_limit_string($number_limit_string)
    {
        $this->number_limit_string = $number_limit_string;
    }
// ////////////////////////////////////////////////////
    private function getPsw_random()
    {
        return $this->psw_random;
    }

    private function setPsw_random()
    {
        for($i = 0; $i < $this->getNumber_limit_string(); $i++){
            $this->psw_random .= substr($this->getCaracter(), rand(0, strlen($this->getCaracter())), 1);
        }
    }
// ////////////////////////////////////////////////////
}

?>