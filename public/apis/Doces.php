<?php
    header("Content-Type: application/json");

    $id = $_GET['id'] ?? null;
    $categoria = $_GET['categoria'] ?? null;

    require "../../Config/Conexao.php";

    $db = new Conexao();
    $pdo = $db->conectar();


    if(!empty($categoria)) {
        //doces de uma categoria específica
        $sql = "select * from doces where ativo = 'S' and categoria_id = :categoria order by nome";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':categoria', $categoria);
        $consulta->execute();

        $dadosDoces = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } else if(!empty($id)) {
        //doce em específico pelo id
        $sql = "select * from doces where ativo = 'S' and id_doces = :id limit 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        $dadosDoces = $consulta->fetch(PDO::FETCH_ASSOC);

    } else {
        //todos os doces
         $sql = "select * from doces where ativo = 'S' and order by nome";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();

        $dadosDoces = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode($dadosDoces);
?>