<?php
// =============
//  REQUIRES_ONCE()
// =============
require_once('../class/Select_DB.php');
require_once('../class/ID_maximo_tabela.php');

// =============
//  VARÍAVEIS
// =============
$file = $_FILES['imagem_avatar'];
$id_user = $_POST['id_user'];
// $id_loja = $_POST['id_loja'];
$id_avatar = $_POST['id_avatar'];
// =============
//  VERIFICAÇÃO DA IMAGEM
// =============
if($file['name'] == '' || $file['size'] > $_POST['MAX_FILE_SIZE'] || $file['error'] == 2){
    echo '<p>ERRO! Campo vazio ou O tamanho da imagem ultrapassou o permitido (2mb)</p>';
    echo '<a href=" ../interface/PainelUsuario.php">voltar</a>';
    exit;
}
    $select = new Select_DB();
    $params = array(
        ':id_avatar' => $id_avatar,
        ':id_user' => $id_user
    );
    $el = $select->exe_query("SELECT * FROM img_avatar WHERE img_avatar.id_avatar = :id_avatar AND img_avatar.id_user = :id_user", $params);
    // verificar se exite informações do usuario online se o retorno for null ser adicionado
    if($el == null){
        // obtem o idMaximo da tabela img_avatar
        $id_maximo = new ID_maximo_tabela();
        $idMaximo = $id_maximo->exe_idMaximo('id_avatar', 'img_avatar');
        $params = array(
            ':id_maximo' => $idMaximo,
            ':id_user' => $id_user,
            ':avatar' => $file['name']
        );
        $insert = new Select_DB();
        $insert->exe_query("INSERT INTO img_avatar VALUES(:id_maximo, :id_user, :avatar)", $params);
     
        // pasta onde a copia da img sera guardada
        $location_avatar = "../assets/avatar_perfil/";
        // mover a copia para a pastar
        move_uploaded_file($file['tmp_name'], $location_avatar.$file['name']);
        echo '</p>Upload success!</p>';
        echo '<a href=" ../interface/PainelUsuario.php">voltar</a>';   
    }else{
        foreach($el as $value){
            $id_img = $value['id_avatar'];
            $id_usuario = $value['id_user'];
        }
        // verificar se existe informações do usuario na tabela para fazer a trocar
        if($id_usuario != null){
            $params = array(
                ':id_avatar' => $id_avatar,
                ':id_user' => $id_user,
                ':avatar' => $file['name']
            );
            $insert = new Select_DB();
            $insert->exe_query("UPDATE img_avatar SET avatar = :avatar WHERE img_avatar.id_avatar = :id_avatar AND img_avatar.id_user = :id_user", $params);
    
            // pasta onde a copia da img sera guardada
            $location_avatar = "../assets/avatar_perfil/";
            // mover a copia para a pastar
            move_uploaded_file($file['tmp_name'], $location_avatar.$file['name']);
            echo '</p>Upload success!</p>';
            echo '<a href=" ../interface/PainelUsuario.php">voltar</a>';
        }
    }
?>