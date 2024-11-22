<?php
session_start();
// cores
// require_once 'cores/Router.php';
// require_once 'cores/AbstractController.php';
// require_once 'cores/DataBase.php';

// spl_autoload_register permet de charger tous les fichiers présent dans le dossier cores 
spl_autoload_register(function ($class) {
    require_once 'cores/' . $class . '.php';
});

// config
require_once 'config/config.php';


// Helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/flash_helper.php';
require_once 'helpers/dump_helper.php';

// tester avec :
// glob('helpers/*.php');
// scandir('helpers');