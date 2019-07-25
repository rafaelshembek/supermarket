<?php
    session_start();
    require_once('../config/config.php');
    //require_once('infor_dados.php');
    $ligacao = new PDO("mysql:dbname=$baseDado; host=$host" , $user, $pass);
    //$ligacao->exec("SET NAMES utf8");
class BANCO_DADOS{
    
    //função para alter os dado da tabela
    function update_DB($tabela, $column, $novo_nome, $id_produto){
        //variaveis globais
        global $baseDado, $host, $user, $pass, $ligacao;

        switch ($tabela) {
            case 'produto':
                if($column == "nome_produto")
                {
                    try{
                        $update = $ligacao->prepare("UPDATE $tabela SET $column = ? WHERE id_produto = $id_produto");
                        $update->bindParam(1, $novo_nome, PDO::PARAM_STR);
                        $update->execute();
                        echo '<p>O dado do produto foi alterado com sucesso</p>';
                    }catch(Exception $e){
                        echo '<p>ERRO: na alteração de dado </p>'.$e->getMessage();
                    }
                }else if($column == "preco")
                {
                    try{
                        $update = $ligacao->prepare("UPDATE $tabela SET $column = ? WHERE id_produto = $id_produto");
                        $update->bindParam(1, $novo_nome, PDO::PARAM_STR);
                        $update->execute();
                        echo '<p>O dado do produto foi alterado com sucesso</p>';
                    }catch(Exception $e){
                        echo '<p>ERRO: na alteração de dado </p>'.$e->getMessage();
                    }
                }else if($column == "descricao")
                {
                    try{
                        $update = $ligacao->prepare("UPDATE $tabela SET $column = ? WHERE id_produto = $id_produto");
                        $update->bindParam(1, $novo_nome, PDO::PARAM_STR);
                        $update->execute();
                        echo '<p>O dado do produto foi alterado com sucesso</p>';
                    }catch(Exception $e){
                        echo '<p>ERRO: na alteração de dado </p>'.$e->getMessage();
                    }
                }
                break;
            case 'image_produto':
                if($column == "image_produto")
                {
                    try{
                        $update = $ligacao->prepare("UPDATE $tabela SET $column = ? WHERE id_image = $id_produto");
                        $update->bindParam(1, $novo_nome, PDO::PARAM_STR);
                        $update->execute();
                        echo '<p>O dado do da imagem foi alterado com sucesso</p>';
                    }catch(Exception $e){
                        echo '<p>ERRO: na alteração de dado </p>'.$e->getMessage();
                    }
                }
            break;
            case 'categoria':
                if($column == "nome_categoria")
                {
                    try{
                        $update = $ligacao->prepare("UPDATE $tabela SET $column = ? WHERE id_categoria = $id_produto");
                        $update->bindParam(1, $novo_nome, PDO::PARAM_STR);
                        $update->execute();
                        echo '<p>O dado da categoria foi alterado com sucesso</p>';
                    }catch(Exception $e){
                        echo '<p>ERRO: na alteração de dado </p>'.$e->getMessage();
                    }
                }
            break;
        }
    }
    //adicionar dados na tabela
    function insert_DB($tabela, $id_column, $id_outher = null, $valor_1 = null,$valor_2 = null,$valor_3 = null,$valor_4 = null,$valor_5 = null){
        //variaveis globais
        global $baseDado, $host, $user, $pass, $ligacao;
        //verificar o id_maximo disponivel na tabela
        $verify = $ligacao->prepare("SELECT MAX($id_column) AS MaxId FROM $tabela");
        $verify->execute();
        $id_maximo = $verify->fetch(PDO::FETCH_ASSOC)['MaxId'];

        if($id_maximo == null){
            $id_maximo = 0;
        }else{
            $id_maximo++;
        }
        switch ($tabela) {
            case 'produto':
                if($valor_1 == $valor_1 && $valor_2 == $valor_2 && $valor_3 == $valor_3){
                    try{
                                //adicionar as informações na tabela
                        $sql = "INSERT INTO $tabela VALUES(?,?,?,?)";
                        $insert = $ligacao->prepare($sql);
                        $insert->bindParam(1, $id_maximo, PDO::PARAM_INT);
                        $insert->bindParam(2, $valor_1, PDO::PARAM_STR);
                        $insert->bindParam(3, $valor_2, PDO::PARAM_INT);
                        $insert->bindParam(4, $valor_3, PDO::PARAM_STR);
                        $insert->execute();
                        echo '<p>Produto adicionado com sucesso</p>';
                        //echo "<p>Categoria [$valor_1] adicionado com sucesso</p>";
                    }
                    catch(Exception $e){
                        echo '<p>ERRO >>> </p>'.$e->getMessage();
                    }
                }
                break;
            case 'image_produto':
                if($valor_1 == $valor_1 && $id_outher == $id_outher){
                    try{
                        $sql = "INSERT INTO $tabela VALUES(?,?,?)";
                        $insert = $ligacao->prepare($sql);
                        $insert->bindParam(1, $id_maximo, PDO::PARAM_INT);
                        $insert->bindParam(2, $id_outher, PDO::PARAM_INT);
                        $insert->bindParam(3, $valor_1, PDO::PARAM_STR);
                        $insert->execute();
                        echo '<p>Imagem do produto adicionado com sucesso</p>';
                    }catch(Exception $e){
                        echo '<p>ERRO >>> </p>'.$e->getMessage();
                    }
                }
                break;
            case 'categoria':
            if($valor_1 == $valor_1 && $id_outher == $id_outher){
                try{
                    $sql = "INSERT INTO $tabela VALUES(?,?,?)";
                    $insert = $ligacao->prepare($sql);
                    $insert->bindParam(1, $id_maximo, PDO::PARAM_INT);
                    $insert->bindParam(2, $id_outher, PDO::PARAM_INT);
                    $insert->bindParam(3, $valor_1, PDO::PARAM_STR);
                    $insert->execute();
                    var_dump($id_maximo);
                    echo "<p>Categoria [ $valor_1 ] no id do produto [ $id_outher ] adicionado com sucesso</p>";
                }catch(Exception $e){
                    echo '<p>ERRO >>> </p>'.$e->getMessage();
                }
            }
            break;
            case 'empresa':
            if($valor_1 == $valor_1 && $valor_2 == $valor_2 && $valor_3 == $valor_3 && $valor_4 == $valor_4 && $valor_5 == $valor_5){
                try{
                    $sql = "INSERT INTO $tabela VALUES(?, ?, ?, ?, ?, ?)";
                    $insert = $ligacao->prepare($sql);
                    $insert->bindParam(1, $id_maximo, PDO::PARAM_INT);
                    $insert->bindParam(2, $valor_1, PDO::PARAM_STR);
                    $insert->bindParam(3, $valor_2, PDO::PARAM_STR);
                    $insert->bindParam(4, $valor_3, PDO::PARAM_STR);
                    $insert->bindParam(5, $valor_4, PDO::PARAM_STR);
                    $insert->bindParam(6, $valor_5, PDO::PARAM_STR);
                    $insert->execute();
                    echo '<p class="info_sucesso">Conta cadastrada com sucesso</p>';
                }catch(Exception $e){
                    echo '<p>ERRO >>> </p>'.$e->getMessage();
                }
            }
            break;
            case 'cadastros':
            if($valor_1 == $valor_1 && $valor_2 == $valor_2 && $valor_3 == $valor_3 && $valor_4 == $valor_4 && $valor_5 == $valor_5){
                try{
                    $sql = "INSERT INTO $tabela VALUES(?, ?, ?, ?, ?, ?)";
                    $insert = $ligacao->prepare($sql);
                    $insert->bindParam(1, $id_maximo, PDO::PARAM_INT);
                    $insert->bindParam(2, $valor_1, PDO::PARAM_STR);
                    $insert->bindParam(3, $valor_2, PDO::PARAM_STR);
                    $insert->bindParam(4, $valor_3, PDO::PARAM_STR);
                    $insert->bindParam(5, $valor_4, PDO::PARAM_STR);
                    $insert->bindParam(6, $valor_5, PDO::PARAM_STR);
                    $insert->execute();
                    echo '<p class="info_sucesso">Conta cadastrada com sucesso</p>';
                }catch(Exception $e){
                    echo '<p>ERRO >>> </p>'.$e->getMessage();
                }
            }
            break;
        }
        $ligacao = null;
    }
    function select_BD($tabela, $valor_1, $valor_2){
        global $baseDado, $host, $user, $pass, $ligacao;

        $sql = "SELECT * FROM  $tabela Where email = ? AND senha = ?";
        $insert = $ligacao->prepare($sql);
        $insert->bindParam(1, $valor_1, PDO::PARAM_STR);
        $insert->bindParam(2, $valor_2, PDO::PARAM_STR);
        $insert->execute();

        if($insert->rowCount() == 0){
            echo '<p>Não tem cadastro com esse login</p>';
            echo '<a href="../">Tente novamente</a>';
            exit;
        }else{
            $result = $insert->fetch(PDO::FETCH_ASSOC);
            $tipo_conta = $result['tipo_conta'];
            $_SESSION['user'] = $result['username'];
            $email = $result['email'];

            echo $tipo_conta.'<br>';
            echo $email;
        }
    }
}
?>