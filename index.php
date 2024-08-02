<?php 
// --------------------------------
// Routeur
// --------------------------------
require_once 'vendor/autoload.php';

if( !empty($_GET['page']) ) {

    if($_GET['page'] == 'planet'){
        require_once('controller/planetController.php');
    }else{ 
        require_once('view/404View.php');
    }

} else {
    require_once('view/homeView.php');
}

