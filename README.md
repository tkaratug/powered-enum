# Powered Enum

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tkaratug/powered-enum.svg?style=flat-square)](https://packagist.org/packages/tkaratug/powered-enum)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/tkaratug/powered-enum/run-tests?label=tests)](https://github.com/tkaratug/powered-enum/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tkaratug/powered-enum.svg?style=flat-square)](https://packagist.org/packages/tkaratug/powered-enum)

This package offers a trait that contains some cool features for native PHP enums.

## Requirements
- PHP `8.1` or higher.

## Installation

```bash
composer require tkaratug/powered-enum
```

## Declaration

All you need to do is use the `PoweredEnum` trait in your native PHP enums.

```php
use Tkaratug\PoweredEnum\PoweredEnum;

enum MyEnum: int
{
    use PoweredEnum;
    
    case ONE    = 1;
    case TWO    = 2;
    case THREE  = 3;
}
```

## Jump To
- [Methods](#Methods)
  - [is(), isNot()](#is-isnot)
- [Static Methods](#static-methods)
  - [hasName()](#hasname)
  - [hasValue()](#hasvalue)
  - [getNames()](#getnames)
  - [getValues()](#getvalues)
  - [toArray()](#toarray)
  - [getNamesExcept()](#getnamesexcept)
  - [getValuesExcept()](#getvalueexcept)
  - [toArrayExcept()](#toarrayexcept)
  - [getRandomName()](#getrandomname)
  - [getRandomValue()](#getrandomvalue)
  - [getRandomCase()](#getrandomcase)

___

## Methods
### is(), isNot()
- You can check the equality of a case against any name by passing it to the `is()` and `isNot()` methods.

```php
$myEnum = MyEnum::ONE;

$myEnum->is(MyEnum::ONE);      // true
$myEnum->is(MyEnum::TWO);      // false

$myEnum->isNot(MyEnum::ONE);   // false
$myEnum->isNot(MyEnum::TWO);   // true
```

---

## Static Methods

### hasName()
- You can check whether an enum has a case by given name via the `hasName()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
    case TWO = 2;
}

MyEnum::hasName('ONE');     // true
MyEnum::hasName('THREE');   // false
```

___

### hasValue()
- You can check whether an enum has a case by given value via the `hasValue()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
    case TWO = 2;
}

MyEnum::hasValue(1);   // true
MyEnum::hasValue(3);   // false
```

___

### getNames()
- You can get enum case names as an array by using the `getNames()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
    case TWO = 2;
}

MyEnum::getNames();   // ['ONE', 'TWO']
```

___

### getValues()
- You can get enum case values as an array by using the `getValues()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
    case TWO = 2;
}

MyEnum::getValues();   // [1, 2]
```

___

### toArray()
- You can get a combined array of the enum cases as `value => name` by using the `toArray()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
    case TWO = 2;
}

MyEnum::toArray();   // [1 => 'ONE', 2 => 'TWO']
```

___

### getNamesExcept()
- You can get names of enum cases as an array except for given ones by using the `getNamesExcept()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
}

MyEnum::getNamesExcept([MyEnum::ONE]);   // ['TWO', 'THREE']
```

___

### getValuesExcept()
- You can get values of enum cases as an array except for given ones by using the `getValuesExcept()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
}

MyEnum::getValuesExcept([MyEnum::ONE]);   // [2, 3]
```

___

### toArrayExcept()
- You can get a combined array of the enum cases as `value => name` except for given ones by using the `toArrayExcept()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
}

MyEnum::toArrayExcept([MyEnum::ONE]);   // [2 => 'TWO', 3 => 'THREE]
```

___

### getRandomName()
- You can get a random name of the enum cases by using the `getRandomName()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
}

MyEnum::getRandomName();   // ['ONE']
```

___

### getRandomValue()
- You can get a random value of the enum cases by using the `getRandomValue()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
}

MyEnum::getRandomValue();   // [1]
```

___

### getRandomCase()
- You can get a random case of the enum by using the `getRandomCase()` method.

```php
enum MyEnum: int {
    use PoweredEnum;

    case ONE = 1;
}

MyEnum::getRandomCase();   // MyEnum::ONE
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you've found a bug regarding security please mail [tkaratug@hotmail.com.tr](mailto:tkaratug@hotmail.com.tr) instead of using the issue tracker.

## Credits

- [Turan Karatuğ](https://github.com/tkaratug)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.