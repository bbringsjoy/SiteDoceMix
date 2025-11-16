<?php 

$urlDoce= "http://localhost/DoceMix/public/apis/doce.php?id={$id}";
$dadosDoce = json_decode(file_get_contents($urlDoce));


if(!empty($dadosDoce)){

    $_SESSION["carrinho"][$id] = [
        "id" => $dadosDoce->id,
        "nome" => $dadosDoce->nome,
        "valor" => $dadosDoce->valor,
        "imagem" => $dadosDoce->imagem,
        "quantidade" => 1
    ];

} else {
    echo "<h2> Doce inválido </h2>";
}


?>