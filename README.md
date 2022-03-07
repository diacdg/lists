# PHP typed array
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/diacdg/phparray/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/diacdg/phparray/badges/build.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/diacdg/phparray/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/?branch=master)

is an extension for [ArrayObject class](https://www.php.net/manual/en/class.arrayobject.php) that accept only elements and keys of a specified type.

### Installation
```
composer require diacdg/phparray
```

### Usage

```php
<?php

use Diacdg\TypedArray\ArrayList;
use Diacdg\TypedArray\ArrayMap;

$list = new ArrayList('integer', [11, 22, 33]);
foreach ($list as $value) {
  print $value . "\n";
}
/* output:
    11
    22
    33
 */
 
 
$listOfCallable = new ArrayList('callable', ['gettype', function() {print 'Ok!';}]);
/* output:
Array
(
    [0] => gettype
    [1] => Closure Object (...)
)
*/

$objectsList = new ArrayList(\stdClass::class, [new \stdClass(), new \stdClass()]);
foreach ($objectsList as $key => $object) {
    print $key . ' : ';
    var_dump($object);
}
/* output:
    0 : object(stdClass)#320 (0) {}
    1 : object(stdClass)#347 (0) {}
 */


$appFlags = new ArrayMap('string', 'boolean', ['run-tests' => true, 'coverage' => false]);
$appFlags['create-report'] = true;

print_r((array) $appFlags);
/* output:
Array
(
    [run-tests] => 1
    [coverage] => 
    [create-report] => 1
)
*/

unset($appFlags['coverage']);
print_r((array) $appFlags);
/* output:
Array
(
    [run-tests] => 1
    [create-report] => 1
) 
 */


$list = new ArrayList('integer', [11, 22, 'invalid-value']);
/* output:
InvalidArgumentException : Value must be of type integer but value of type string given.
*/
```