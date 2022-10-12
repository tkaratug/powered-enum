# Powered Enum

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tkaratug/powered-enum.svg?style=flat-square)](https://packagist.org/packages/tkaratug/powered-enum)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/tkaratug/powered-enum/run-tests?label=tests)](https://github.com/tkaratug/powered-enum/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/tkaratug/powered-enum/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/tkaratug/powered-enum/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
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

enum MyEnum: string
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
$orderStatus = OrderStatus::PENDING;

$orderStatus->is(OrderStatus::PENDING);     // true
$orderStatus->is(OrderSTatus::COMPLETED)    // false

$orderStatus->isNot(OrderStatus::PENDING);  // false
$orderStatus->isNot(OrderSTatus::COMPLETED) // true
```

---

## Static Methods

### hasName()
- You can check whether an enum has a case by given name via the `hasName()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
}

OrderStatus::hasName('PENDING');    // true
OrderStatus::hasName('CANCELLED');  // false
```

___

### hasValue()
- You can check whether an enum has a case by given value via the `hasValue()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
}

OrderStatus::hasValue('pending');    // true
OrderStatus::hasValue('cancelled');  // false
```

___

### getNames()
- You can get enum case names as an array by using the `getNames()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
}

OrderStatus::getNames(); // ['PENDING', 'COMPLETED']
```

___

### getValues()
- You can get enum case values as an array by using the `getValues()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
}

OrderStatus::getValues(); // ['pending', 'completed']
```

___

### toArray()
- You can get a combined array of the enum cases as `value => name` by using the `toArray()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
}

OrderStatus::toArray(); // ['pending' => 'PENDING', 'completed' => 'COMPLETED]
```

___

### getNamesExcept()
- You can get names of enum cases as an array except for given ones by using the `getNamesExcept()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}

OrderStatus::getNamesExcept([OrderStatus::PENDING]); // ['COMPLETED', 'CANCELLED']
```

___

### getValuesExcept()
- You can get values of enum cases as an array except for given ones by using the `getValuesExcept()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}

OrderStatus::getValuesExcept([OrderStatus::PENDING]); // ['completed', 'cancelled']
```

___

### toArrayExcept()
- You can get a combined array of the enum cases as `value => name` except for given ones by using the `toArrayExcept()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}

OrderStatus::toArrayExcept([OrderStatus::PENDING]); // ['completed' => 'COMPLETED', 'cancelled' => 'CANCELLED]
```

___

### getRandomName()
- You can get a random name of the enum cases by using the `getRandomName()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
}

OrderStatus::getRandomName(); // ['PENDING']
```

___

### getRandomValue()
- You can get a random value of the enum cases by using the `getRandomValue()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
}

OrderStatus::getRandomValue(); // ['pending']
```

___

### getRandomCase()
- You can get a random case of the enum by using the `getRandomCase()` method.

```php
enum OrderStatus: string {
    use PoweredEnum;

    case PENDING = 'pending';
}

OrderStatus::getRandomCase(); // OrderStatus::PENDING
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