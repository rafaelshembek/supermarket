<?php
session_start();
if(isset($_SESSION['id_user'])){
    $id_empresa = $_SESSION['id_user'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novas Compras</title>
</head>
<body onload="setJason()" style="background: #4AC767;">
    <div class="ui attached stackable secomdary menu border-0 shadow-lg" style="background: #4AC767;">
        <p class="ui label m-3">Painel Beta</p>
        <a class="nav-link text-white text-center m-2" href="../"><strong>Inicio</strong></a>
        <a class="nav-link text-white text-center m-2" href="./loja/<?php echo $id_empresa; ?>"><strong>loja</strong></a>
        <div class="right menu">
            <a class="nav-link text-white text-center m-2" href="../logica/logout.php"><strong>Sair</strong></a>
        </div>
    </div>
    <!-- <div class="ui container">
        <h1 class="align-self-center font-weight-light text-muted m-2"><i class="shopping bag icon"></i> Compras</h1>
        
        <span class="floating ui info message showNotif m-2" style="display: none; cursor: pointer;"><i class="sync alternate icon"></i> Atualizar a Pagina</span>
    </div> -->
    <!-- ============================================================== -->
    <section class="ui container bg-white shadow-lg mt-5" style="border-radius: 20px;">
        <div class="card-body">
            <h1 class="align-self-center font-weight-light text-muted m-2"><i class="shopping bag icon"></i> Compras</h1>
        </div>
        <div class="row m-2">
            <div class="col-md-12">
                <div class="card-body">
                    <h2 class="font-weight-bold text-muted">Compras realizadas na loja</h2>
                    <p class="alert alert-warning"><strong>Aqui estarão as compas feita por seus clientes</strong></p>
                </div>
            </div>
        </div>
        <section class="ui container new_cliente">
            
        </section>
    </section>
    <!-- ============================================================== -->


    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/angular/angular.min.js"></script>
    <script src="../js/js/listnewcomprasApp.js"></script>
    <!-- <script src="../js/js/confirma_envior_compras.js" type="modules"></script> -->
</body>
</html>