<?php

//require './vendor/autoload.php';
namespace App;

use App\strategies\Easy;
use GuzzleHttp\Client;
use App\TicTacToeAlgoritmInterface;

class TicTacToe
{

    private $canvas = [ 
        1 => null, 2 => null, 3 => null,
        4 => null, 5 => null, 6 => null,
        7 => null, 8 => null, 9 => null
    ];

    private $algorithm;

    public function __construct(TicTacToeAlgoritmInterface $algorithm = null)
    {
        $this->algorithm = $algorithm ?? new Easy();
    }

    public function go(int $row = null, int $column = null)
    {
        $newCanvasState = ( $row && $column ? $this->makeStep($row, $column) : $this->algorithm->makeStep() );

        $this->canvas = array_intersect_key($newCanvasState, $this->canvas);
    }

}