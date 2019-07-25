<?php
require_once('Select_DB.php');
class Total_empresa{

    public function get_total_empresa(){

        $html = '';

        $total = new Select_DB();
        $result = $total->exe_query("SELECT count(idempresa) as total FROM empresa");
        if($result == null){
            $html = $result = 0;
        }else{
            foreach($result as $value){
                $total = $value['total'];
            }
            $html .= '<div class="ui horizontal statistic">';
                $html .= '<h1 class="font-weight-light">';
                $html .= $total;
                $html .= '</h1>';
                $html .= '<div class="label text-muted font-weight-light">Empresas</div>';
            $html .= '</div>';

        }
        echo $html;
    }
}
?>