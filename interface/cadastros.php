<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/signup_dados.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background: #2cd248;">
<?php
session_start();

// $basedado = 'epiz_23571897_mercadofacil';
// $host = 'sql304.epizy.com';
// $user = 'epiz_23571897';
// $pass = 'taJrHyI5';
$basedado = 'marketplace';
$host = 'localhost';
$user = 'rafael';
$pass = '159357';

$connection  = new PDO("mysql:dbname=$basedado;host=$host", $user, $pass);

if($_SERVER['REQUEST_METHOD'] === 'POST'):

    // variaveis
    $opcao = isset($_POST['opcao']) ? $_POST['opcao'] : "";
    $nome_completo = filter_input(INPUT_POST, 'nome_completo', FILTER_SANITIZE_STRING);
    $nome_fantasia = filter_input(INPUT_POST, 'nome_fantasia', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $tipo_conta = filter_input(INPUT_POST, 'opcao', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    $data_aniver = date('Y-m-d H:i:s', time());
    $cripty_senha = md5($senha);

    $veriEmailExit = $connection->prepare("SELECT * FROM cadastro WHERE email = ?");
    $veriEmailExit->bindParam(1, $email, PDO::PARAM_STR);
    $veriEmailExit->execute();

    if($nome_completo == '' || $nome_completo == '' || $username == '' || $tipo_conta == '' || $email == '' || $senha == ''){
        echo '<div class="body d-flex justify-content-center align-conte-center">';
        echo '<div class="row d-flex justify-content-center align-content-center">';
            echo '<div class="d-flex justify-content-center align-content-center col-md-12">';
                    echo '<div class="card-body text-center">';
                        echo '<div class="h1 text-white">Opis!</div>';
                        echo '<div class="h3 text-white text-center">Encontramos <strong>Campos</strong> que não foram preenchido</div>';
                        echo '<div class="card-body">';
                        echo '<img id="img-error-form" class="shadow" src="../img/logo_oficial/form-error.png" width="100em">';
                        echo '</div>';
                        echo '<div class="text-white">Tente Novamente</div>';
                    echo '</div>';
            echo '</div>';
            echo '<div class="col-md-12">';
                echo '<div class="card-body text-center">';
                    echo '<a class="btn-voltar-erro" href="./signup"><i class="fas fa-undo"></i> <strong>voltar</strong></a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '</div>';
        exit();
    }

    if($veriEmailExit->rowCount() != 0){
        echo '<div class="row d-flex justify-content-center align-content-center">';
            echo '<div class="col-md-4">';
                echo '<div class="card-body d-flex justify-content-center align-content-center flex-column">';
                    echo '<h1 class="font-weight-light text-muted text-center">Ja existe um usuario com esse email</h1>';
                    echo '<h2 class="text-center">Tente Novamente</h2>';
                    echo '<a class="ui red button" href="./signup">voltar</a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    else{
        // verficar a posição disponivel no banco de dado para o usuario cadastrado
        $insertCadastro = $connection->prepare("SELECT MAX(idcadastro) AS idMAX FROM cadastro");
        $insertCadastro->execute();
        $idMaximo = $insertCadastro->fetch(PDO::FETCH_ASSOC)['idMAX'];
        
        if($idMaximo == null){
            $idMaximo = 0;
        }else{
            $idMaximo++;
        }

        switch($opcao){
            // tipo de cadastro empresa
            case 'empresa':
                
                $sql = "INSERT INTO cadastro VALUES(:id_cadastro, :nome_completo, :username, :nome_fantasia, :email, :senha, :tipo_conta, :data_aniver)";
                $insertEmpresa = $connection->prepare($sql);

                $insertEmpresa->bindParam(':id_cadastro', $idMaximo, PDO::PARAM_INT);
                $insertEmpresa->bindParam(':nome_completo', $nome_completo, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':username', $username, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':nome_fantasia', $nome_fantasia, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':email', $email, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':senha', $cripty_senha, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':tipo_conta', $tipo_conta, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':data_aniver', $data_aniver, PDO::PARAM_STR);
                $insertEmpresa->execute();
                $connection = null;
                break;
            // tipo de cadastro usuario
            case 'usuario':
                $elNull = null;
                $sql = "INSERT INTO cadastro VALUES(:id_cadastro, :nome_completo, :username, :nome_fantasia, :email, :senha, :tipo_conta, :data_aniver)";
                $insertEmpresa = $connection->prepare($sql);

                $insertEmpresa->bindParam(':id_cadastro', $idMaximo, PDO::PARAM_INT);
                $insertEmpresa->bindParam(':nome_completo', $nome_completo, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':username', $username, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':nome_fantasia', $elNull, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':email', $email, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':senha', $cripty_senha, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':tipo_conta', $tipo_conta, PDO::PARAM_STR);
                $insertEmpresa->bindParam(':data_aniver', $data_aniver, PDO::PARAM_STR);
                $insertEmpresa->execute();
                $connection = null;
                break;
        }

        echo '<div class="body d-flex justify-content-center align-conte-center">';
        echo '<div class="row d-flex justify-content-center align-content-center">';
            echo '<div class="d-flex justify-content-center align-content-center col-md-12">';
                    echo '<div class="card-body text-center">';
                        echo   '<img src="../img/logo_oficial/logo-super-market-2.png">';
                        echo '<div class="h2 font-weight-light text-white text-center m-3">Agradecemos pelo seu cadastro</div>';
                        echo '<p class="text-white text-center">Preparando para te levar a pagina de <strong class="ui yellow label">login</strong></p>';
                        echo '<div class="h4 reload_icon"><i id="reloading" class="fas fa-sync"></i></div>';
                    echo '</div>';
            echo '</div>';
            // echo '<div class="col-md-12">';
            //     echo '<div class="card-body text-center">';
            //         echo '<a class="ui green button" href="../">Voltar e fazer login</a>';
            //     echo '</div>';
            // echo '</div>';
        echo '</div>';
        echo '</div>';
    }
?>
<?php endif;?>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../js/jQuery/loading.js"></script>

</body>
</html>