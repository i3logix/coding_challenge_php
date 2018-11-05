<?php

namespace GameOfLife;

class GameOfLifeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function itCanSimulateAStaticBlock()
    {
        $block            = <<< EOBLOCK
1 1 0
1 1 0
0 0 0
EOBLOCK;
        $largeBlockWindow = <<<EOLARGEBLOCK
0 0 0 0
0 1 1 0
0 1 1 0
0 0 0 0
EOLARGEBLOCK;

        $game = new GameOfLife($block);
        $this->assertEquals($largeBlockWindow, $game->displayWindow([-1, -1], [2, 2]));
        $game->next();
        $this->assertEquals($largeBlockWindow, $game->displayWindow([-1, -1], [2, 2]));
    }

    /**
     * @test
     */
    public function itCanSimulateASpinner()
    {
        $spinner1 = <<<EOVSPINNER
0 1 0
0 1 0
0 1 0
EOVSPINNER;
        $spinner2 = <<<EOHSPINNER
0 0 0
1 1 1
0 0 0
EOHSPINNER;

        $game = new GameOfLife($spinner1);

        // Unchanged
        $this->assertEquals(
            $spinner1,
            $game->displayWindow([0, 0], [2, 2])
        );

        $game->next();

        // Generation 2
        $this->assertEquals(
            $spinner2,
            $game->displayWindow([0, 0], [2, 2])
        );

        $game->next();

        // Generation 3 (same as Generation 1)
        $this->assertEquals(
            $spinner1,
            $game->displayWindow([0, 0], [2, 2])
        );
    }

    /**
     * @test
     */
    public function itCanShowWindowsOfDifferentSizes()
    {
        $board = <<<EOBOARD
0 1 0 0 0
1 0 0 1 1
1 1 0 0 1
0 1 0 0 0
1 0 0 0 1
EOBOARD;
        $game  = new GameOfLife($board);

        $topLeftWindow = <<<EOTOPLEFT
0 1 0
1 0 0
1 1 0
EOTOPLEFT;

        $this->assertEquals($topLeftWindow, $game->displayWindow([0, 0], [2, 2]));

        $middleWindow = <<<EOMIDDLE
0 0 1
1 0 0
1 0 0
EOMIDDLE;

        $this->assertEquals($middleWindow, $game->displayWindow([1, 1], [3, 3]));

        $bottomWindow = <<<EOBOTTOM
1 1 0 0 1 0
0 1 0 0 0 0
1 0 0 0 1 0
0 0 0 0 0 0
EOBOTTOM;

        $this->assertEquals($bottomWindow, $game->displayWindow([0, 2], [5, 5]));
    }

    public function itCanSimulateTheReadmeExample()
    {
        $example       =<<<EOEXAMPLEBOARD
0 1 0 0 0
1 0 0 1 1
1 1 0 0 1
0 1 0 0 0
1 0 0 0 1
EOEXAMPLEBOARD;
        $exampleResult =<<<EOEXAMPLERESULT
0 0 0 0 0
1 0 1 1 1
1 1 1 1 1
0 1 0 0 0
0 0 0 0 0
EOEXAMPLERESULT;

        $game = new GameOfLife($example);
        $this->assertEquals($example, $game->displayWindow([0, 0], [4, 4]));

        $game->next();
        $this->assertEquals($exampleResult, $game->displayWindow([0, 0], [4, 4]));
    }

    // TODO: More tests go here
}
