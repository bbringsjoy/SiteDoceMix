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
        $sqlPedido = "insert into pedido values(NULL, :cliente_id, NOW(), :preference_id)";
        $consulta = $this->pdo->prepare($sqlPedido);
        $consulta->bindParam(":cliente_id", $_SESSION["cliente"]["id"]);
        $consulta->bindParam(":preference_id", $preference_id);

        if ($consulta->execute()) {
            $pedido_id = $this->pdo->lastInsertId();

            foreach ($_SESSION["carrinho"] as $dados) {
                $sqlItem = "insert into item values (:pedido_id, :produto_id, :qtde, :valor)";
                $consultaItem = $this->pdo->prepare($sqlItem);
                $consultaItem->bindParam(":pedido_id", $pedido_id);
                $consultaItem->bindParam(":produto_id", $dados["id"]);
                $consultaItem->bindParam(":qtde", $dados["qtde"]);
                $consultaItem->bindParam(":valor", $dados["valor"]);

                if (!$consultaItem->execute()) return 0;
            }


            return 1;
        } else {
            return 0;
        }
        //pra não dar um looping e salvar dnv, esvazia o carrinho
        unset($_SESSION["carrinho"]);
        return 1;
    }
}
