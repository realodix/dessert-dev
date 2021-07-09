<?php

namespace Realodix\NextProject\Traits;

trait ShortcutTrait
{
    public function arrayCE($needle, string $message = ''): self
    {
        return $this->arrayContainsEquals($needle, $message);
    }

    public function arrayCO($type, $isNativeType = null, string $message = ''): self
    {
        return $this->arrayContainsOnly($type, $isNativeType, $message);
    }

    public function arrayCOIO($className, string $message = ''): self
    {
        return $this->arrayContainsOnlyInstancesOf($className, $message);
    }

    public function doesNotMatchRegExp(string $pattern, string $message = ''): self
    {
        return $this->doesNotMatchRegularExpression($pattern, $message);
    }

    public function isAbove($expected, string $message = ''): self
    {
        return $this->greaterThan($expected, $message);
    }

    public function isAtLeast($expected, string $message = ''): self
    {
        return $this->greaterThanOrEqual($expected, $message);
    }

    public function isAtMost($expected, string $message = ''): self
    {
        return $this->lessThanOrEqual($expected, $message);
    }

    public function isBelow($expected, string $message = ''): self
    {
        return $this->lessThan($expected, $message);
    }

    public function matchesRegExp(string $pattern, string $message = ''): self
    {
        return $this->matchesRegularExpression($pattern, $message);
    }
}
