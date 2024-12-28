
# Luminova Array Procedural Functions

A lightweight utility package for array operations offering procedural functions like `array_find`, `array_all`, and more. These functions are already supported in PHP 8.1 and later. This package provide backward compatibility for PHP 8.0.

---

### Install via Composer

Recommend installation method:

```bash
composer require luminovang/array-functions
```

### Include File 

You can also use the function in another projects.

```php
include_once __DIR__ . '/vendor/luminovang/array-functions/src/ArrayFuncs.php;';
```

---


### Importing the Functions

You can import multiple functions at once using the `use function` syntax with braces around the function names:

```php
use function Luminova\Procedural\ArrayFunctions\{
   array_find, 
   array_find_key, 
   array_any, 
   array_all
};
```

**Importing a Specific Function:**

To import a specific function, such as `array_find`, use the following syntax:

```php
use function Luminova\Procedural\ArrayFunctions\array_find;
```

---

### Example Usage

#### Finding an Element in an Array

The `array_find` function allows you to find the first element in an array that satisfies a given condition specified in a callback.

```php
$result = array_find([1, 2, 3, 4, 5], fn(int $value) => $value > 3);

echo $result; // Output: 4
```

> In this example, `array_find` returns the first element greater than 3, which is `4`.

---

#### Finding the Key of an Element in an Array

The `array_find_key` function searches for the first key where the corresponding value meets the given condition.

```php
$result = array_find_key(['apple', 'banana', 'cherry'], fn(string $value) => $value === 'banana');

echo $result; // Output: 1
```
> Here, `array_find_key` finds the key of 'banana', which is `1`.

**Another Example**

Find key using `str_starts_with`.

```php
$result = array_find_key(
   ['java' => 1, 'php' => 2, 'swift' => 3], 
   fn(int $value, string $key) => str_starts_with($key, 'p')
);

echo $result; // Output: php
```
> In this case, `array_find_key` returns the key `'php'`, where the key starts with `'p'`.

---

#### Checking If All Elements Meet a Condition

The `array_all` function checks if all elements in the array satisfy the condition defined in the callback.

```php
$result = array_all([2, 4, 6], fn(int $value) => $value % 2 === 0);
echo $result; // Output: true
```

> In this example, `array_all` returns `true` because all elements in the array are even numbers.

---

#### Checking If Any Element Meets a Condition

The `array_any` function checks if at least one element in the array meets the condition specified in the callback.

```php
$result = array_any([1, 2, 3], fn(int $value) => $value > 2);
echo $result; // Output: true
```

> In this case, `array_any` returns `true` because one element (`3`) is greater than `2`.
