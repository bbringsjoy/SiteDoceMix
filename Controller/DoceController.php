<?php 
    class DoceController{
        public function index($id, $img) {
            require 'View/doce/index.php';
        }

        public function detalhes($id, $img) {
            require 'View/doce/detalhes.php';
        }

    }
?>