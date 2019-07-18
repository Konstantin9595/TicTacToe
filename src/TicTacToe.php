<?php

//require './vendor/autoload.php';
namespace App;

use App\strategies\Easy;
use GuzzleHttp\Client;
use App\TicTacToeAlgoritmInterface;

class TicTacToe
{

    private $canvas = [ 
        "1,1" => null, "1,2" => null, "1,3" => null,
        "2,1" => null, "2,2" => null, "2,3" => null,
        "3,1" => null, "3,2" => null, "3,3" => null
    ];

    private $algorithm;

    public function __construct(TicTacToeAlgoritmInterface $algorithm = null)
    {
        $this->algorithm = $algorithm ?? new Easy();
    }

    public function go(int $row = null, int $column = null)
    {
        $newCanvasState = ( $row && $column ? $this->makeStep($row, $column, $this->canvas) : $this->algorithm->makeStep( $this->canvas ) );

        $this->canvas = array_intersect_key($newCanvasState, $this->canvas);

    }

    public function makeStep(int $row, int $column, array $canvas)
    {
        $step = "{$row},{$column}";

        $newState = array_map(function($key, $item) use ($step) {
          return $key === $step ? true : null;
        }, array_keys($canvas), $canvas);

        return $newState;

    }

}
