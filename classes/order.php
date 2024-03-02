<?php

/**
 * The Order class represents a food order for the GRC Diner app
 * @author Lois Lanctot
 * @copyright 2024
 */

class Order
{
    private $_orderId;
    private $_food;
    private $_meal;
    private $_condiments;

    /**
     * Default constructor instantiates an Order object
     *
     * @param string $food
     * @param string $meal
     * @param string $condiments
     */
    public function __construct($food="", $meal="", $condiments="")
    {
        $this->_food = $food;
        $this->_meal = $meal;
        $this->_condiments = $condiments;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->_orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId)
    {
        $this->_orderId = $orderId;
    }


    /**
     * return the food that was ordered
     * @return string
     */
    public function getFood()
    {
        return $this->_food;
    }

    /**
     * set the food that was ordered
     * @param string $food
     */
    public function setFood($food)
    {
        $this->_food = $food;
    }

    /**
     * return the meal that was ordered
     * @return string
     */
    public function getMeal()
    {
        return $this->_meal;
    }

    /**
     * set the meal that was ordered
     * @param string $meal
     */
    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }

    /**
     * return the condiments that were ordered
     * @return string
     */
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /**
     * set the condiments that were ordered
     * @param string $condiments
     */
    public function setCondiments($condiments)
    {
        $this->_condiments = $condiments;
    }




}