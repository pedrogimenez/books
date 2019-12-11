<?php

declare(strict_types=1);

use Books\Domain\Model\ISBN;
use Books\Domain\Model\Book;

class BookTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function iThrowsAnErrorWhenTheTitleIsEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);

        $isbn = new ISBN('irrelevant');
        new Book($isbn, '', 'irrelevant');
    }

    /** @test */
    public function iThrowsAnErrorWhenTheDescriptionIsEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);

        $isbn = new ISBN('irrelevant');
        new Book($isbn, 'irrelevant', '');
    }
}
