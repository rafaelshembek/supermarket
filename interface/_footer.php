
<!-- rodaper -->
<section>
    <div class="row">
        <div class="col-md-12">
            <div id="mapFooter" class="d-flex justify-content-center align-content-center flex-wrap flex-column bg-dark">
                <div class="ui card shadow-lg">
                    <div class="content">
                        <div class="ui center aligned header">Mercado.bay</div>
                        <div class="ui center aligned description">Plataforma de comercio online</div>
                    </div>
                    <div class="extra content">
                        Itinga - Ma  Brasil <i class="flag br"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="ui container-fluid">
        <div class="row">
            <div class="col-md-8 footer-side-left d-flex justify-content-center align-content-center flex-wrap">
                
                <div class="card-body text-white">
                    <img class="border p-2" src="./img/logo_oficial/logo-small-top-page-cadasttro.png" width="200em" alt="mercado bay" srcset="">
                    <div class="h1 font-weight-light text-white">Grupo Empresarial</div>
                    <div class="h5">Escritorio</div>
                    <div>Contato: (99) 991259570</div>
                    <div>Email: agenciaatech@gmail.com</div>
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
                <div class="card-body d-flex justify-content-center align-content-center flex-column flex-wrap">
                    <div class="h1 font-weight-light text-center text-muted">A melhor experiência que seus clientes procura.</div>
                </div>
            </div>
        </div>
</footer>
<div class="row" id="footer-buttom">
    <div class="col-md-9">
        <div class="card-body">
                        <div class="title text-white">&copy 2019 all rights reserved Todo os direitos reservados</div>
                        <div class="text-white">Plataforma de Comercio Online</div>
        </div>
    </div>
    <div class="col-md-3 d-flex justify-content-center align-content-center">
        <div class="card-body d-flex justify-content-center align-content-center flex-wrap">
            <a class="ui button" href="#!">facebook</a>

            <a href="#!" class="ui button">instagram</a>
        </div>
    </div>
</div>

<!-- jquerys & Javascript -->
<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<!-- <script src="./node_modules/socket.io-client/dist/socket.io.js"></script> -->
<script src="./node_modules/angular/angular.min.js"></script>
<script src="./node_modules/angular-route/angular-route.js"></script>
<script src="./Semantic-UI-CSS-master/semantic.min.js"></script>
<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./js/js/index.js" type="module"></script>
<script src="./bundle.js"></script>
<script src="./js/jQuery/route-nav-inicial.js"></script>
<script src="./js/js/notifycationBeyUser.js"></script>
<script src="./js/js/tagsProdutosindex.js"></script>
<!-- <script src="./scripts/client.js"></script> -->
</body>
</html>