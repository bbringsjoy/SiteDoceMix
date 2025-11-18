<?php 

class CarrinhoController{

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
        if(!isset($_SESSION["cliente"]["id"])){
            require '../View/carrinho/finalizar.php';
        } else {
            require '../View/carrinho/login.php';
        }
        
    }

    public function cadastrar(){
        require '../View/carrinho/cadastrar.php';
    }
}


?>