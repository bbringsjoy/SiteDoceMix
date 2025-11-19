<?php

class Carrinho
{
    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function salvar($dados)
    {
        $sqlVerifica = "select id from cliente where email = :email limit 1";
        $consultaVerifica = $this->pdo->prepare($sqlVerifica);
        $consultaVerifica->bindParam(":email", $dados["email"]);
        $consultaVerifica->execute();

        $dadosVerifica = $consultaVerifica->fetch(PDO::FETCH_OBJ);

        if (empty($dadosVerifica->id)) {
            $senha = password_hash($dados["senha"], PASSWORD_BCRYPT);

            $sqlCliente = "insert into cliente values(NULL, :nome, :email, :senha)";
            $consultaCliente = $this->pdo->prepare($sqlCliente);
            $consultaCliente->bindParam(":nome", $dados["nome"]);
            $consultaCliente->bindParam(":email", $dados["email"]);
            $consultaCliente->bindParam(":senha", $senha);

            return $consultaCliente->execute();
        } else {
            return 2; // já existe e-mail cadastrado
        }
    }
    public function logar($email)
    {
        $sql = "select * from cliente where email = :email limit 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":email", $email);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function salvarPedido($preference_id)
    {
        // Insere o pedido usando a nova coluna preference_id
        $sqlPedido = "
        INSERT INTO pedido (preference_id, cliente_id, data, status)
        VALUES (:preference_id, :cliente_id, NOW(), 'pendente')
    ";

        $consulta = $this->pdo->prepare($sqlPedido);
        $consulta->bindParam(":preference_id", $preference_id);
        $consulta->bindParam(":cliente_id", $_SESSION["cliente"]["id"]);

        if ($consulta->execute()) {

            $pedido_id = $this->pdo->lastInsertId();

            // salvar itens da compra
            foreach ($_SESSION["carrinho"] as $dados) {
                $sqlItem = "
                INSERT INTO item (pedido_id, produto_id, qtde, valor)
                VALUES (:pedido_id, :produto_id, :qtde, :valor)
            ";

                $consultaItem = $this->pdo->prepare($sqlItem);
                $consultaItem->bindParam(":pedido_id", $pedido_id);
                $consultaItem->bindParam(":produto_id", $dados["id"]);
                $consultaItem->bindParam(":qtde", $dados["qtde"]);
                $consultaItem->bindParam(":valor", $dados["valor"]);

                if (!$consultaItem->execute()) return 0;
            }

            // esvazia carrinho após salvar
            unset($_SESSION["carrinho"]);
            return 1;
        }

        return 0;
    }
}
