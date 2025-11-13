<div class="card">
    <div class="card-header">
        <h2 class="text-center">Destaques</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <?php 
            $urlDoces = "link api doces";
            $dadosDoces = json_decode(file_get_contents($urlDoces));

            foreach($dadosDoces as $dados){
                ?>
                <div class="col-12 col-md-3">
                    <div class="card text-center">
                        <img src="<?$img?><?=$dados->imagem ?>" alt="<?=$dados->nome ?>">
                        <p>
                            <strong><?=$dados->nome ?></strong>
                        </p>
                        <p>
                            <a href="doces/detalhes/<?=$dados->id ?>" class="btn btn-success">
                                <i class="fas fa-search"></i> Ver Detalhes
                        </p>
                    </div>
                </div>
                <?php 
            }
            ?>
        </div>
        <p class="text-center">
            <a href="doces/index" class="btn btn-success btn-lg">
                <i class="fas fa-search"></i> Ver todos os doces
            </a>

        </p>
    </div>
</div>