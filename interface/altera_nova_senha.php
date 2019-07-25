<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Altera senha</title>
</head>
<body>
<?php
    $c = "";
    $ref = "";
    
    // var_dump($_GET['ref']);
    // $objectCopy = clode $_GET['ref'];
    // var_dump($objectCopy);

    if(isset($_GET['c']) && isset($_GET['ref'])):
        $chave = preg_replace('/[^[:alnum:]]/','',$_GET['c']);
        $ref = $_GET['ref'];
?>
<section class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6r d-flex justify-content-center align-content-center">
            <div class="card-body d-flex justify-content-center align-content-center">
                <div class="ui card">
                    <div class="card-header bg-primary text-white">Crier uma nova senha!</div>
                    <div class="card-body">
                        <form class="ui form" id="formAlteraSenha" action="../logica/nova_senha.php" method="post">
                        <input type="hidden" name="chave" value="<?php echo $_GET['c'] ?>">
                            <div class="field">
                                <div class="ui disabled input">
                                    <input type="hidden" name="email" value="<?php echo $ref; ?>">
                                </div>
                            </div>
                            <div class="field">
                                <input type="password" name="password_1" placeholder="Informe a sua nova senha">
                            </div>
                            <div class="field">
                                <input type="password" name="password_2" placeholder="Informer novamente sua senha">
                            </div>
                            <div class="field">
                                <button class="ui fluid blue button" type="submit"><i class="icon paper plane"></i> Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-primary text-white">
                        fazer login <a class="ui button" style="background: #fff;" href="../"><i class="icon sign-out"></i> inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php else:?>
            <div>
                <h1>ERRO:</h1>
                <p>Obtenha uma chave de acesso</p>
                <a href="../">Voltar para o inicio</a>
            </div>
    <?php endif; ?>

<div class="row">
<div class="col-md-12">
    <div class="card-body">
        <div class="ui steps border-0">
            <div class="step">
                <div class="content">
                    <div class="title"><strong class="text-primary">&copy 2019 all rights reserved</strong> Todo os direitos reservados</div>
                    <div class="description">Plataforma de Comercio Online</div>
                    <a class="ui facebook button" href="#!">
                        <i class="facebook icon"></i>Facebook</a>

                    <a href="#!" class="ui instagram button">
                    <i class="instagram icon"></i>Instagram</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>