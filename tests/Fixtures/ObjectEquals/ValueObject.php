<?php

namespace Realodix\Dessert\Test\Fixtures\ObjectEquals;

final class ValueObject
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function equals(self $other): bool
    {
        return $this->asInt() === $other->asInt();
    }

    public function asInt(): int
    {
        return $this->value;
    }
}
