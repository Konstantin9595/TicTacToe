<?php

namespace App\strategies;
use App\TicTacToeAlgoritmInterface;

class Easy implements TicTacToeAlgoritmInterface
{
    public function makeStep(array $canvas):array
    {
        $copyCanvas = $canvas;
        foreach($copyCanvas as $key => $value) {
          if(!$value) {
            $copyCanvas[$key] = true;
            break;
          }
        }
        return $copyCanvas;
    }
}