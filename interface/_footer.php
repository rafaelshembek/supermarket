
<!-- rodaper -->
<footer class="ui container-fluid">
        <div class="row">
            <div class="col-md-8 footer-side-left d-flex justify-content-center align-content-center flex-wrap">
                
                <div class="card-body text-white">
                    <img src="./img/logo_oficial/logo-small-top-page-cadasttro.png" width="200em" alt="mercado bay" srcset="">
                    <div class="h1 font-weight-light text-white">Grupo Empresarial</div>
                </div>
                <div class="card-body text-white text-center">
                    <!-- <p class="font-weight-light">Total de <strong>empresas</strong></p> -->
                    <?php 
                        require_once('class/cl_total_empresas.php');
                        // $total = new Total_empresa();
                        // $total->get_total_empresa();
                    ?>
                </div>
            </div>
            <div class="col-md-4 footer-site-right d-flex justify-content-center align-content-center flex-column flex-wrap">
                <div class="card-body d-flex justify-content-center align-content-center flex-column">
                    <p class="text-center text-white font-weight-light">Plataforma com foco em apoio aos setores varejos e atacados.</p>
                </div>
                <div class="card-body text-center d-flex justify-content-center align-content-center flex-column flex-wrap">
                    <p class="text-center text-white">Seja Bem Vindo e Junte-se a nós</p>
                    <a class="ui button btn-sing-in-footer" href="interface/signup.php"><i class="sign-in icon"></i> Cadastre-se</a>
                </div>
                <div class="card-body text-center m-0 d-flex justify-content-center align-content-center flex-column">
                    <!-- Endereço plataforma -->
                    <p class="font-weight-light text-center text-light m-1">Escritorio de Desenvolvimento</p>
                    <p class="font-weight-bold text-center text-white">Itinga - Ma <i class="br flag"></i></p>           
                </div>
            </div>
        </div>
</footer>
<div class="row" style="background: #000;">
    <div class="col-md-9">
        <div class="card-body">
                        <div class="title text-white">&copy 2019 all rights reserved Todo os direitos reservados</div>
                        <div class="text-white">Plataforma de Comercio Online</div>
        </div>
    </div>
    <div class="col-md-3 d-flex justify-content-center align-content-center">
        <div class="card-body d-flex justify-content-center align-content-center flex-wrap">
            <a class="ui facebook icon circular button" href="#!">
                <i class="facebook icon"></i></a>

            <a href="#!" class="ui instagram icon circular button">
            <i class="instagram icon"></i></a>
        </div>
    </div>
</div>

<!-- jquerys & Javascript -->
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/angular/angular.min.js"></script>
<script src="./node_modules/angular-route/angular-route.js"></script>
<script src="./Semantic-UI-CSS-master/semantic.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./js/jQuery/route-nav-inicial.js"></script>
<script src="./js/jQuery/search.js"></script>
<script src="./js/jQuery/modal_search.js"></script>
<script src="./js/jQuery/messagem_ajax.js"></script>
<script src="./js/js/notifycationBeyUser.js"></script>
<script src="./js/js/produtos-vitrini.js"></script>
<script src="./js/js/nav-logica.js"></script>
<script src="./js/js/tagsProdutosindex.js"></script>

</body>
</html>