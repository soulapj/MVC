<?php 

class Pages {

    public function __construct() {
        echo 'Le contrôleur Pages est chargé';
    }
    
    public function index() {
        echo 'La page index est affichée';
    }

    public function about() {
        echo 'La page about est affichée';
    }
}