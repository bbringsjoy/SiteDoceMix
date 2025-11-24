<?php

class FooterController {

    public function politica($id = null, $img = null) {
        require "../View/footer/politica.php";
    }

    public function politicacookies($id = null, $img = null) {
        require "../View/footer/politicacookies.php";
    }

    public function sobre($id = null, $img = null) {
        require "../View/footer/sobre.php";
    }

    public function termos($id = null, $img = null) {
        require "../View/footer/termos.php";
    }

}
