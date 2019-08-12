<head>
<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>
<?php
session_start();
require_once('../class/Cl_add_dados.php');
require_once('../class/Insert_DB.php');
require_once('../class/Select_DB.php');
require_once('../class/ID_maximo_tabela.php');

$id_maximo_dados = new ID_maximo_tabela();
$idMaximo = $id_maximo_dados->exe_idMaximo('id_dados_contato', 'dados_usuario');

$rua_moradia = filter_input(INPUT_POST, 'rua_moradia', FILTER_SANITIZE_STRING);
$numero_moradia = filter_input(INPUT_POST, 'numero_moradia', FILTER_SANITIZE_NUMBER_INT);
$bairro_moradia = filter_input(INPUT_POST, 'bairro_moradia', FILTER_SANITIZE_STRING);
$cidade_moradia = filter_input(INPUT_POST, 'cidade_moradia', FILTER_SANITIZE_STRING);
$estado_moradia = filter_input(INPUT_POST, 'estado_moradia', FILTER_SANITIZE_STRING);
$id_online = $_SESSION['id_user']; //id da session online
$referencia_moradia = filter_input(INPUT_POST, 'referencia_moradia', FILTER_SANITIZE_STRING);
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
// echo $id_online;
if($rua_moradia == '' || $numero_moradia == '' || $bairro_moradia == '' || $cidade_moradia == '' || $estado_moradia == '' || $referencia_moradia == ''){
    echo '<div class="ui info message">';
        echo '<div class="header">';
            echo '<h4 class="font-weight-light">';
            echo '<i class="exclamation triangle icon"></i>';
            echo ' Alguns dos Campos não foram preenchido...';
            echo '</h4>';
        echo '</div>';
            echo '<ul class="list">';
            echo '<a class="ui red button" href="../interface/PainelUsuario.php">voltar</a>';
            echo '</ul>';
    echo '</div>';
    exit;
}


// ===================================
$params = array(
    ':id_online' => $id_online
);
// buscar as informações do usuario pelo id de session
$select_dados = new Select_DB();
$el = $select_dados->exe_query('SELECT * FROM dados_usuario WHERE dados_usuario.id_user_online = :id_online', $params);
// ===================================
// verificar se o usuario tem dados de moradia cadastrador
if($el == null){
    /**
     * se o resultado retorna $el == null sem dados
     * sera adicionar na tabela logo abaixo 
     *  */
    $insert_dados = new \Dados_pessoais\Cl_add_dados($idMaximo, $rua_moradia, $numero_moradia, $bairro_moradia, $estado_moradia, $cidade_moradia, $id_online, $referencia_moradia, $latitude, $longitude);
    $insert_dados->add_Dados();
    echo '<p>ok....</p>';
    // echo '<a href=" ../interface/PainelUsuario.php">voltar</a>';
    header("Location: ../interface/PainelUsuario.php");
// se não tiver dados cadastrador os dados seram cadastrador
}else{
    /** 
     * aquir fara o processo da atualização dos dado na tabela
     * */
    foreach($el as $value){
        $id_dados_contato = $value['id_dados_contato'];
        $id_user_online = $value['id_user_online'];
    }
    if($id_user_online != null){
        $params = array(
            ':id_dados' => $id_dados_contato,
            ':id_user' => $id_user_online,
            ':Rua' => $rua_moradia,
            ':Numero' => $numero_moradia,
            ':Bairro' => $bairro_moradia,
            ':Estado' => $estado_moradia,
            ':Cidade' => $cidade_moradia,
            ':Referencia' => $referencia_moradia
        );
        $update_dados = new Select_DB();
        $update_dados->exe_query("UPDATE dados_usuario SET rua_moradia = :Rua, numero_moradia = :Numero, bairro_moradia = :Bairro, cidade_moradia = :Cidade, estado_moradia = :Estado, referencia_moradia = :Referencia WHERE dados_usuario.id_dados_contato = :id_dados and dados_usuario.id_user_online = :id_user", $params);

        // echo '<p>Dados Update</p>';
        echo '<a href=" ../interface/PainelUsuario.php">voltar</a>';
        // header("Location: ../interface/PainelUsuario.php");
    }
}
?>