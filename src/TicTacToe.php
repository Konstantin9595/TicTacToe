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