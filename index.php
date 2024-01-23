<?php
/*
 * Lois Lanctot
 * January 2024
 * https://lois.greenriverdev.com/328/diner/
 * This is my CONTROLLER for the Diner app
 */

//Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Require the autoload file
require_once ('vendor/autoload.php');

//Instantiate F3
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
//    echo "My Diner";

    //Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a breakfast route
$f3->route('GET /breakfast', function() {
//    echo "Breakfast";

//    Display a view page
    $view = new Template();
    echo $view->render('views/breakfast-menu.html');
});

//Run Fat-Free
$f3->run();


