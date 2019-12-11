<?php

declare(strict_types=1);

namespace Books\Domain\Model;

class Book
{
    private $isbn;
    private $title;
    private $description;

    public function __construct(ISBN $isbn, $title, $description)
    {
        $this->isbn = $isbn;
        $this->setTitle($title);
        $this->setDescription($description);
    }

    public function isbn()
    {
        return $this->isbn;
    }

    public function title()
    {
        return $this->title;
    }

    public function description()
    {
        return $this->description;
    }

    private function setTitle($title)
    {
        $this->assertValidTitle($title);

        $this->title = $title;
    }

    private function setDescription($description)
    {
        $this->assertValidDescription($description);

        $this->description = $description;
    }

    private function assertValidTitle($title)
    {
        if (empty($title)) {
            throw new \InvalidArgumentException('Title cannot be empty');
        }
    }

    private function assertValidDescription($description)
    {
        if (empty($description)) {
            throw new \InvalidArgumentException('Description cannot be empty');
        }
    }
}