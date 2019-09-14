<?php

namespace GameOfLife;

class GameOfLife
{
    private $currentBoard;

    public function __construct(string $board)
    {
        $board =  mb_convert_encoding($board, 'UTF-8');
        $this->currentBoard['data'] = $this->convertBoardToArray($board);
        $this->setBoardDimensions();
    }

    /**
     * Get current board
     *
     * @param boolean $format Should the data be formatted back to a string?
     * [optional]
     *
     * @return array Array of the given or mutated board
     */
    public function getBoard($format = false)
    {
        if ($format) {
            return $this->convertArrayToBoard($this->currentBoard['data']);
        }
        return $this->currentBoard['data'];
    }

    /**
     * Kicks off mutation to the next generation of the board
     *
     * @return void
     */
    public function next()
    {
        $this->mutateBoard();
    }

    /**
     * Increase or decreases the size of the board
     *
     * @param array $topLeft New diminisions of the top left corner
     * @param array $bottomRight New dimensions of the bottom right corner
     *
     * @return string Newly generated board from instantiated board
     */
    public function displayWindow(array $topLeft, array $bottomRight)
    {
        list($xLeft, $yTop) = $topLeft;
        list($xRight, $yBottom) = $bottomRight;
        list($xSize, $ySize) = $this->getBoardDimensions();
        $xIndex = $xSize - 1;
        $yIndex = $ySize - 1;

        $transformedData = $this->currentBoard['data'];

        // Top and Left
        if (isset($transformedData[$xLeft][$yTop])) {
            // contraction
            if ($topLeft != array(0,0)) {
                // Remove dangeling top
                foreach (range(0, ($yTop-1)) as $i) {
                    array_shift($transformedData);
                }
                // Remove dangeling left
                if ($topLeft != 0) {
                    foreach (array_keys($transformedData) as $i) {
                        for ($j = 0; $j < $xLeft; $j++) {
                            array_shift($transformedData[$i]);
                        }
                    }
                }
            }
        } else {
            // expansion
            // Add top
            array_unshift($transformedData, array_fill(0, abs($yIndex - $yTop), 0));

            // Add left
            foreach (array_keys($transformedData) as $i) {
                for ($j = 0; $j < abs($xLeft); $j++) {
                    array_unshift($transformedData[$i], 0);
                }
            }
        }

        // Bottom and Right
        if (isset($transformedData[$xRight][$yBottom])) {
            // possible contraction
            if ($bottomRight != array($xIndex,$yIndex)) {
                // Remove dangeling bottom
                foreach (range($yIndex, ($yBottom+1)) as $i) {
                    array_pop($transformedData);
                }
                // Remove dangeling right
                if ($xRight != $xIndex) {
                    foreach (array_keys($transformedData) as $i) {
                        for ($j = $xRight; $j < $xIndex; $j++) {
                            array_pop($transformedData[$i]);
                        }
                    }
                }
            }
        // expansion
        } else {
            // Add bottom
            array_push($transformedData, array_fill(0, $yBottom, 0));

            // Add right
            foreach (array_keys($transformedData) as $i) {
                array_push($transformedData[$i], 0);
            }
        }
        return $this->convertArrayToBoard($transformedData);
    }

    /**
     * Uses the rules of Conway's Game of Life to mutate the board
     * See [Conway's game of life](https://en.wikipedia.org/wiki/Conway%27s_Game_of_Life)
     *
     * @return void
    */
    private function mutateBoard()
    {
        $currentBoardData = $this->currentBoard['data'];
        $intermediateBoard = array();
        list($xSize, $ySize) = $this->getBoardDimensions();

        /* Rules
            Any live cell with fewer than two live neighbors dies (underpopulation)
            Any live cell with two or three live neighbors lives on to the next generation (survival)
            Any live cell with more than three live neighbors dies (overcrowding)
            Any dead cell with exactly three live neighbors becomes a live cell (reproduction)
        */
        for ($i = 0; $i < $xSize; $i++) {
            for ($j = 0; $j < $ySize; $j++) {
                $neighborsAlive = $this->getLivingNeighborCount($i, $j);
                $isAlive = (bool)$currentBoardData[$i][$j];

                switch ($neighborsAlive) {
                    case 2:
                        if ($isAlive) {
                            $mortality = 1;
                        } else {
                            $mortality = 0;
                        }
                        break;
                    case 3:
                        $mortality = 1;
                        break;
                    default:
                        $mortality = 0;
                        break;
                }
                $intermediateBoard[$i][$j] = $mortality;
            }
        }

        $this->currentBoard['data'] = $intermediateBoard;

        // reset current to new
        $this->setBoardDimensions();
    }

    /**
     * Converts the board into an Array from new lines and spaces.
     *
     * @param string $board The given board
     *
     * @return array The board converted into a (multi-)dimensional array.
     */
    private function convertBoardToArray(string $board)
    {
        $boardArray = array();
        $boardLines = explode("\n", $board);
        foreach ($boardLines as $boardLine) {
            $boardArray[] = explode(' ', $boardLine);
        }
        return $boardArray;
    }

    /**
     * Converts a (mutli-)dimensional array into a string seperated by spaces and new lines.
     *
     * @param string $board The given board
     *
     * @return string The board converted into a string
     */
    private function convertArrayToBoard(array $boardArray)
    {
        $boardStringArray = array();
        foreach ($boardArray as $boardLineArray) {

            $boardStringArray[] =  implode(' ', $boardLineArray);
        }
        return implode("\n", $boardStringArray);
    }

    /**
     * Set current board dimensions
     *
     * @return void
     */
    private function setBoardDimensions()
    {
        $this->currentBoard['dimensions'] = array(
            sizeof($this->currentBoard['data']),
            sizeof($this->currentBoard['data'][0])
        );
    }

    /**
     * Get current board dimensions
     *
     * @return array Array with `x` being horizontal size and `y` being vertical
     * size
     */
    private function getBoardDimensions()
    {
        return $this->currentBoard['dimensions'];
    }

    /**
     * Get the number of living neighbors surrounding a given point
     *
     * @param int $xPosition Horizontal position of the given point
     * @param int $yPosition Vertical position of the given point
     *
     * @return int An integer that represents the number of living neighbors
     */
    private function getLivingNeighborCount(int $xPosition, int $yPosition)
    {

        $liveNeighborCount = 0;
        // Use current board data because we do not want to include others
        $intermediateData = $this->currentBoard['data'];

        foreach (range(($xPosition - 1), ($xPosition + 1)) as $i) {
            // Values outside the range
            if (!isset($intermediateData[$i])) {
                continue;
            }
            foreach (range(($yPosition - 1), ($yPosition + 1)) as $j) {
                // didn't use `empty()` in this place, though it would do.
                if (!isset($intermediateData[$i][$j]) || (int)$intermediateData[$i][$j] === 0) {
                    continue;
                }

                // given position will be skipped
                if ((int)$i === $xPosition && (int)$j === $yPosition) {
                    continue;
                }
                $liveNeighborCount++;
            }
        }

        return $liveNeighborCount;
    }
}
