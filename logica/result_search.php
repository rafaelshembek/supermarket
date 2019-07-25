<?php
    require_once('../class/Select_DB.php');

    $select = new Select_DB();
    $el = $select->exe_query("SELECT * FROM cadastros");

    if(count($el) == null){
        echo '<p>Sem informações no banco de dados</p>';
        echo '<a href="../logica/../">voltar</a>';
    }else{
        $myArray = [];
        foreach ($el as  $value) {
            $myArray[] = $value;
            // $nome = $value['username'];
            // $id = $value['id_cadastro'];
            // if(isset($value['username'])){
            //     //echo $value['username']."<br>";
            //     echo '<a href="../interface/loja.php?loja='.$id.'">'.$nome.'</a><br>';
            // }
        }
        echo json_encode($myArray, JSON_PRETTY_PRINT);
        //echo '<a href="../logica/../">voltar</a>';
    }

?>