<?php

namespace Realodix\Dessert;

class Expectation
{
    /**
     * Checks if the given expectation method exists.
     */
    public static function hasMethod(string $name): bool
    {
        return method_exists(self::class, $name)
            || method_exists(Mixins\Expectation::class, $name)
            || self::hasExtend($name);
    }

    // /**
    //  * Matches any value.
    //  */
    // public function any(): Any
    // {
    //     return new Any();
    // }

    // /**
    //  * Asserts that the given expectation target use the given dependencies.
    //  *
    //  * @param  array<int, string>|string  $targets
    //  */
    // public function toUse(array|string $targets): ArchExpectation
    // {
    //     return ToUse::make($this, $targets);
    // }

    // /**
    //  * Asserts that the given expectation target use the "declare(strict_types=1)" declaration.
    //  */
    // public function toUseStrictTypes(): ArchExpectation
    // {
    //     return Targeted::make(
    //         $this,
    //         fn (ObjectDescription $object): bool => str_contains((string) file_get_contents($object->path), 'declare(strict_types=1);'),
    //         'to use strict types',
    //         FileLineFinder::where(fn (string $line): bool => str_contains($line, '<?php')),
    //     );
    // }

    // /**
    //  * Asserts that the given expectation target is final.
    //  */
    // public function toBeFinal(): ArchExpectation
    // {
    //     return Targeted::make(
    //         $this,
    //         fn (ObjectDescription $object): bool => ! enum_exists($object->name) && $object->reflectionClass->isFinal(),
    //         'to be final',
    //         FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
    //     );
    // }

    // /**
    //  * Asserts that the given expectation target is readonly.
    //  */
    // public function toBeReadonly(): ArchExpectation
    // {
    //     return Targeted::make(
    //         $this,
    //         fn (ObjectDescription $object): bool => ! enum_exists($object->name) && $object->reflectionClass->isReadOnly() && assert(true), // @phpstan-ignore-line
    //         'to be readonly',
    //         FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
    //     );
    // }

    // /**
    //  * Asserts that the given expectation target is trait.
    //  */
    // public function toBeTrait(): ArchExpectation
    // {
    //     return Targeted::make(
    //         $this,
    //         fn (ObjectDescription $object): bool => $object->reflectionClass->isTrait(),
    //         'to be trait',
    //         FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
    //     );
    // }

    /**
     * Asserts that the given expectation targets are traits.
     */
    public function toBeTraits(): ArchExpectation
    {
        return $this->toBeTrait();
    }

    /**
     * Asserts that the given expectation target is abstract.
     */
    public function toBeAbstract(): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => $object->reflectionClass->isAbstract(),
            'to be abstract',
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation target is enum.
     */
    public function toBeEnum(): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => $object->reflectionClass->isEnum(),
            'to be enum',
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation targets are enums.
     */
    public function toBeEnums(): ArchExpectation
    {
        return $this->toBeEnum();
    }

