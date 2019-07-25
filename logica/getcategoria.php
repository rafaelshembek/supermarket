<?php
require_once('../class/Select_DB.php');


// buscar todas as categorias
$select = new Select_DB();
$el = $select->exe_query("SELECT * FROM `categorias`", null, true, true);

?>
<?php
        foreach ($el as $value) {
                # code...
                $dados[] = $value;
                
        }
        header('Content-Type: text/json');
        echo json_encode($dados);
?>