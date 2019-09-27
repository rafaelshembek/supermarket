<?php
namespace MenuIndex;

require_once('cl_dados_usuario.php');

class Menu{
    
    private $id;
    private $type;


    public function displayMenu(){
        switch ($this->getType()) {
            case 'empresa':
                # code...
                $this->typeEmpresa();
                break;
            case 'usuario':
                # code...
                $this->typeUsuario();
                break;
            default:
                # code...
                $this->menuMain();
                break;
        }
    }

    private function menuMain(){
        echo '
        <div class="card-body">
            <img src="./img/logo_oficial/logo-super.market.png" height="30em" alt="mercado.bay">
        </div>
    <div class="right stackable attached secondary menu border-0 manu_top">
            <a class="item ui button text-white" style="background: green;" href="interface/signup"><strong>cadastre-se <i class="fas fa-sign-in-alt"></i></strong></a>
            <a class="item ui button text-muted" style="background: #fafafa;" href="interface/esqueceu_senha"><strong>esqueceu a senha <i class="fas fa-question"></i></strong></a>
    </div>';
    }

    private function typeEmpresa(){
        $dados = new \dadosOfUsuario\DadosUsuario();

        $dados->onDados($this->getId());
        echo '<div class="card-body">';
            echo '<img src="./img/logo_oficial/logo-super.market.png" height="30em" alt="mercado.bay">';
        echo '</div>';
        echo '<div class="item bg-white d-felx justify-content-center align-content-center flex-wrap">';
            if($dados->getImg()){
                echo '<img src="assets/avatar_perfil/'.$dados->getImg().'" class="ui avatar image border">';
            }else{
                echo '<img src="assets/avatar_perfil/padrao.jpg" class="ui avatar image border">';
            }
            echo '<span class="font-weight-bold">'.$dados->getNameUsuario().'</span>';
        echo '</div>';
            echo '<ul class="right menu">';
                echo '<a href="interface/list_new_compras.php" class="item ui bg-warning button  justify-content-center text-white font-weight-bold"><strong>Relatorio de Compras</strong></a>';
                echo '<a href="interface/painel.php" class="item ui bg-danger button  justify-content-center text-white font-weight-bold"><strong>Painel Administrativo</strong></a>';
                echo '<a class="item nav-link justify-content-center font-weight-bold" href="./logica/logout.php"><strong>Sair</strong></a>';
            echo '</ul>';
    }
    private function typeUsuario(){
        $dados = new \dadosOfUsuario\DadosUsuario();

        $dados->onDados($this->getId());

        echo '<div class="card-body">';
            echo '<img src="./img/logo_oficial/logo-super.market.png" height="30em" alt="mercado.bay">';
        echo '</div>';
        echo '<div class="item bg-white d-felx justify-content-center align-content-center flex-wrap">';
            if($dados->getImg()){
                echo '<img src="assets/avatar_perfil/'.$dados->getImg().'" class="ui avatar image border">';
            }else{
                echo '<img src="assets/avatar_perfil/padrao.jpg" class="ui avatar image border">';
            }
            echo '<span class="font-weight-bold">'.$dados->getNameUsuario().'</span>';
        echo '</div>';
        echo '<ul class="right menu">';
            echo '<a class="item ui bg-danger button justify-content-center text-white font-weight-bold" href="interface/PainelUsuario.php"><strong>Painel usuario</strong></a>';
            echo '<a class="item nav-link justify-content-center font-weight-bold" href="./logica/logout.php"><strong>Sair</strong></a>';
        echo '</ul>';
    }
    // /**
    //  * Get the value of id
    //  */ 
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getType(){
        return $this->type;
    }
    public function setType($type){
        // verificar o tipo de conta
        $this->type = $type;
    } 
}

?>