<?php
    require_once('class/Gestor_DB.php');

    // conexão com o banco de dado
    try {
        //code...
        $gestor_bd = new Gestor_DB();
        $conn = new PDO('mysql:dbname='.$gestor_bd->getBasedado().';host='.$gestor_bd->getHost(), $gestor_bd->getUser(), 
        $gestor_bd->getPass());

        $query_string = "SELECT *, sum(valor_total) as total from pedido left join produto on pedido.id_produto = produto.id_produto group by produto having total > 1000 limit 4";

        $getResult = $conn->prepare($query_string);
        $getResult->execute();

        $row_result = $getResult->fetchAll();

        shuffle($row_result);

        $conn = null;

    } catch (\Throwable $th) {
        throw $th;
    }

?>
<section class="ui container-fluid bg-warning">
    <div class="row" style="background: #f96930;">
        <div class="col-md-4">
            <div class="card-body">
                <div class="h3 text-white font-weight-light">Produtos mais procurado</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-body"></div>
        <?php if(count($row_result) > 0): ?>
        <div class="col-md-12 d-flex justify-content-center align-content-center flex-wrap">
            <?php foreach ($row_result as $key => $value): ?>
                <div class="card_produto_more_bay shadow-lg align-self-center m-1 bg-white">
                    <div class="card-body text-center">
                        <p class="font-weight-bold text-muted"><?php $value["produto"]; ?></p>
                    </div>
                        <div class="text-center">
                            <img src="./img/produtos/<?php echo $value["img_produto"]; ?>" height="100">
                        </div>
                    <div class="card-body text-center">
                        <div class="font-weight-light text-center text-muted"><?php echo $value["descricao"] ?></div>
                    </div>
                    <div class="preco">
                        <span class="font-weight-bold cifrao shadow">R$</span>
                        <div class="font-weight-bold"><?php echo number_format($value["preco"],2, '.', ',') ?></div>
                    </div>
                    <div class="d-flex justify-content-center align-content-center flex-wrap m-2">
                            <a class="ui green button" href="interface/loja/<?php echo $value['id_loja']; ?>"><i class="shopping cart icon"></i>Visitar a loja</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="card-body"></div>
        <?php else:?>
        <div class="card-body"></div>
        <div class="col-md-12 d-flex justify-content-center align-content-center flex-wrap">
            <div class="card-body text-center text-white">
                <div class="h1 font-weight-light">Sem produtos para mostra</div>
            </div>
        </div>
        <div class="card-body"></div>
        <?php endif;?>
    </div>
</section>