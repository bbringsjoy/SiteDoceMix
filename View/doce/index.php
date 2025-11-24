<?php
$urlDoce = "http://localhost/DoceMix/public/apis/doce.php";
$doce = json_decode(file_get_contents($urlDoce));
?>

<div class="container">
    <h1 class="text-center mt-4" style="font-family: roboto; color: var(--maincolor); font-weight:bold;">Todos os Doces</h1>

    <div class="row mt-4">
        <?php foreach ($doce as $dados){ ?>
            <div class="col-12 col-md-3">
                <div class="card text-center" style="border: 1px solid var(--maincolor);">

                    <img src="<?= $img . $dados->imagem ?>" class="w-100">

                    <p style="padding-top:10px; border-top: 2px solid var(--maincolor); background-color:var(--thircolor); margin:0; padding-bottom:20px; font-family:roboto; font-weight: bold; font-size: 25px"><strong><?= $dados->nome ?></strong></p>

                    <p style="background-color:var(--thircolor); margin:0; padding-bottom:20px;">
                        <a href="doce/detalhes/<?= $dados->id ?>" 
                           class="btn btnscd btn-success">
                           Ver Detalhes
                        </a>
                    </p>

                </div>
            </div>
        <?php }; ?>
    </div>
</div>
