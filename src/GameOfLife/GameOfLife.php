<?php

namespace GameOfLife;

class GameOfLife
{
    public function __construct($board)
    {
    }

    public function next()
    {
        // TODO: Code to advance to next generation
    }

    public function displayWindow(array $topLeft, array $bottomRight)
    {
        // TODO: Code to display a window of the cells in the game
        return <<<EOBLOCK
0 0 0 0
0 1 1 0
0 1 1 0
0 0 0 0
EOBLOCK;

    }
}
