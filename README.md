# php strict array
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/diacdg/phparray/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/diacdg/phparray/badges/build.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/diacdg/phparray/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/?branch=master)

It is an extension for ArrayObject that accept only elements and keys of a provided type. 

### Installation
```
composer require diacdg/phparray
```

### Usage

```php
<?php

use Diacdg\PHPArray\ArrayList;
use Diacdg\PHPArray\ArrayMap;

$list = new ArrayList('integer', [11, 22, 33]);
foreach ($list as $value) {
  print $value . "\n";
}
/* output:
    11
    22
    33
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
```