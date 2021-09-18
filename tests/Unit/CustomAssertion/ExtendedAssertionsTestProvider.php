<?php

namespace Realodix\NextProject\Test\CustomAssertion;

trait ExtendedAssertionsTestProvider
{
    public function markupContainsSelectorProvider()
    {
        return [
            'Simple tag name'         => ['a'],
            'Class name'              => ['.link'],
            'Multiple class names'    => ['.link.another-class'],
            'Element ID'              => ['#my-link'],
            'Tag name with class'     => ['a.link'],
            'Tag name with ID'        => ['a#my-link'],
            'Tag with href attribute' => ['a[href="https://example.com"]'],
        ];
    }
}
