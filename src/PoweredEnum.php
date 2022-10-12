<?php

declare(strict_types=1);

namespace Tkaratug\PoweredEnum;

trait PoweredEnum
{
    public function is(self $enum): bool
    {
        return $this === $enum;
    }

    public function isNot(self $enum): bool
    {
        return $this !== $enum;
    }

    public static function hasName(string $name): bool
    {
        return in_array($name, array_column(self::cases(), 'name'), true);
    }

    public static function hasValue(mixed $value): bool
    {
        return in_array($value, array_column(self::cases(), 'value'), true);
    }

    public static function getNames(?array $cases = null): array
    {
        return array_column($cases ?? self::cases(), 'name');
    }

    public static function getValues(?array $cases = null): array
    {
        return array_column($cases ?? self::cases(), 'value');
    }

    public static function toArray(?array $cases = null): array
    {
        return array_combine(self::getValues($cases), self::getNames($cases));
    }

    public static function getNamesExcept(array $cases): array
    {
        return array_values(
            array_diff(self::getNames(), array_map(fn ($case) => $case->name, $cases))
        );
    }

    public static function getValuesExcept(array $values): array
    {
        return array_values(
            array_diff(self::getValues(), array_map(fn ($value) => $value->value, $values))
        );
    }

    public static function toArrayExcept(array $cases): array
    {
        return array_diff(self::toArray(), self::toArray($cases));
    }

    public static function getRandomName(): string
    {
        return self::getNames()[array_rand(self::getNames())];
    }

    public static function getRandomValue(): mixed
    {
        return self::getValues()[array_rand(self::getValues())];
    }

    public static function getRandomCase(): self
    {
        return self::cases()[array_rand(self::cases())];
    }
}