    /**
     * Asserts that the given expectation targets is an class.
     */
    public function toBeClass(): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => class_exists($object->name) && ! enum_exists($object->name),
            'to be class',
            FileLineFinder::where(fn (string $line): bool => true),
        );
    }

    /**
     * Asserts that the given expectation targets are classes.
     */
    public function toBeClasses(): ArchExpectation
    {
        return $this->toBeClass();
    }

    /**
     * Asserts that the given expectation target is interface.
     */
    public function toBeInterface(): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => $object->reflectionClass->isInterface(),
            'to be interface',
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation targets are interfaces.
     */
    public function toBeInterfaces(): ArchExpectation
    {
        return $this->toBeInterface();
    }

    /**
     * Asserts that the given expectation target to be subclass of the given class.
     *
     * @param  class-string  $class
     */
    public function toExtend(string $class): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => $class === $object->reflectionClass->getName() || $object->reflectionClass->isSubclassOf($class),
            sprintf("to extend '%s'", $class),
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation target to be have a parent class.
     */
    public function toExtendNothing(): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => $object->reflectionClass->getParentClass() === false,
            'to extend nothing',
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation target to not implement any interfaces.
     */
    public function toImplementNothing(): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => $object->reflectionClass->getInterfaceNames() === [],
            'to implement nothing',
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation target to only implement the given interfaces.
     *
     * @param  array<int, class-string>|class-string  $interfaces
     */
    public function toOnlyImplement(array|string $interfaces): ArchExpectation
    {
        $interfaces = is_array($interfaces) ? $interfaces : [$interfaces];

        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => count($interfaces) === count($object->reflectionClass->getInterfaceNames())
                && array_diff($interfaces, $object->reflectionClass->getInterfaceNames()) === [],
            "to only implement '".implode("', '", $interfaces)."'",
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation target to have the given prefix.
     */
    public function toHavePrefix(string $prefix): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => str_starts_with($object->reflectionClass->getShortName(), $prefix),
            "to have prefix '{$prefix}'",
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation target to have the given suffix.
     */
    public function toHaveSuffix(string $suffix): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => str_ends_with($object->reflectionClass->getName(), $suffix),
            "to have suffix '{$suffix}'",
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation target to implement the given interfaces.
     *
     * @param  array<int, class-string>|class-string  $interfaces
     */
    public function toImplement(array|string $interfaces): ArchExpectation
    {
        $interfaces = is_array($interfaces) ? $interfaces : [$interfaces];

        return Targeted::make(
            $this,
            function (ObjectDescription $object) use ($interfaces): bool {
                foreach ($interfaces as $interface) {
                    if (! $object->reflectionClass->implementsInterface($interface)) {
                        return false;
                    }
                }

                return true;
            },
            "to implement '".implode("', '", $interfaces)."'",
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class')),
        );
    }

    /**
     * Asserts that the given expectation target "only" use on the given dependencies.
     *
     * @param  array<int, string>|string  $targets
     */
    public function toOnlyUse(array|string $targets): ArchExpectation
    {
        return ToOnlyUse::make($this, $targets);
    }

    /**
     * Asserts that the given expectation target does not use any dependencies.
     */
    public function toUseNothing(): ArchExpectation
    {
        return ToUseNothing::make($this);
    }

    public function toBeUsed(): never
    {
        throw InvalidExpectation::fromMethods(['toBeUsed']);
    }

    /**
     * Asserts that the given expectation dependency is used by the given targets.
     *
     * @param  array<int, string>|string  $targets
     */
    public function toBeUsedIn(array|string $targets): ArchExpectation
    {
        return ToBeUsedIn::make($this, $targets);
    }

    /**
     * Asserts that the given expectation dependency is "only" used by the given targets.
     *
     * @param  array<int, string>|string  $targets
     */
    public function toOnlyBeUsedIn(array|string $targets): ArchExpectation
    {
        return ToOnlyBeUsedIn::make($this, $targets);
    }

    /**
     * Asserts that the given expectation dependency is not used.
     */
    public function toBeUsedInNothing(): ArchExpectation
    {
        return ToBeUsedInNothing::make($this);
    }

    /**
     * Asserts that the given expectation dependency is an invokable class.
     */
    public function toBeInvokable(): ArchExpectation
    {
        return Targeted::make(
            $this,
            fn (ObjectDescription $object): bool => $object->reflectionClass->hasMethod('__invoke'),
            'to be invokable',
            FileLineFinder::where(fn (string $line): bool => str_contains($line, 'class'))
        );
    }

    /**
     * Asserts that the given expectation is iterable and contains snake_case keys.
     *
     * @return self<TValue>
     */
    public function toHaveSnakeCaseKeys(string $message = ''): self
    {
        if (! is_iterable($this->value)) {
            InvalidExpectationValue::expected('iterable');
        }

        foreach ($this->value as $k => $item) {
            if (is_string($k)) {
                $this->and($k)->toBeSnakeCase($message);
            }

            if (is_array($item)) {
                $this->and($item)->toHaveSnakeCaseKeys($message);
            }
        }

        return $this;
    }

    /**
     * Asserts that the given expectation is iterable and contains kebab-case keys.
     *
     * @return self<TValue>
     */
    public function toHaveKebabCaseKeys(string $message = ''): self
    {
        if (! is_iterable($this->value)) {
            InvalidExpectationValue::expected('iterable');
        }

        foreach ($this->value as $k => $item) {
            if (is_string($k)) {
                $this->and($k)->toBeKebabCase($message);
            }

            if (is_array($item)) {
                $this->and($item)->toHaveKebabCaseKeys($message);
            }
        }

        return $this;
    }

    /**
     * Asserts that the given expectation is iterable and contains camelCase keys.
     *
     * @return self<TValue>
     */
    public function toHaveCamelCaseKeys(string $message = ''): self
    {
        if (! is_iterable($this->value)) {
            InvalidExpectationValue::expected('iterable');
        }

        foreach ($this->value as $k => $item) {
            if (is_string($k)) {
                $this->and($k)->toBeCamelCase($message);
            }

            if (is_array($item)) {
                $this->and($item)->toHaveCamelCaseKeys($message);
            }
        }

        return $this;
    }

    /**
     * Asserts that the given expectation is iterable and contains StudlyCase keys.
     *
     * @return self<TValue>
     */
    public function toHaveStudlyCaseKeys(string $message = ''): self
    {
        if (! is_iterable($this->value)) {
            InvalidExpectationValue::expected('iterable');
        }

        foreach ($this->value as $k => $item) {
            if (is_string($k)) {
                $this->and($k)->toBeStudlyCase($message);
            }

            if (is_array($item)) {
                $this->and($item)->toHaveStudlyCaseKeys($message);
            }
        }

        return $this;
    }
}
