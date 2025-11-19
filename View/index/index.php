<div class="card">
    <div class="card-header">
        <h2 class="text-center">Destaques</h2>
    </div>

    <div class="card-body">
        <div class="row">

            <?php 
            $urlDestaque = "http://localhost/DoceMix/public/apis/destaque.php";
            $dadosDestaque = json_decode(file_get_contents($urlDestaque));

            foreach ($dadosDestaque as $dados) {
            ?>
                <div class="col-12 col-md-3">
                    <div class="card text-center">

                        <img src="<?= $img . $dados->imagem ?>" 
                             alt="<?= $dados->nome ?>" 
                             class="w-100">

                        <p><strong><?= $dados->nome ?></strong></p>

                        <p>
                            <a href="doce/detalhes/<?= $dados->id ?>" 
                               class="btn btn-success">
                                <i class="fas fa-search"></i>
                                Ver Detalhes
                            </a>
                        </p>
                    </div>
                </div>
            <?php 
            }
            ?>
        </div>

        <p class="text-center mt-3">
            <a href="doce/index" class="btn btn-success btn-lg">
                <i class="fas fa-search"></i> Ver todos os doces
            </a>
        </p>

    </div>
</div>
