<?php 
    $urlDoces = "link api doces";//ao invés de passar o id, coloque {$id} na url
    $dadosDoces = json_decode(file_get_contents($urlDoces));


?>

<div class="card">
    <div class="card-header">
        <?php 
        if(empty($dadosDoces->$id)){
            echo "<h2> Doce inválido </h2>";
        } else {
            echo "<h2>{$dadosDoces->nome}</h2>";
        }
        ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="<?$img?><?=$dadosDoces->imagem ?>" alt="<?=$dadosDoces->nome ?>" class="w-100">
            </div>
            <div class="col-12 col-md-8">
                <strong><p>Informações sobre:</p></strong>
                <?=$dadosDoces->descricao ?>

                <p class="float-end valor">
                    R$ <?number_format($dadosDoces->valor, 2, ",", ".") ?>
                </p>

                <p class="float-start">
                    <a href="carrinho/adicionar/<?=$dadosDoces->id?>" class="btn btn-success">
                        <i class="fas fa-cart-plus"></i> Adicionar ao Carrinho
                    </a>
                </p>
            </div>
        </div>
    </div>

</div>