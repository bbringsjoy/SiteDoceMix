<?php 
    class DoceController{
        public function index($id, $img) {
            include 'View/doce/index.php';
        }

        public function detalhes($id, $img) {
            include 'View/doce/detalhes.php';
        }

    }
?>