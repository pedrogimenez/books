<?php

declare(strict_types=1);

namespace Books\Application;


class CreateBookRequest
{
    private $isbn;
    private $title;
    private $description;

    public function __construct($isbn, $title, $description)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->description = $description;
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
}