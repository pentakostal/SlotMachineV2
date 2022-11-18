<?php
namespace App;

class Combination
{
    private int $conditionCounterCount = 0;
    private array $combinationsPlayer = [];
    private array $combinations = [
    [
    [0, 0], [0, 1], [0, 2], [0, 3], [0, 4]
    ],
    [
    [1, 0], [1, 1], [1, 2], [1, 3], [1, 4]
    ],
    [
    [2, 0], [2, 1], [2, 2], [2, 3], [2, 4]
    ],
    [
    [2, 0], [2, 1], [1, 2], [0, 3], [0, 4]
    ],
    [
    [0, 0], [0, 1], [1, 2], [2, 3], [2, 4]
    ],
    [
    [0, 0], [1, 1], [0, 2], [1, 3], [0, 4]
    ],
    [
    [2, 0], [1, 1], [2, 2], [1, 3], [2, 4]
    ]
    ];

    public function countCombination($realBoard): void
    {
        foreach ($this->combinationsPlayer as $combination) {
            $conditionCounterA = 0;
            $conditionCounterB = 0;
            $conditionCounterC = 0;
            $conditionCounterD = 0;
            $conditionCounterE = 0;
            foreach ($combination as $position) {
                [$x, $y] = $position;
                switch ($realBoard[$x][$y]) {
                    case "A":
                        $conditionCounterA++;
                        break;
                    case "B":
                        $conditionCounterB++;
                        break;
                    case "C":
                        $conditionCounterC++;
                        break;
                    case "D":
                        $conditionCounterD++;
                        break;
                    case "E":
                        $conditionCounterE++;
                        break;
                }
            }

            if ($conditionCounterA == 5) {
                $this->conditionCounterCount++;
            } elseif ($conditionCounterB == 5) {
                $this->conditionCounterCount++;
            } elseif ($conditionCounterC == 5) {
                $this->conditionCounterCount++;
            } elseif ($conditionCounterD == 5) {
                $this->conditionCounterCount++;
            } elseif ($conditionCounterE == 5) {
                $this->conditionCounterCount++;
            }
        }
    }

    public function setCombinationCollection(array $combinationChoice): void
    {
        $combinationChoiceInt = [];
        foreach ($combinationChoice as &$item) {
            $combinationChoiceInt[] = intval($item) - 1;
        }

        for ($i=0; $i < count($combinationChoiceInt); $i++) {
            $this->combinationsPlayer[] = $this->combinations[$combinationChoiceInt[$i]];
        }
    }

    public function getconditionCounterCount(): int
    {
        return $this->conditionCounterCount;
    }
}