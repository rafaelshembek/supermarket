<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
// =============
//  REQUIRES_ONCE()
// =============
require_once('../class/Insert_DB.php');
require_once('../class/ID_maximo_tabela.php');

// verificar se o formulario foi submetido
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $id_categoria = filter_input(INPUT_POST, 'categorias', FILTER_SANITIZE_STRING);
    $img_produto = $_FILES['img_produto'];
    $id_loja = $_POST['id_loja'];
    $preco = $_POST['preco'];



    // verificar os campos dos dados se foram preenchido
    if($produto == '' || $descricao == '' || $id_categoria == '' || $preco == ''){
        echo '<div class="ui attached negative message">';
            echo '<div class="header">ERRO! Os Campos estão vazio, Tente novamente!</div>';
            echo '<a class="ui negative button" href="../interface/cadastrar_produtos.php">voltar</a>';
        echo'</div>';
        exit;
    }
    // verificar o envio da img_produto
    // var_dump($img_produto);
    if($img_produto['name'] == '' || $img_produto['size'] > $_POST['MAX_FILE_SIZE'] || $img_produto['error'] == 2){
        echo '<div class="ui attached negative message">';
            echo '<div class="header">ERRO! Campo estão vazio ou O tamanho da imagem ultrapassou o permitido (2mb)</div>';
            echo '<a class="ui negative button" href="../interface/cadastrar_produtos.php">voltar</a>';
        echo'</div>';
        exit;
    }
    $insert = new Insert_DB();
    $id_maximo = new ID_maximo_tabela();
    $idMaximo = $id_maximo->exe_idMaximo('id_produto', 'produto');

    // $produto = utf8_decode($produto);
    // $descricao = utf8_decode($descricao);

    $params = array(
        ':id_maximo' => $idMaximo,
        ':id_loja' => $id_loja,
        ':id_categoria' => $id_categoria,
        ':produto' => $produto,
        ':descricao' => $descricao,
        ':img_produto' => $img_produto['name'],
        ':preco' => $preco
    );
    // insirar os dados do formulario no banco de dado
    $insert->exe_insert("INSERT INTO produto VALUES(:id_maximo, :id_loja, :id_categoria, :produto, :descricao, :img_produto, :preco)", $params);

    $local_pastar_img = '../img/produtos/';

    move_uploaded_file($img_produto['tmp_name'], $local_pastar_img.$img_produto['name']);
    echo '<p>Produto Cadastrardo com sucesso.</p>';
    echo $produto.'<br>';
    echo $descricao.'<br>';
    echo 'id categoria: '.$id_categoria.'<br>';
    echo $preco.'<br>';
    echo $img_produto['name'];
    // echo '<span><a href="../interface/cadastrar_produtos.php">voltar</a></span>';
    header('Location: ../interface/cadastrar_produtos.php');
}
?>    
</body>
</html>
