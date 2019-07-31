<!DOCTYPE html>
<html lang="pt-BR" ng-app="signup">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina de Cadastro</title>
</head>
<body>
<ul class="ui attached stackable secondary segment menu border-0 shadow" style="background:  #4AC767;">
    <div class="d-flex justify-content-center text-white">
        <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="100em" alt="">
    </div>
</ul>
<section class="card-body" ng-controller="formSignupCtrl">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 bg-white shadow-sm">
                <div class="card-body">
                    <form class="ui massive form" action="cadastros.php" method="post">
                                    <div class="ui attached secondary stackable menu border-0">
                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="card-body d-flex justify-content-center align-content-center flex-wrap text-center">
                                                <img src="../img/logo_oficial/logo-super.market.png" width="200em" alt="logo supermarket">
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="h4 font-weight-light text-muted">Tipo de conta</div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="item">
                                                    <div class="ui label toggle checkbox" style="background: #fff;">
                                                        <input type="checkbox" name="opcao" ng-model="empresa" id="empresa" value="empresa">
                                                            <label class="text-muted">Empresa</label>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="ui label toggle checkbox" style="background: #fff;">
                                                        <input type="checkbox" name="opcao" ng-model="usuario" id="usuario" value="usuario">
                                                            <label class="text-muted">Usuario</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <div class="two fields">
                                <div class="field">
                                    <!-- <label class="font-weight-light" for="nome_completo">Nome Completo</label> -->
                                    <input type="text" name="nome_completo" id="nome_completo" placeholder="Seu Nome Completo">
                                </div>
                                <div class="field" ng-class="{d: usuario}">
                                    <!-- <label class="font-weight-light" for="nome_fantasia"><pre>{{nome_empresa}}</pre></label> -->
                                    <input type="text" name="nome_fantasia" ng-disabled="usuario" ng-class="{d: usuario}" id="nome_fantasia" placeholder="Nome de Sua Empresa">
                                </div>
                        </div>
                        <div class="field">
                            <div class="field">
                                <!-- <label class="font-weight-light" for="username">Username:</label> -->
                                <input type="text" name="username" id="username" placeholder="Nome de usuario ex: yanaOn">
                            </div>
                        </div>
                        <div class="field">
                            <div class="field">
                                <!-- <label class="font-weight-light" for="email">Email:</label> -->
                                <input type="email" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="field">
                            <div class="field">
                                <!-- <label class="font-weight-light" for="senha">Senha:</label> -->
                                <input type="password" name="senha" id="senha" placeholder="Senha">
                            </div>
                        </div>
                        <div class="fields d-flex justify-content-center align-content-center flex-wrap">
                            
                            <button type="submit" class="ui button button-cadastrar"><i class="check icon"></i> Cadastrar</button>
                            <a type="button" class="ui button" style="background:#f2f2f2;" href="../"><i class="fas fa-reply"></i> voltar ao inicio</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 backgroundSide d-flex justify-content-center align-content-center flex-column">
                <div class="card-body mt-3">
                    <div class="h2 font-weight-bold text-white text-center">
                        Ofereça mais conforto na hora de fazer as compras
                    </div>
                </div>
                <div class="card-body text-center">
                    <div class="h3 font-weight-bold text-white text-center">
                        Seus clientes merecem
                    </div>
                </div>
                <div class="card-body text-center">
                    <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" width="200em" alt="logo supermarket">
                </div>
                <div class="card-body text-center text-white">
                    <p><strong class="ui orange header">Power by</strong> Creative Agency</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- ====================================================== -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/angular/angular.min.js"></script>
    <script src="../js/jQuery/signup_modal.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</body>
</html>