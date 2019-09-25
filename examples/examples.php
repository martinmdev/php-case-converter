<?php

require __DIR__.'/../vendor/autoload.php';

use Martinm\CaseConverter\Converter;

$converter = new Converter();

echo $converter->toCamel('hello-world'); // helloWorld

