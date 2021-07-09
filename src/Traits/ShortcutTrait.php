<?php

namespace Realodix\NextProject\Traits;

trait ShortcutTrait
{
    public function doesNotMatchRegExp(string $pattern, string $message = ''): self
    {
        return $this->doesNotMatchRegularExpression($pattern, $message);
    }

    public function matchesRegExp(string $pattern, string $message = ''): self
    {
        return $this->matchesRegularExpression($pattern, $message);
    }
}
