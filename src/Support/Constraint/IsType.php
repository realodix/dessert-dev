<?php

namespace Realodix\NextProject\Support\Constraint;

use PHPUnit\Framework\Constraint\Constraint;

/**
 * For internal use only to support older PHPUnit
 *
 * Reference:
 * - https://github.com/sebastianbergmann/phpunit/blob/master/src/Framework/Constraint/Type/IsType.php
 *
 * @internal
 */
final class IsType extends Constraint
{
    /**
     * @var string
     */
    public const TYPE_CLOSED_RESOURCE = 'resource (closed)';

    /**
     * @psalm-var array<string,bool>
     */
    private const KNOWN_TYPES = [
        'resource (closed)' => true,
    ];

    private string $type;

    /**
     * @param string $type
     *
     * @throws \PHPUnit\Framework\Exception
     */
    public function __construct(string $type)
    {
        if (! isset(self::KNOWN_TYPES[$type])) {
            throw new \PHPUnit\Framework\Exception(
                sprintf(
                    'Type specified for PHPUnit\Framework\Constraint\IsType <%s> '.
                    'is not a valid type.',
                    $type
                )
            );
        }

        $this->type = $type;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return sprintf(
            'is of type "%s"',
            $this->type
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the constraint is
     * met, false otherwise.
     *
     * @param mixed $other
     */
    protected function matches(mixed $other): bool
    {
        switch ($this->type) {
            case 'resource (closed)':
                return gettype($other) === 'resource (closed)';
            default:
                return false;
        }
    }
}
