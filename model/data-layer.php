<?php

/**
 * Thie file represents the data layer for my diner app
 * 328/diner/model/data-layer.php
 */

class DataLayer {
    static function getMeals() {
        return array('breakfast', 'brunch', 'lunch', 'diner');
    }


    static function getCondiments() {
        return array('ketchup', 'mustard', 'mayo', 'sriracha');
    }
}
