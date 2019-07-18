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
        1 => [
          "1,1" => 1, "1,2" => 1, "1,3" => 1,
          "2,1" => null, "2,2" => null, "2,3" => null,
          "3,1" => null, "3,2" => null, "3,3" => null
        ],
        2 => [
          "1,1" => null, "1,2" => null, "1,3" => null,
          "2,1" => 1, "2,2" => 1, "2,3" => 1,
          "3,1" => null, "3,2" => null, "3,3" => null
        ],
        3 => [
          "1,1" => null, "1,2" => null, "1,3" => null,
          "2,1" => null, "2,2" => null, "2,3" => null,
          "3,1" => 1, "3,2" => 1, "3,3" => 1
        ],
        4 => [
          "1,1" => 1, "1,2" => null, "1,3" => null,
          "2,1" => 1, "2,2" => null, "2,3" => null,
          "3,1" => 1, "3,2" => null, "3,3" => null
        ],
        5 => [
          "1,1" => null, "1,2" => 1, "1,3" => null,
          "2,1" => null, "2,2" => 1, "2,3" => null,
          "3,1" => null, "3,2" => 1, "3,3" => null
        ],
        6 => [
          "1,1" => null, "1,2" => null, "1,3" => 1,
          "2,1" => null, "2,2" => null, "2,3" => 1,
          "3,1" => null, "3,2" => null, "3,3" => 1
        ],
        7 => [
          "1,1" => 1, "1,2" => null, "1,3" => null,
          "2,1" => null, "2,2" => 1, "2,3" => null,
          "3,1" => null, "3,2" => null, "3,3" => 1
        ],
        8 => [
          "1,1" => null, "1,2" => null, "1,3" => 1,
          "2,1" => null, "2,2" => 1, "2,3" => null,
          "3,1" => 1, "3,2" => null, "3,3" => null
        ]
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

        $newState = array_map(function($key, $item) use ($step) {
          return $key === $step ? true : null;
        }, array_keys($canvas), $canvas);

        return array_intersect_key($newState, $canvas);

    }

    private function isWinner(array $canvas, array $winerVariations)
    {
        $result = false;

        foreach($winerVariations as $key => $value) {
          $itersect = array_diff_assoc($value, $canvas);
      
          if(empty($itersect)) {
            $result = true;
            break;
          }
        }
      
        return $result;
    }

    public function getStateCanvas()
    {
        return $this->canvas;
    }

}


    // TicTacToe в конструкторе принимает в себя интерфейс алгоритмов TicTacToeAlgoritmInterface
    // Если не пришел не один, то в настройки записывает стандартный Easy:
        // $this->algorithm = $algorithm ?? new Easy;

    // Далее если ход компьютера то происходит работа с этим алгоритмом.
        // Что делает алгоритм:
            // Принимает в себя карту. Начинает проходить по ней
            // находит свободное поле и ставит туда свое значение(X/0)
            // Возвращает новую карту с проставленными значениями, далее array_merge и новое состояние.

    // Если ход человека, то карта заполняется нужными значениями, которые будут переданы пользователем.
    
    // У TicTacToe будет метод go - который имеет два необъязательныйх параметра. (int) $row = null  and  (int) $column null
    // если они null значит вызываем алгоритм иначе вызываем madeStep(); 