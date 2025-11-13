<?php 
    class DocesController{
        public function index($id, $img) {
            include 'View/doces/index.php';
        }

        public function detalhes($id, $img) {
            include 'View/doces/detalhes.php';
        }
    }
?>