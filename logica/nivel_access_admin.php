<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $option_select = $_POST['setor'];
    $codigo_acesso = filter_input(INPUT_POST, 'codigo_acesso', FILTER_SANITIZE_STRING);

    // casos de nivel de acesso
    switch($option_select){
        case 'admin':
                echo 'Admin';
                    if($codigo_acesso !== ''){
                        echo '<br>'.$codigo_acesso;
                    }else{
                        exit("Erro");
                    }
            break;
        case 'funcio':
                echo 'Funcio';
            break;
        default:
            echo 'fadfasd';
            break;
    }

}
?>