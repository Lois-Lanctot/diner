<?php

/**
 * The Controller class for my Diner app
 */

class Controller
{
    private $_f3; //Fat-free router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        //    echo "My Diner";

        //Display a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }


    function order1()
    {
        //  echo "Order Form Part 1";
        //Initialize variables
        $food = "";
        $meal = "";

        //if the form has been posted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // validate the data
            if (Validate::validFood($_POST['food'])) {
                $food = $_POST['food'];
            }
            else {
                $this->_f3->set('errors["food"]', "Invalid food");
            }

            if (isset($_POST['meal']) and Validate::validMeal($_POST['meal'])) {
                $meal = $_POST['meal'];
            }
            else {
                $this->_f3->set('errors["meal"]', "Invalid meal");
            }

            // if there are no errors
            if (empty($this->_f3->get('errors'))) {
                //instantiate an Order object
                $order = new Order($food, $meal);

                // put the data in the session array
                $this->_f3->set('SESSION.order', $order);

//            var_dump($f3->get('SESSION.order'));
                // redirect to order2 route
                $this->_f3->reroute('order2');
            }

        }

        //add data to the F3 "hive"
        $this->_f3->set('meals', DataLayer::getMeals());

        //  Display a view page
        $view = new Template();
        echo $view->render('views/order-form1.html');
    }


    function order2()
    {
//    echo "Order Form Part 2";

        //if the form has been posted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // validate the data
            $conds = "";

            if(isset($_POST['conds'])) {
                $conds = implode(", ", $_POST['conds']);
            }
            else {
                $conds = "None selected";
            }

            // put the data in the session array

            $this->_f3->get('SESSION.order')->setCondiments($conds);
//        var_dump($f3->get('SESSION.order'));


            // redirect to summary route
            $this->_f3->reroute('summary');
        }

        $this->_f3->set('condiments', DataLayer::getCondiments());

//    Display a view page
        $view = new Template();
        echo $view->render('views/order-form2.html');
    }


    function summary()
    {
//    echo "Thanks for your order";

//    Display a view page
        $view = new Template();
        echo $view->render('views/order-summary.html');
    }

    function view()
    {
//    echo "Thanks for your order";

//    Display a view page
        $view = new Template();
        echo $view->render('views/view-orders.html');
    }

}