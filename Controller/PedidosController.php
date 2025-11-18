<?php
require "../config/Conexao.php";
require "../models/Pedidos.php";

class Pedidos {
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