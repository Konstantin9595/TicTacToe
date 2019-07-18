<?php

namespace App;

interface TicTacToeAlgoritmInterface
{
    public function makeStep(int $row = null, int $column = null, array $canvas): array;
}