<?php
// REQUIRES
require_once('../class/Select_DB.php');

// estilo para a messagens de aviso
echo '<head>';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">';
echo '</head>';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $senha = $_POST['senha'];
    $id_user = $_POST['id_user'];
    $id_loja = $_POST['id_loja'];

    $editar = false;

    $pass_crypt = md5($senha);

    $params = array(
        ':Username' => $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING),
        ':Email' => $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        ':Senha' => $pass_crypt,
        ':Id_user' => $id_user
    );
    // verificar se foi passado dados nos campo do formulario
    if($params[':Username'] == '' | $params[':Email'] == '' | $params[':Senha'] == ''){
        echo '<div class="ui raised very padded text container segment">';
            echo '<div class="ui header">';
                echo '<h1>Alguns dos Campos não foram preenchido</h1>';
            echo '</div>';
            echo '<a class="ui button" href="../interface/configuracoes.php">voltar</a>';
        echo '</div>';
    }else{
        $update = new Select_DB();
        $update->exe_query("UPDATE cadastro SET username = :Username, email = :Email, senha = :Senha WHERE idcadastro = :Id_user", $params);
        
        $select = new Select_DB();
        $params = array(
            ':id_usuario' => $id_user
        );
        $dadosRow = $select->exe_query("SELECT * FROM cadastro WHERE idcadastro = :id_usuario", $params);
        foreach($dadosRow as $value){
            $tipo_conta = $value['tipo_conta'];
        }
        switch ($tipo_conta) {
            case 'empresa':
                    // echo '<a href="../interface/configuracoes.php">Empresa voltar</a>';
                    header("Location: ../interface/configuracoes.php");
                break;
            
            case 'usuario':
                    // echo '<a href="../interface/PainelUsuario.php">Usuario voltar</a>';
                    header("Location: ../interface/PainelUsuario.php");
                break;
        }
        // header("Location: ../interface/configuracoes.php");
    }
}

?>