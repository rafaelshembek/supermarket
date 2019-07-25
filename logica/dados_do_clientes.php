<?php
require_once('../class/cl_Dias.php');
session_start();
if(isset($_SESSION['id_user'])){

    $dia = getdate();
    
    define('NOME_DIAS', [
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thursday',
        '5' => 'Friday',
        '6' => 'Saturday',
        '7' => 'Sunday'
        ]);
        switch ($dia['weekday']) {
            case NOME_DIAS['1']:
                $notify_compras = new Dias();
                
                $dados_row = $notify_compras->getInformation(NOME_DIAS['1'],$_SESSION['id_user']);
                
                echo json_encode($dados_row, JSON_PRETTY_PRINT);
                break;
            case NOME_DIAS['2']:
                $notify_compras = new Dias();

                $dados_row = $notify_compras->getInformation(NOME_DIAS['2'],$_SESSION['id_user']);

                echo json_encode($dados_row, JSON_PRETTY_PRINT);
                break;
            case NOME_DIAS['3']:
                $notify_compras = new Dias();

                $dados_row = $notify_compras->getInformation(NOME_DIAS['3'],$_SESSION['id_user']);

                echo json_encode($dados_row, JSON_PRETTY_PRINT);
                break;
            case NOME_DIAS['4']:
                $notify_compras = new Dias();

                $dados_row = $notify_compras->getInformation(NOME_DIAS['4'],$_SESSION['id_user']);

               
                echo json_encode($dados_row, JSON_PRETTY_PRINT);
              
                break;
            case NOME_DIAS['5']:
                $notify_compras = new Dias();

                $dados_row = $notify_compras->getInformation(NOME_DIAS['5'],$_SESSION['id_user']);
                
                echo json_encode($dados_row, JSON_PRETTY_PRINT);
                
                break;
            case NOME_DIAS['6']:
                $notify_compras = new Dias();
                
                $dados_row = $notify_compras->getInformation(NOME_DIAS['6'], $_SESSION['id_user']);

                
                echo json_encode($dados_row, JSON_PRETTY_PRINT);
               

                break;
            case NOME_DIAS['7']:
                $notify_compras = new Dias();

                $dados_row = $notify_compras->getInformation(NOME_DIAS['7'],$_SESSION['id_user']);

                echo json_encode($dados_row, JSON_PRETTY_PRINT);
                break;
        }
}
?>