<?php


abstract class Fruit
{
    protected float $price = 3.99;

    public abstract function getColor();
    public function price()
    {
        echo $this->price;
    }
}

class Banana extends Fruit
{
    public function getColor()
    {
        return "yellow";
    }
}

class Apple extends Fruit
{
    public function getColor()
    {
        return "red";
    }
}
