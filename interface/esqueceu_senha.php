<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/esqueceu_senha.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esqueceu a Senha</title>
</head>
<body>
    <div class="ui attached stackable secondary segment border-0 menu shadow bgMenuRecoveryPassword">
            <img src="../img/logo_oficial/logo-super-market-2.png" width="100em" alt="">
    </div>
    <section class="ui container mt-4 shadow d-flex justify-content-center align-content-center flex-column flex-wrap backgroundRecoveryPassword">
        <div class="row">
            <div class="col-md-12">
                <div class="showSuccessMessage shadow alert alert-success text-center"></div>
                <div class="showDangerMessage shadow alert alert-danger text-center"></div>
                <div class="showWarningMessage shadow alert alert-warning text-center"></div>
                <div class="card-body text-center">
                    <img src="../img/logo_oficial/logo-small-top-page-cadastro.png" alt="">
                    <div class="h1 text-muted font-weight-ligth">Recupere sua Senha</div>
                </div>
                <div class="card-body text-center">
                    <p>Verificaremos se o seu email esta em nosso banco de dado</p>
                    <p>Enviaremos uma nova senha para seu email</p>
                </div>
                <div class="card-body">
                    <form id="formRecoveryPassword" class="ui form" action="../logica/recuperar_senha.php" method="post">
                            <div class="field">
                                <div class="ui massive input">
                                    <input class="ui massive input" type="email" name="email" id="email" placeholder="Seu email">
                                </div>
                            </div>
                        <div class="ui buttons">
                            <button type="submit" class="ui green submit button"><i class="fas fa-check"></i> Enviar</button>
                            <a type="button" class="ui button" href="../"><i class="fas fa-reply"></i> voltar ao inicio</a>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </section>


    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../js/jQuery/recoveryPassword.js"></script>
</body>
</html>