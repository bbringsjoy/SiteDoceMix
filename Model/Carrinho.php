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
        // verifica se o email já foi cadastrado
        $sqlVerifica = "SELECT id FROM cliente WHERE email = :email LIMIT 1";
        $consultaVerifica = $this->pdo->prepare($sqlVerifica);
        $consultaVerifica->bindParam(":email", $dados["email"]);
        $consultaVerifica->execute();

        $dadosVerifica = $consultaVerifica->fetch(PDO::FETCH_OBJ);

        if (empty($dadosVerifica->id)) {
            $senha = password_hash($dados["senha"], PASSWORD_BCRYPT);

            $sqlCliente = "
                INSERT INTO cliente (nome, email, senha)
                VALUES (:nome, :email, :senha)
            ";

            $consultaCliente = $this->pdo->prepare($sqlCliente);
            $consultaCliente->bindParam(":nome", $dados["nome"]);
            $consultaCliente->bindParam(":email", $dados["email"]);
            $consultaCliente->bindParam(":senha", $senha);

            return $consultaCliente->execute();
        }

        return 2; // já existe e-mail cadastrado
    }

    public function logar($email)
    {
        $sql = "SELECT * FROM cliente WHERE email = :email LIMIT 1";
        $consulta = $this->pdo->prepare($sql);
        $consulta->bindParam(":email", $email);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_OBJ);
    }

    public function salvarPedido($preference_id)
    {
        $sqlPedido = "
            INSERT INTO pedido (preference_id, cliente_id, data)
            VALUES (:preference_id, :cliente_id, NOW())
        ";

        $consulta = $this->pdo->prepare($sqlPedido);
        $consulta->bindParam(":preference_id", $preference_id);
        $consulta->bindParam(":cliente_id", $_SESSION["cliente"]["id"]);

        if ($consulta->execute()) {

            $pedido_id = $this->pdo->lastInsertId();

            // Salvar os itens
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

            unset($_SESSION["carrinho"]); // limpa carrinho
            return 1;
        }

        return 0;
    }
}
