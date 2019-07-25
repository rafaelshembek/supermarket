<?php
require_once('../class/Cl_add_dados.php');
require_once('../class/Select_DB.php');
require_once('../class/ID_maximo_tabela.php');

echo '<head>';
    echo '<link rel="stylesheet" href="../Semantic-UI-CSS-master/semantic.min.css">';
    echo '<link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">';
    echo '<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">';
echo '</head>';
echo '<body style="background: #4AC767;">';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $idMaximo = new ID_maximo_tabela();
    $id_maximo = $idMaximo->exe_idMaximo('id_dados_contato', 'dados_usuario');
    $id_online = $_POST['id_user']; // id do usuario esta esta online
    $id_loja = $_POST['id_loja'];
    $id_dados = $_POST['id_dados'];
    $rua_moradia = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $numero_moradia = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $bairro_moradia = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade_moradia = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado_moradia = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $referencia_moradia = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING);

    if($rua_moradia == '' || $numero_moradia == '' || $bairro_moradia == '' || $cidade_moradia == '' || $estado_moradia == '' || $referencia_moradia == ''){
        echo '<div class="ui attached stackable shadow-lg menu border-0" style="background: #4AC767;">';
            echo '<div class="card-body"><img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em"></div>';
        echo '</div>';
        echo '<div class="ui container bg-white shadow-lg d-flex justify-content-center align-content-center flex-wrap m-5" style="border-radius: 10px;">';
        echo '<div class="row">';
            echo '<div class="col-md-12">';
                echo '<div class="card-body">';
                echo '<div class="h4 font-weight-light">Alguns dos Campos não foram preenchido... <i class="fas fa-exclamation-triangle"></i></div>';
                echo '</div>';
            echo '</div>';
            echo '<ul class="list">';
            echo '<a href="../interface/configuracoes.php"><strong>voltar</strong></a>';
            echo '</ul>';
        echo '</div>';
        echo '</div>';
        exit;
    }

    $select = new Select_DB();
    $params = array(
        ':id_dados' => $id_dados,
        ':id_online' => $id_online
    );
    $el = $select->exe_query("SELECT * FROM dados_usuario WHERE dados_usuario.id_dados_contato = :id_dados AND dados_usuario.id_user_online = :id_online", $params);

    if($el == null){
            // class para adicionar as informações na tabela
        $insert_produto = new Dados_pessoais\Cl_add_dados($id_maximo, $rua_moradia, $numero_moradia, $bairro_moradia, $estado_moradia, $cidade_moradia, $id_online, $referencia_moradia);

        $insert_produto->add_Dados();
        // echo '<p>ok....</p>';
        // echo '<a href=" ../interface/configuracoes.php">voltar para as configurações</a>';
        header("Location: ../interface/configuracoes.php");
    }else{
        foreach($el as $values){
            $id_dados = $values['id_dados_contato'];
            $id_online = $values['id_user_online'];
        }
        if($id_online != null){
            $rua_moradia = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
            $numero_moradia = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
            $bairro_moradia = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
            $cidade_moradia = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
            $estado_moradia = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
            $referencia_moradia = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING);

            $params = array(
                ':id_dados' => $id_dados,
                ':id_user' => $id_online,
                ':Rua' => $rua_moradia,
                ':Numero' => $numero_moradia,
                ':Bairro' => $bairro_moradia,
                ':Estado' => $estado_moradia,
                ':Cidade' => $cidade_moradia,
                ':Referencia' => $referencia_moradia
            );
    
            $update = new \Select_DB();
            $update->exe_query("UPDATE dados_usuario SET rua_moradia = :Rua, numero_moradia = :Numero, bairro_moradia = :Bairro, cidade_moradia = :Cidade, estado_moradia = :Estado, referencia_moradia = :Referencia WHERE dados_usuario.id_dados_contato = :id_dados and dados_usuario.id_user_online = :id_user", $params);
        
            // echo '<p>Dados Update</p>';
            // echo '<a href=" ../interface/configuracoes.php">voltar para as configurações</a>';
            header("Location: ../interface/configuracoes.php");
        }
    }
}
echo '</body>';
?>