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
        $this->expectExceptionMessage('Title cannot be empty');

        $isbn = new ISBN('9780872203495');
        new Book($isbn, '', 'irrelevant');
    }

    /** @test */
    public function iThrowsAnErrorWhenTheDescriptionIsEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Description cannot be empty');

        $isbn = new ISBN('9780872203495');
        new Book($isbn, 'irrelevant', '');
    }
}
