<?php

namespace CheckWriter;

use PHPUnit\Framework\TestCase;

class CheckWriterTest extends TestCase
{
    /**
     * @test
     */
    public function itCanWriteAMortgageCheck() {
        $checkWriter = new CheckWriter(2523.04);
        $this->assertEquals(
            'Two thousand five hundred twenty-three and 04/100 dollars',
            $checkWriter->getDescription()
        );
    }

    /**
     * @test
     */
    public function itCanWriteChecksForRoyalties()
    {
        $checkWriter = new CheckWriter('0.32');
        $this->assertEquals(
            'Zero and 32/100 dollars',
            $checkWriter->getDescription()
        );
    }

    /**
     * @test
     */
    public function itCanWriteChecksForEvenDollarAmounts()
    {
        $checkWriter = new CheckWriter(6);
        $this->assertEquals(
            'Six and no/100 dollars',
            $checkWriter->getDescription()
        );
    }

    // TODO: More tests go here
}
