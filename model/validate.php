<?php

/**
 * 328/diner/model/validate.php
 * validate data for the diner app
 */

class Validate {

    //return true if food is valid
    //trim removes leading or trailing white space
    static function validFood($food) {
        return trim($food) != "";
    }


    static function validMeal($meal) {
        return in_array($meal, DataLayer::getMeals());
    }
}