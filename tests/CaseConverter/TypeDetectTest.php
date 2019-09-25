<?php

namespace Martinm\Test\CaseConverter;

use Martinm\CaseConverter\Converter;
use Martinm\CaseConverter\StringWrapper;
use Martinm\Test\DataProvider\Provider0;
use Martinm\Test\DataProvider\Provider1;
use PHPUnit\Framework\TestCase;

class TypeDetectTest extends TestCase
{
    public function test1()
    {

        $types = [
            ['Camel case', 'Camel', 'myNameIsBond'],
            ['Pascal case', 'Pascal', 'MyNameIsBond'],
            ['Snake case', 'Snake', 'my_name_is_bond'],
            ['Ada case', 'Ada', 'My_Name_Is_Bond'],
            ['Macro case', 'Macro', 'MY_NAME_IS_BOND'],
            ['Kebab case', 'Kebab', 'my-name-is-bond'],
            ['Train case', 'Train', 'My-Name-Is-Bond'],
            ['Cobol case', 'Cobol', 'MY-NAME-IS-BOND'],
            ['Lower case', 'Lower', 'my name is bond'],
            ['Upper case', 'Upper', 'MY NAME IS BOND'],
            ['Title case', 'Title', 'My Name Is Bond'],
            ['Sentence case', 'Sentence', 'My name is bond'],
            ['Dot notation', 'Dot', 'my.name.is.bond'],
        ];

        foreach ($types as $t) {
            $str = $t[2];
            $s = new StringWrapper($str);

            $ex = strtoupper($t[1]);

            $this->assertEquals($ex, $s->getType());
        }
    }
}
