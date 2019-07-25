<?php
require_once('Gestor_DB.php');
class Verific_user extends Gestor_DB{
    protected $id_user;

    public function verifyIdUser($id_user = null){
        if($id_user){
            return $this->verifyDadosUser($id_user);
        }else{
            return '<div class="alert alert-danger">O seu id não foi passado entre em contato com um Desenvolvedor</div>';
        }
    }

    private function verifyDadosUser($id_user){
        try {
            $resultado = null;
            $ligacao = new PDO('mysql:dbname='.$this->getBasedado().';host='.$this->getHost().'', $this->getUser(), $this->getPass());
            
            $query = $ligacao->prepare("SELECT * from dados_usuario where dados_usuario.id_user_online = ".$id_user);
            $query->execute();
            $resultado[] = $query->fetch(PDO::FETCH_ASSOC);
            $ligacao = null;
            return $resultado;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
?>