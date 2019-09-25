<?php

namespace Martinm\Test\DataProvider;

class Provider0
{
    public static function create()
    {
        return new static();
    }

    public function provide()
    {
        $data = [
            // [
            //     'toUpper',
            //     'helloFooBar',
            //     'HELLOFOOBAR',
            // ],
            // [
            //     'toUpper',
            //     'NASA',
            //     'NASA',
            // ],
            // ['toUpper', 'Ես-հայերեն-չգիտեմ', 'ԵՍ ՀԱՅԵՐԵՆ ՉԳԻՏԵՄ'],
            // ['toCobol', '123BC456BC789', '123-B-C456-B-C789'],
            // ['toDot', 'Reel2Real', 'reel2.real'],
            // ['toPascal', 'i-do--not--0like--number0', 'IDoNot0LikeNumber0'],
            // ['toTrain', '21-test-test21-21Test', '21-Test-Test21-21Test'],
            ['toAda', 'Friday-the-13th', 'Friday_The_13Th'],
        ];

        return $data;
    }
}
