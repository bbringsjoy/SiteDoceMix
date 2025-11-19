<?php
require "../Config/Conexao.php";
require "../Model/Pedidos.php";

class PedidosController {
    private $pedidos;

    public function __construct()
    {
        $db = new Conexao();
        $pdo = $db->conectar();
        $this->pedidos = new Pedidos($pdo);
    }

   public function index(){
    require '../View/pedidos/index.php';
   }
}

?>