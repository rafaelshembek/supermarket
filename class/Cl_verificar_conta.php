<?php
// class que verificar o tipo de paramentro passado empresa ou usuario
namespace Conta;

require_once('../class/Select_DB.php');
require_once('../funcoes/fu_loja.php');

class Verificar_conta{

    // =================================
    function conta($id = null){
        $resultRow = '';
        if($id){
            $select = new \Select_DB();
            $param = array(
                ':id_user' => $id
            );
            $resultRow = $select->exe_query("SELECT * FROM cadastros WHERE id_cadastro = :id_user", $param);
        }else{
            return;
        }
        return $resultRow;
    }
    // =================================
}
?>
<p style="color: #999; font-family: verdana;">class Cl_verificar_conta.php</p>
<?php

// $conta = new \Conta\Verificar_conta();
// $contaRow = $conta->conta();
$conta = new \Funcoes();
$conta->loja(4);
echo '<p>'.$conta->getTipo_conta().'</p>';
echo '<pre>';
    // var_dump();
echo '</pre>';
// array_values($contaRow);

if($conta->getTipo_conta() == 'usuario'){
    echo '<p>Conta usuario</p>';
    echo '<p>Esta é uma conta Usuario</p>';
}else if($conta->getTipo_conta() == 'empresa'){
    echo '<p>Esta é uma conta Empresa</p>';
}else{
    echo '<p>Esta conta não existe</p>';
}
?>