<?php

namespace App\strategies;
use App\TicTacToeAlgoritmInterface;

class Normal implements TicTacToeAlgoritmInterface
{
    public function makeStep(array $canvas):array
    {
        $copyCanvas = array_reverse($canvas);
        foreach($copyCanvas as $key => $value) {
          if(!$value) {
            $copyCanvas[$key] = true;
            break;
          }
        }
        return array_reverse($copyCanvas);
    }
}