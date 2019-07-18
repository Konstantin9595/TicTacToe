<?php

namespace App;

interface TicTacToeAlgoritmInterface
{
    public function makeStep(array $canvas): array;
}