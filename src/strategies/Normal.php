<?php

namespace App\strategies;
use App\TicTacToeAlgoritmInterface;

class Normal implements TicTacToeAlgoritmInterface
{
    public function makeStep(array $canvas):array
    {
        $copyCanvas = $canvas;

        $strategy = [
            "3,1" => null, "3,2" => null, "3,3" => null,
            "2,1" => null, "2,2" => null, "2,3" => null,
            "1,1" => null, "1,2" => null, "1,3" => null,
        ];

        // reverse strategy canvas format structure
        $mergeCanvas = array_merge($strategy, $canvas);

        foreach($mergeCanvas as $key => $value) {
          if($value === null) {
            $mergeCanvas[$key] = 0;
            break;
          } else {
               continue;
          }
        }

        //reverse default canvas format structure
        return array_merge($copyCanvas, $mergeCanvas);
    }
}