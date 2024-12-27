<?php
/**
 * Luminova Framework Procedural Functions for PHP 8.0 array operations.
 *
 * This file provides utility functions to extend the native array capabilities which already exist in PHP 8.1 and above.
 *
 * @package Luminova Framework
 * @author Ujah Chigozie Peter
 * @copyright (c) Nanoblock Technology Ltd
 * @license See LICENSE file for licensing details.
 * @link https://luminova.ng
 * @source https://www.php.net/manual/en/function.array
 */
namespace Luminova\Procedural\ArrayFunctions;

if (!function_exists('array_each')) {
    /**
     * Iterates over each element in the array and applies the given callback.
     *
     * The callback function is executed for each element, and if the callback returns true,
     * the function immediately returns an associative array containing the key and value of the matched element.
     * If no match is found, the function returns null.
     *
     * @param array $array The array to iterate over.
     * @param callable $callback A callback function that takes the value and key as arguments and returns a boolean.
     * @return array|null Return null if not found or an associative array with:
     *               - 'key': The key of the first matched element.
     *               - 'value': The value of the first matched element,
     * @internal 
     */
    function array_each(array $array, callable $callback): ?array
    {
        foreach ($array as $key => $value) {
            if ($callback($value, $key)) {
                return ['key' => $key, 'value' => $value];
            }
        }

        return null;
    }
}

if (!function_exists('array_find')) {
    /**
     * Finds the first element in the array that matches the given callback condition.
     *
     * @param array $array The array to search in.
     * @param callable $callback A callback function that takes the value and key as arguments and returns true for the desired element.
     * 
     * @return mixed Return the first matching element, or null if no match is found.
     * 
     * @since PHP 8.4.0
     * @link https://www.php.net/manual/en/function.array-find.php
     */
    function array_find(array $array, callable $callback): mixed
    {
        if($array === []){
            return null;
        }

        $value = array_each($array, $callback);
        return ($value === null) ? null : $value['value'];
    }
}

if (!function_exists('array_find_key')) {
    /**
     * Finds the key of the first element in the array that matches the given callback condition.
     *
     * @param array $array The array to search in.
     * @param callable $callback A callback function that takes the value and key as arguments and returns true for the desired element.
     * 
     * @return mixed Return the key of the first matching element, or null if no match is found.
     * 
     * @since PHP 8.4.0
     * @link https://www.php.net/manual/en/function.array-find-key.php
     */
    function array_find_key(array $array, callable $callback): mixed
    {
        if($array === []){
            return null;
        }

        $key = array_each($array, $callback);
        return ($key === null) ? null : $key['key'];
    }
}

if (!function_exists('array_any')) {
    /**
     * Checks if any element in the array satisfies the given callback condition.
     *
     * @param array $array The array to check.
     * @param callable $callback A callback function that takes the value and key as arguments and returns true for a satisfying element.
     * 
     * @return bool Return true if at least one element satisfies the condition, false otherwise.
     * 
     * @since PHP 8.4.0
     * @link https://www.php.net/manual/en/function.array-any.php
     */
    function array_any(array $array, callable $callback): bool
    {
        return ($array === []) 
            ? false 
            : array_each($array, $callback) !== null;
    }
}

if (!function_exists('array_all')) {
    /**
     * Checks if all elements in the array satisfy the given callback condition.
     *
     * @param array $array The array to check.
     * @param callable $callback A callback function that takes the value and key as arguments and returns true for a satisfying element.
     * 
     * @return bool Return true if all elements satisfy the condition, false otherwise.
     * 
     * @since PHP 8.4.0
     * @link https://www.php.net/manual/en/function.array-all.php
     */
    function array_all(array $array, callable $callback): bool
    {
        foreach ($array as $key => $value) {
            if(!$callback($value, $key)){
                return false;
            }
        }

        return true;
    }
}
