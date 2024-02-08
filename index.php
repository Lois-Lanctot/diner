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
require_once ('model/data-layer.php');
require_once ('model/validate.php');


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
    //  echo "Order Form Part 1";
    //Initialize variables
    $food = "";
    $meal = "";


    //if the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate the data
        if (validFood($_POST['food'])) {
            $food = $_POST['food'];
        }
        else {
            $f3->set('errors["food"]', "Invalid food");
        }

        if (isset($_POST['meal']) and validMeal($_POST['meal'])) {
            $meal = $_POST['meal'];
        }
        else {
            $f3->set('errors["meal"]', "Invalid meal");
        }

        // if there are no errors
        if (empty($f3->get('errors'))) {
            // put the data in the session array
            $f3->set('SESSION.food', $food);
            $f3->set('SESSION.meal', $meal);

            // redirect to order2 route
            $f3->reroute('order2');
        }

    }

    //add data to the F3 "hive"
    $f3->set('meals', getMeals());

    //  Display a view page
    $view = new Template();
    echo $view->render('views/order-form1.html');
});

//Define an order route
$f3->route('GET|POST /order2', function($f3) {
//    echo "Order Form Part 2";

    //if the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // validate the data
        $conds = $_POST['conds'];

        // put the data in the session array
        $f3->set('SESSION.conds', $conds);

        // redirect to summary route
        $f3->reroute('summary');
    }

    $f3->set('condiments', getCondiments());

//    Display a view page
    $view = new Template();
    echo $view->render('views/order-form2.html');
});

//Define a summary route
$f3->route('GET /summary', function() {
//    echo "Thanks for your order";

//    Display a view page
    $view = new Template();
    echo $view->render('views/order-summary.html');
});


//Run Fat-Free
$f3->run();


