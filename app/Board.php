<?php
namespace App;

class Board
{
    private array $board = [
        [" ", " ", " ", " ", " "],
        [" ", " ", " ", " ", " "],
        [" ", " ", " ", " ", " "]
    ];

    private array $symbols = ["A", "B", "C", "D", "E"];

    public function fillBoard($difficulty): void
    {
        foreach ($this->board as &$line) {
            foreach ($line as &$slot) {
                $slot = $this->symbols[rand(0, $difficulty)];
            }
        }
    }

    public function getBoard(): array
    {
        return $this->board;
    }
}