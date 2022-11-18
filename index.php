<?php
namespace App;
require_once 'vendor/autoload.php';

//set bank
$bank = new Bank(readline("Enter deposite: -> "));
//Game mechanic
while ($bank->getBank() > 0) {
    //choose combinations
    echo "Choose combination from 1 to 7 ore multiple combinations with join number\n"; // 123 ore 3
    echo "***** |       |       |    ** | **    | * * * |       |\n";
    echo "      | ***** |       |   *   |   *   |  * *  |  * *  |\n";
    echo "      |       | ***** | **    |    ** |       | * * * |\n";
    $combinationChoice = str_split(readline("-> "));

    //fill board
    $board = new Board();
    $difficulty = (int) readline("Enter difficulty: -> ");
    $board->fillBoard($difficulty);
    $bet = new Bet((int) readline("Enter your bet: -> "));
    //echo board
    $realBoard = $board->getBoard();
    echo "{$realBoard[0][0]} | {$realBoard[0][1]} | {$realBoard[0][2]} | {$realBoard[0][3]} | {$realBoard[0][4]} \n";
    echo "--+---+---+---+---\n";
    echo "{$realBoard[1][0]} | {$realBoard[1][1]} | {$realBoard[1][2]} | {$realBoard[1][3]} | {$realBoard[1][4]} \n";
    echo "--+---+---+---+---\n";
    echo "{$realBoard[2][0]} | {$realBoard[2][1]} | {$realBoard[2][2]} | {$realBoard[2][3]} | {$realBoard[2][4]} \n";

    $combinations = new Combination();
    $combinations->setCombinationCollection($combinationChoice);
    $combinations->countCombination($realBoard);

    if ($combinations->getconditionCounterCount() > 0) {
        $bank->addBank($bet->countBet($combinationChoice, $combinations->getconditionCounterCount(), $difficulty));
        echo "WIN" . PHP_EOL;
    } else {
        $bank->substractBank($bet->countBet($combinationChoice, $combinations->getconditionCounterCount(), $difficulty));
        echo "LOST" . PHP_EOL;

    }

    echo "Credits: " . $bank->getBank() . PHP_EOL;
    readline("Next round");
}

echo "You are out of credits" . PHP_EOL;
