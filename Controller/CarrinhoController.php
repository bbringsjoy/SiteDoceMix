<?php 

require "../Config/Conexao.php";
require "../Model/Carrinho.php";

class CarrinhoController{

    private $carrinho;

    public function __construct(){
        $db = new Conexao();
        $pdo = $db->conectar();
        $this->carrinho = new Carrinho($pdo);
    }

    public function index($id,$img) {
            require '../View/carrinho/index.php';
        }
   public function adicionar($id,$img) {
            require '../View/carrinho/adicionar.php';
        }

    public function excluir($id,$img){
        unset($_SESSION["carrinho"][$id]);
        require '../View/carrinho/index.php';
    }

    public function limpar(){
        unset($_SESSION["carrinho"]);
        require '../View/carrinho/index.php';
    }

    public function finalizar(){
    // Se o cliente não estiver logado
    if(!isset($_SESSION["cliente"]["id"])){
        require '../View/carrinho/login.php';   // manda para login
    } else {
        require '../View/carrinho/finalizar.php'; // manda para finalizar compra
    }
}


    public function cadastrar(){
        require '../View/carrinho/cadastrar.php';
    }

    public function logar(){
        require '../View/carrinho/logar.php';
    }

    public function sair($id,$img)
    {
        unset($_SESSION["cliente"]);
        require "../View/carrinho/index.php";
    }
    public function login($id, $img)
{
    require "../View/carrinho/login.php";
}
}


?>