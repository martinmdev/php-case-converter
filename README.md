PHP case converter
==================

[![codecov](https://codecov.io/gh/martinmdev/php-case-converter/branch/master/graph/badge.svg?token=zFZTbTSHMZ)](https://codecov.io/gh/martinmdev/php-case-converter)
[![Build Status](https://travis-ci.com/martinmdev/php-case-converter.svg?branch=master)](https://travis-ci.com/martinmdev/php-case-converter)
[![Latest Stable Version](https://poser.pugx.org/martinmdev/php-case-converter/v/stable)](https://packagist.org/packages/martinmdev/php-case-converter)
[![Total Downloads](https://poser.pugx.org/martinmdev/php-case-converter/downloads)](https://packagist.org/packages/martinmdev/php-case-converter)
[![Latest Unstable Version](https://poser.pugx.org/martinmdev/php-case-converter/v/unstable)](https://packagist.org/packages/martinmdev/php-case-converter)
[![License](https://poser.pugx.org/martinmdev/php-case-converter/license)](https://packagist.org/packages/martinmdev/php-case-converter)

Usage
-----
```php
<?php

require __DIR__.'/../vendor/autoload.php';

use Martinm\CaseConverter\Converter;

$converter = new Converter();

echo $converter->toCamel('hello-world'); // helloWorld
```

Installation
------------
```shell script
composer require martinmdev/php-case-converter
```
