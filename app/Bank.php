<?php
namespace App;

class Bank
{
    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function addBank(float $addValue): void
    {
        $this->value += $addValue;
    }

    public function substractBank(float $substractValue): void
    {
        $this->value -= $substractValue;
    }

    public function getBank(): float
    {
        return $this->value;
    }
}