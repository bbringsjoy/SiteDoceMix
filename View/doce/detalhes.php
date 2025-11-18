<?php 
$urlDoce = "http://localhost/DoceMix/public/apis/doce.php?id={$id}";
$dadosDoce = json_decode(file_get_contents($urlDoce));
?>

<div class="card">
    <div class="card-header">
        <?php 
        if (empty($dadosDoce)) {
            echo "<h2>Doce inválido</h2>";
        } else {
            echo "<h2>{$dadosDoce->nome}</h2>";
        }
        ?>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-12 col-md-4">
                <img src="<?= $img . $dadosDoce->imagem ?>" 
                     alt="<?= $dadosDoce->nome ?>" 
                     class="w-100">
            </div>

            <div class="col-12 col-md-8">
                <strong><p>Informações sobre:</p></strong>
                <?= $dadosDoce->descricao ?>

                <p class="float-end valor">
                    R$ <?= number_format($dadosDoce->valor, 2, ",", ".") ?>
                </p>

                <p class="float-start">
                    <a href="carrinho/adicionar/<?= $dadosDoce->id ?>" 
                       class="btn btn-success">
                        <i class="fas fa-cart-plus"></i> Adicionar ao Carrinho
                    </a>
                </p>

            </div>
        </div>
    </div>
</div>
