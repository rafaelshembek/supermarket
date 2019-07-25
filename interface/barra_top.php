
<?php
    if(isset($_SESSION['id_user'])){
        require_once("./funcoes/fu_case_menu.php");
        require_once("./class/Select_DB.php");
        $id = $_SESSION['id_user'];
        barra_top($id);
    }
    function barra_top($id){
        $select_type_conta = new Select_DB();
        $el = $select_type_conta->exe_query("SELECT * from cadastro Where idcadastro = $id");
        foreach($el as $items){
            $tipo_conta = $items['tipo_conta'];
            $id_loja = $items['idcadastro'];
            $username = $items['username'];
        }
        $menu_case = new \Case_menu\menu_Top();
        $menu_case->menu($tipo_conta, $id_loja);
    }
?>