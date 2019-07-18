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
    private $winerVariations = [
        1 => ["1,1" => 1, "1,2" => 1, "1,3" => 1],
        2 => ["2,1" => 1, "2,2" => 1, "2,3" => 1],
        3 => ["3,1" => 1, "3,2" => 1, "3,3" => 1],
        4 => ["1,1" => 1, "2,1" => 1, "3,1" => 1],
        5 => ["1,2" => 1, "2,2" => 1, "3,2" => 1],
        6 => ["1,3" => 1, "2,3" => 1, "3,3" => 1],
        7 => ["1,1" => 1, "2,2" => 1, "3,3" => 1],
        8 => ["1,3" => 1, "2,2" => 1, "3,1" => 1],
        9 => ["1,1" => 0, "1,2" => 0, "1,3" => 0],
        10 => ["2,1" => 0, "2,2" => 0, "2,3" => 0],
        11 => ["3,1" => 0, "3,2" => 0, "3,3" => 0],
        12 => ["1,1" => 0, "2,1" => 0, "3,1" => 0],
        13 => ["1,2" => 0, "2,2" => 0, "3,2" => 0],
        14 => ["1,3" => 0, "2,3" => 0, "3,3" => 0],
        15 => ["1,1" => 0, "2,2" => 0, "3,3" => 0],
        16 => ["1,3" => 0, "2,2" => 0, "3,1" => 0]
      ];

    private $algorithm;

    public function __construct(TicTacToeAlgoritmInterface $algorithm = null)
    {
        $this->algorithm = $algorithm ?? new Easy();
    }

    public function go(int $row = null, int $column = null)
    {
        
        $newCanvasState = ( $row && $column ? $this->makeStep($row, $column, $this->canvas) : $this->algorithm->makeStep( $this->canvas ) );

        $this->canvas = $newCanvasState;
        
        return $this->isWinner($this->canvas, $this->winerVariations);
    }

    public function makeStep(int $row, int $column, array $canvas)
    {
        $step = "{$row},{$column}";
        $copyCanvas = $canvas;

        foreach($copyCanvas as $key => $value) {
            if($step === $key && $value === null) {
                $copyCanvas[$key] = 1;
                break;
            }
        }
        return $copyCanvas;

    }

    private function isWinner(array $canvas, array $winerVariations)
    {
        $result = false;
        foreach($winerVariations as $key => $value) {
          $diff = array_diff_assoc($value, $canvas );
      
          if(empty($diff)) {
            $result = true;
          }
        }
        return $result;
    }

    public function getStateCanvas()
    {
        return $this->canvas;
    }

}