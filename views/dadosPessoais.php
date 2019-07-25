<?php 
    // session_start();
    // require_once('../logica/infor_dados.php');
    // if(isset($_SESSION['id_user'])){
    //     $id_empresa = $_SESSION['id_user'];
    //     $infor_dados = new \Dados_Moradias\Dados();
    //     $infor_dados->infor_dados($id_empresa);
    // }
?>
<div class="row d-flex justify-content-center">
    <div class="col-md-12">
        <div class="card-body">
            <label class="alert alert-warning shadow-lg">
                <h2 class="font-weight-bold">Dados de moradia!</h2>
                <p class="font-weight-light">Seus <strong class="ui blue label">Dados de Moradia</strong> é necessário para que suas compras possar chegar ate você.</p>
            </label>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form class="ui form" action="../logica/logica_dados_usuario.php" method="post">
                        <div class="three eguals width fields">
                            <div class="field">
                                <label for="rua_moradia">Rua:</label>
                                <input type="text" name="rua_moradia" id="rua_moradia" placeholder="Nome de Sua Rua">
                            </div>
                            <div class="field">
                                <label for="numero_moradia">Numero da Casa ou Apatarmento:</label>
                                <input type="number" name="numero_moradia" min="0" id="numero_moradia" placeholder="Numero da Casa ou Patarmento">
                            </div>
                            <div class="field">
                                <label for="bairro_moradia">Bairro:</label>
                                <input type="text" name="bairro_moradia" id="bairro_moradia" placeholder="Bairro">
                            </div>
                        </div>
                        <div class="three equals width fields">
                            <div class="field">
                                <label for="cidade_moradia">Cidade</label>
                                <input type="text" name="cidade_moradia" id="cidade_moradia" placeholder="Cidade">
                            </div>
                            <div class="field">
                                <label for="estado_moradia">Estado</label>
                                <input type="text" name="estado_moradia" id="estado_moradia" placeholder="Estado ex: Goiais">
                            </div>
                            <div class="field">
                                <label for="referencia_moradia">Referencia de sua Localidade</label>
                                <input type="text" name="referencia_moradia" id="referencia_moradia" placeholder="Referencia ex: torre">
                            </div>
                        </div>
                        <div class="field"><button class="ui blue button" type="submit">Salvar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>