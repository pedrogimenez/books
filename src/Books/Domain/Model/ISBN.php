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
        $isbn = strtoupper($isbn);
        $isbn = str_replace('-', '', $isbn);
        $isbn = str_replace(' ', '', $isbn);

        $this->assertValid($isbn);

        $this->isbn = $isbn;
    }

    private function assertValid($isbn)
    {
        switch (strlen($isbn)) {
            case 10:
                $this->assertValidISBN10($isbn);
                break;
            case 13:
                $this->assertValidISBN13($isbn);
                break;
            default:
                throw new \InvalidArgumentException('ISBN is invalid');
        }
    }

    private function assertValidISBN10($isbn)
    {
        if (preg_match('/^\d{9}[0-9X]$/i', $isbn) == 0) {
            throw new \InvalidArgumentException('ISBN-10 contains invalid characters');
        }

        if ($isbn[9] != $this->getISBN10CheckDigit($isbn)) {
            throw new \InvalidArgumentException('ISBN-10 has invalid check digit');
        }
    }

    private function assertValidISBN13($isbn)
    {
        if (preg_match('/^\d{13}$/i', $isbn) == 0) {
            throw new \InvalidArgumentException('ISBN-13 contains invalid characters');
        }

        if ($isbn[12] != $this->getISBN13CheckDigit($isbn)) {
            throw new \InvalidArgumentException('ISBN-13 has invalid check digit');
        }
    }

    private function getISBN10CheckDigit($isbn) {
        $sum = 0;

        for ($a = 10, $b = 0; $a > 1; $a--, $b++) {
            $sum += $a * intval($isbn[$b]);
        }

        $reminder = $sum % 11;
        $checkDigit = 11 - $reminder;

        if ($checkDigit == 10) {
            $checkDigit = 'X';
        }

        return $checkDigit;
    }

    private function getISBN13CheckDigit($isbn)
    {
        $sum = 0;

        for ($a = 0, $b = 1; $a < 12; $a += 2, $b += 2) {
            $sum += 1 * Intval($isbn[$a]);
            $sum += 3 * Intval($isbn[$b]);
        }

        $reminder = $sum % 10;

        return 10 - $reminder;
    }
}