<?php

namespace App;

class Bet
{
    private int $value;

    public function __construct(int $value)
    {

        $this->value = $value;
    }

    public function countBet(array $combinationChoice, int $count, int $difficulty): int
    {

        $combinationMultiply = 0;
        switch (count($combinationChoice)) {
            case 1:
                $combinationMultiply = 3;
                break;
            case 2:
            case 3:
            case 4:
                $combinationMultiply = 1.4;
                break;
            case 6:
            case 5:
                $combinationMultiply = 1.2;
                break;
            case 7:
                $combinationMultiply = 1.05;
                break;
        }
        //Wining bet counting
        if ($count > 0) {
            return ($this->value * $difficulty * $combinationMultiply);
        } else {
            return $this->value;
        }
    }
}