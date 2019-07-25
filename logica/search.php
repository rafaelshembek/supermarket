<?php
    require_once('../class/Select_DB.php');
    require_once('../class/cl_loja.php');

    $nome_pesquisar = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
    // $nome_pesquisar = 'mag';
    if($nome_pesquisar == ''){
        echo '<p>O campo não foi preenchido</p>';
        echo '<a href="../logica/../">voltar</a>';
        exit;
    }
    $select = new Select_DB();
    
    $param = array(
        ':nome_empresa' => '%'.$nome_pesquisar.'%'
    );

    $el = $select->exe_query(
        "SELECT cadastro.idcadastro, cadastro.nome_empresa FROM empresa 
       LEFT JOIN cadastro ON empresa.idcadastro = cadastro.idcadastro 
        WHERE nome_empresa LIKE :nome_empresa", $param);
    // $result = [];
    // foreach($el as $values){
    //     $result[] = $values;
    // }
    echo json_encode($el);
    
?>