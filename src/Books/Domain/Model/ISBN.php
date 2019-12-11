<?php

declare(strict_types=1);

namespace Books\Domain\Model;

class ISBN
{
    private $isbn;

    public function __construct($isbn)
    {
        $this->setISBN($isbn);
    }

    public function isbn()
    {
        return $this->isbn;
    }

    public function __toString()
    {
        return $this->isbn;
    }

    private function setISBN($isbn)
    {
        $this->assertNotEmpty($isbn);

        $this->isbn = $isbn;
    }

    private function assertNotEmpty($isbn)
    {
        if (empty($isbn)) {
            throw new \InvalidArgumentException('ISBN cannot be empty');
        }
    }
}