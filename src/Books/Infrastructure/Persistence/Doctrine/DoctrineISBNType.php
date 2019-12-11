<?php

namespace Books\Infrastructure\Persistence\Doctrine;

use Books\Domain\Model\ISBN;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class DoctrineISBNType extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'VARCHAR(255)';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new ISBN($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->isbn();
    }

    public function getName()
    {
        return 'ISBN';
    }
}