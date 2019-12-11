<?php

declare(strict_types=1);

use Books\Domain\Model\ISBN;

class ISBNTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function itThrowsAnErrorWhenIsEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);

        new ISBN('');
    }
}
