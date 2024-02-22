<?php
/*
 * Lois Lanctot
 * January 2024
 * https://lois.greenriverdev.com/328/diner/
 * This is my CONTROLLER for the Diner app
 */


//CREATE TABLE orders (
//    order_id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//    food VARCHAR(50),
//    meal VARCHAR(20),
//    condiments VARCHAR (50),
//    date_time DATETIME DEFAULT NOW()
//);
//INSERT INTO orders (food, meal, condiments) VALUES ('bagels', 'breakfast', 'cream cheese');
//INSERT INTO orders (food, meal, condiments) VALUES ('hot dog', 'lunch', 'relish, mustard, sauerkraut');
//INSERT INTO orders (food, meal, condiments) VALUES ('pad thai', 'dinner', NULL);


//Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Require the autoload file
require_once ('vendor/autoload.php');

//test my order class
//$order = new Order("pizza", "breakfast");
//var_dump($order);

//test my DataLayer class
//var_dump(DataLayer::getMeals());
//var_dump(DataLayer::getCondiments());


//test my Validate class
//echo Validate::validMeal('aloe gobi');


//Instantiate F3
$f3 = Base::instance();
$con = new Controller($f3);


//Define a default route
$f3->route('GET /', function() {
   $GLOBALS['con']->home();
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
    $GLOBALS['con']->order1();
});

//Define an order route
$f3->route('GET|POST /order2', function($f3) {
    $GLOBALS['con']->order2();

});

//Define a summary route
$f3->route('GET /summary', function() {
    $GLOBALS['con']->summary();
});

//Define a summary route
$f3->route('GET /view', function() {
    $GLOBALS['con']->view();
});


//Run Fat-Free
$f3->run();


