<?php
    session_start();
    if(isset($_SESSION['id_user']) &&  isset($_GET['id'])){
        require_once('../class/cl_GetRelatorioCompras.php');
        
        $relatorio = new GetRelatorioCompras();
        $rowDados = $relatorio->getForma_pagamento();

        foreach($rowDados as $value){
            $registro = $value['registro'];
        }
        echo $registro;
        if($registro == 0){
            echo '<h2>Hoje</h2>';
            foreach($rowDados as $value){
                $dados[] = $value;
            }
            echo '<pre>';
            echo json_encode($dados, JSON_PRETTY_PRINT);
            echo '</pre>';
        }else{
            echo '<p>'.$registro.' Dias Antes</p>';
        }
        // echo json_encode($dados, JSON_PRETTY_PRINT);
       
    }
?>