<?php 

$urlDoce= "http://localhost/DoceMix/public/apis/doce.php?id={$id}";
$dadosDoce = json_decode(file_get_contents($urlDoce));


if(!empty($dadosDoce)){

    $qtde = $_SESSION["carrinho"][$id]["qtde"] ?? 0;
    $qtde++;

    $_SESSION["carrinho"][$id] = array(
        "id" => $dadosDoce->id,
        "nome" => $dadosDoce->nome,
        "valor" => $dadosDoce->valor,
        "imagem" => $dadosDoce->imagem,
        "qtde" => $qtde);
    

    echo "<script>location.href='carrinho';</script>";

} else {
    echo "<h2> Doce inválido </h2>";
}


?>