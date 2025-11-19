<?php
// API que retorna TODAS as categorias
$urlCategoria = "http://localhost/DoceMix/public/apis/categoria.php";
$listaCategorias = json_decode(file_get_contents($urlCategoria));

// Procurar o nome da categoria atual pelo ID recebido na URL
$nomeCategoria = "Categoria Desconhecida";

foreach ($listaCategorias as $cat) {
    if ($cat->id == $id) {
        $nomeCategoria = $cat->descricao;
        break;
    }
}

// Agora pegar os produtos da categoria
$urlDoceCategoria = "http://localhost/DoceMix/public/apis/doceCategoria.php?id=" . $id;
$dadosCategoria = json_decode(file_get_contents($urlDoceCategoria));
?>

<div class="container">
    <h1 class="text-center mt-4"> <?= $nomeCategoria ?></h1>

    <div class="row mt-4">

        <?php if (!empty($dadosCategoria)) { ?>
            <?php foreach ($dadosCategoria as $dados) { ?>
                
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

            <?php } ?>
        <?php } else { ?>
            <div class="col-12">
                <p class="text-center text-danger">
                    Nenhum produto encontrado nesta categoria.
                </p>
            </div>
        <?php } ?>

    </div>
</div>
