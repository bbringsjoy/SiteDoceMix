<?php 
header("Content-Type: application/json");

    require "../../Config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();

    $sql = "SELECT * FROM categoria WHERE ativo = 'S' ORDER BY descricao";
    $consulta = $pdo->prepare($sql);
    $consulta->execute();

    $dadosCategoria = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($dadosCategoria);

?>