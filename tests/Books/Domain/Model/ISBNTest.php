<?php

declare(strict_types=1);

use Books\Domain\Model\ISBN;

class ISBNTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function itThrowsAnErrorWhenItIsEmpty()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('ISBN is invalid');

        new ISBN('');
    }

    /** @test */
    public function itThrowsAnErrorWhenItIsTooShort()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('ISBN is invalid');

        new ISBN('0');
    }

    /** @test */
    public function itThrowsAnErrorWhenItIsTooLong()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('ISBN is invalid');

        new ISBN('00000000000000');
    }

    /** @test */
    public function itThrowsAnErrorWhenAnISBN10ContainsInvalidCharacters()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('ISBN-10 contains invalid characters');

        new ISBN('000000000A');
    }

    /** @test */
    public function itThrowsAnErrorAnISBN13ContainsInvalidCharacters()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('ISBN-13 contains invalid characters');

        new ISBN('000000000000A');
    }

    /** @test */
    public function itThrowsAnErrorWhenTheCheckDigitOfAnISBN10IsIncorrect()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('ISBN-10 has invalid check digit');

        new ISBN('0872203491');
    }

    /** @test */
    public function itThrowsAnErrorWhenTheCheckDigitOfAnISBN13IsIncorrect()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('ISBN-13 has invalid check digit');

        new ISBN('9780872203494');
    }

    /** @test */
    public function itCreatesAnISBNWhenPassingAValidISBN10()
    {
        new ISBN('0872203492');
        $this->assertTrue(true);
    }

    /** @test */
    public function itCreatesAnISBNWhenPassingAValidISBN13()
    {
        new ISBN('9780872203495');
        $this->assertTrue(true);
    }

    /** @test */
    public function itCreatesAnISBNWhenPassingAValidISBNWithHyphens()
    {
        new ISBN('0-872-20349-2');
        new ISBN('978-0-872-20349-5');
        $this->assertTrue(true);
    }

    /** @test */
    public function itCreatesAnISBNWhenPassingAValidISBNWithSpaces()
    {
        new ISBN('0 872 20349 2');
        new ISBN('978 0 872 20349 5');
        $this->assertTrue(true);
    }
}
