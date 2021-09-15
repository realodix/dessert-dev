<?php

namespace Realodix\NextProject\Test;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Version;

final class PhpUnitDeprecatedAssertionsTest extends TestCase
{
    /**
     * Deprecated in PHPUnit 10
     * - https://github.com/sebastianbergmann/phpunit/issues/4601
     * - https://github.com/sebastianbergmann/phpunit/issues/4602
     */
    public function testClassHasAttribute(): void
    {
        if (version_compare(Version::series(), '9.5', '>')) {
            $this->markTestSkipped('Deprecated in PHPUnit 10 and will be removed in PHPUnit 11');
        }

        ass('Exception')
            ->classHasAttribute('message')
            ->classNotHasAttribute('fakeproperty');

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
            $testObject = (object) ['existingAttribute' => true];

            ass($testObject)->objectHasAttribute('existingAttribute');
            ass($testObject)->objectNotHasAttribute('fakeproperty');
        }
    }

    /** @test */
    public function classHasAttributeActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass('not_object')->classHasAttribute('');
    }

    /** @test */
    public function classNotHasAttributeActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass('not_object')->classNotHasAttribute('');
    }

    /** @test */
    public function objectHasAttributeActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(false)->objectHasAttribute('');
    }

    /** @test */
    public function objectNotHasAttributeActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass(false)->objectNotHasAttribute('');
    }

    /**
     * Deprecated in PHPUnit 10
     * - https://github.com/sebastianbergmann/phpunit/issues/4601
     * - https://github.com/sebastianbergmann/phpunit/issues/4602
     */
    public function testClassHasStaticAttribute(): void
    {
        if (version_compare(Version::series(), '9.5', '>')) {
            $this->markTestSkipped('Deprecated in PHPUnit 10 and will be removed in PHPUnit 11');
        }

        ass(FakeClassForTesting::class)
            ->classHasStaticAttribute('staticProperty')
            ->classNotHasStaticAttribute('fakeProperty');
    }

    /** @test */
    public function classHasStaticAttributeActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass('')->classHasStaticAttribute('');
    }

    /** @test */
    public function classNotHasStaticAttributeActualValue(): void
    {
        $this->expectException(\TypeError::class);

        ass('')->classNotHasStaticAttribute('');
    }
}
