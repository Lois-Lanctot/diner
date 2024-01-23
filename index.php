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


//Define a lunch route
$f3->route('GET /lunch', function() {
//    echo "Breakfast";

//    Display a view page
    $view = new Template();
    echo $view->render('views/lunch-menu.html');
});



//Define an order route
$f3->route('GET|POST /order1', function($f3) {
//    echo "Order Form Part 1";

    //if the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate the data
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        // put the data in the session array
        $f3->set('SESSION.food', $food);
        $f3->set('SESSION.meal', $meal);

        // redirect to order2 route
        $f3->reroute('order2');
    }
//    Display a view page
    $view = new Template();
    echo $view->render('views/order-form1.html');
});


//Define a summary route
$f3->route('GET /summary', function() {
//    echo "Thanks for your order";

//    Display a view page
    $view = new Template();
    echo $view->render('views/order-summary.html');
});


//Define an order route
$f3->route('GET|POST /order2', function($f3) {
//    echo "Order Form Part 2";

    //if the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate the data
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        // put the data in the session array
        $f3->set('SESSION.food', $food);
        $f3->set('SESSION.meal', $meal);

        // redirect to summary route
        $f3->reroute('summary');
    }
//    Display a view page
    $view = new Template();
    echo $view->render('views/order-form2.html');
});


//Run Fat-Free
$f3->run();


