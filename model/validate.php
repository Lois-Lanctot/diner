<?php

/**
 * 328/diner/model/validate.php
 * validate data for the diner app
 */

//return true if food is valid
//trim removes leading or trailing white space
function validFood($food) {
    if (trim($food) == "") {
        return false;
    }
    if (!ctype_alpha($food)) {
        return false;
    }

    return true;
}


function validMeal($meal) {
    return in_array($meal, getMeals());
}