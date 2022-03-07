# php strict array
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/diacdg/phparray/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/diacdg/phparray/badges/build.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/diacdg/phparray/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/diacdg/phparray/?branch=master)

It is an extension for ArrayObject that accept elements and keys of a provided type. 

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

$objectsList = new ArrayList(\stdClass::class, [new \stdClass(), new \stdClass()]);
foreach ($objectsList as $object) {
  print_r($object);
}

$configFlags = new ArrayMap('string', 'boolean', ['test-passed' => true, 'full-coverage' => false]);
foreach ($configFlags as $config) {
  var_dump($config);
}
```