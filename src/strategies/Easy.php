<?php

namespace App\strategies;
use App\TicTacToeAlgoritmInterface;

class Easy implements TicTacToeAlgoritmInterface
{
    public function makeStep(array $canvas):array
    {
        $copyCanvas = $canvas;
        foreach($copyCanvas as $key => $value) {
          if($value === null) {
            $copyCanvas[$key] = 0;
            break;
          } else {
              continue;
          }
        }

        return $copyCanvas;
    }
}