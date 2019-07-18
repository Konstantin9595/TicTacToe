<?php

namespace App\strategies;
use App\TicTacToeAlgoritmInterface;

class Easy implements TicTacToeAlgoritmInterface
{
    public function makeStep(array $canvas):array
    {
        $newState = [];
        foreach($canvas as $key => $value) {
          if(!$value) {
            $newState[$key] = true;
            break;
          }
        }
        return array_intersect_key($newState, $canvas);
    }
}