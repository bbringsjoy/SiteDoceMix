<?php
$urlDoce = "http://localhost/DoceMix/public/apis/doce.php";
$doce = json_decode(file_get_contents($urlDoce));
?>

<div class="container">
    <h1 class="text-center mt-4">Todos os Doces</h1>

    <div class="row mt-4">
        <?php foreach ($doce as $dados){ ?>
            <div class="col-12 col-md-3">
                <div class="card text-center">

                    <img src="<?= $img . $dados->imagem ?>" class="w-100">

                    <p><strong><?= $dados->nome ?></strong></p>

                    <p>
                        <a href="doce/detalhes/<?= $dados->id ?>" 
                           class="btn btn-success">
                           Ver Detalhes
                        </a>
                    </p>

                </div>
            </div>
        <?php }; ?>
    </div>
</div>
