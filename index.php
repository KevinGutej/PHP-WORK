<?php

class Bottle
{
    private float $capacity;
    private float $liquid;

    public function __construct(float $cap, float $liq)
    {
        $this->capacity = $cap;
        $this->liquid = $liq;
    }
    public function addSomeLiquid(float $ammount, bool $overAdding = true): void
    {
        if($this->capacity > $this->liquid + $ammount) {
            $this->liquid += $ammount;
        } else if($overAdding) {
            $emptySpace = $this->capacity - $this->liquid;
            $this->liquid += $emptySpace;
        }
    }
    public function emptying(float $ammount):void
    {
        if($this->liquid > $ammount) {
            $this->liquid -= $ammount;
        } else {
            $this->liquid = 0;
        }
    }
    public function pouring(object $bottle, float $ammount) :void
    {
        $liquid = $bottle->getLiquid();

        if($liquid < $ammount)
        {
            $bottle->emptying($liquid);
            $this->addSomeLiquid($liquid);
            echo "\nNie udało się przelać pożadanej ilości płynu, ponieważ nie było tyle w butelce. Przelano tylko $liquid l\n";

        } else {
            $bottle->emptying($ammount);
            $this->addSomeLiquid($ammount);
            
        } 
    }

    public function getCapacity() :float
    {
        return $this->capacity;
    }
    public function getLiquid() :float
    {
        return $this->liquid;
    }
    public function getLiquidLabel(string $prefix = 'default') {
        return $prefix . ' ' . $this->getLiquid();
    }
}


$bottle1 = new Bottle(2, 1);
$bottle2 = new Bottle(5, 2);
echo $bottle1->getLiquidLabel();
echo "Capcity: " . $bottle1->getCapacity() . " l\nLiquid: " . $bottle1->getLiquid() . " l\n";
echo "------------\n";
echo "Capcity " . $bottle2->getCapacity() . " l\nLiquid: " . $bottle2->getLiquid() . " l\n";
echo "------------\n-----------------\n";
$bottle2-> pouring($bottle1, 2);
echo "Capcity " . $bottle1->getCapacity() . " l\nLiquid: " . $bottle1->getLiquid() . " l\n";
echo "------------\n";
echo "Capcity " . $bottle2->getCapacity() . " l\nLiquid: " . $bottle2->getLiquid() . " l\n";
