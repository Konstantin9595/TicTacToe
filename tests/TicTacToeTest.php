<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\TicTacToe;
use App\strategies\Easy;
use App\strategies\Normal;

class TicTacToeTest extends TestCase
{
    public function testEasyGameFirstPlayerStep()
    {
        $TicTacToe = new TicTacToe();
        $TicTacToe->go(1,1);
        $TicTacToe->go();
        $this->assertFalse($TicTacToe->go(2, 2));
        $TicTacToe->go();

        $this->assertTrue($TicTacToe->go(3, 3));
    }

    // public function testEasyGameFirstComputerStep()
    // {
    //     $TicTacToe = new TicTacToe();
    //     $TicTacToe->go();
    //     $TicTacToe->go(2, 2);
    //     $this->assertFalse($TicTacToe->go());
    //     $TicTacToe->go(2,3);

    //     $this->assertTrue($TicTacToe->go());
    // }

    // public function testNormalGameFirstPlayerStep()
    // {
    //     $TicTacToe = new TicTacToe(new Normal());
    //     $TicTacToe->go(1, 1);
    //     $this->assertFalse($TicTacToe->go());
    //     $TicTacToe->go(1, 2);
    //     $TicTacToe->go();

    //     $this->assertTrue($TicTacToe->go(1,3));
    // }

    // public function testNormalGameFirstComputerStep()
    // {
    //     $TicTacToe = new TicTacToe(new Normal());
    //     $TicTacToe->go();
    //     $TicTacToe->go(3, 3);
    //     $TicTacToe->go();
    //     $TicTacToe->go(2, 2);
    //     $this->assertFalse($TicTacToe->go());
    //     $whinerPlayer = $TicTacToe->go(1, 1);

    //     $this->assertTrue($whinerPlayer);
    // }
}