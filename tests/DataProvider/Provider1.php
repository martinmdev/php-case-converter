<?php

namespace Martinm\Test\DataProvider;

class Provider1
{
    public static function create()
    {
        return new static();
    }

    public function provide()
    {
        $allowed = [
            'toAda',
            'toCamel',
            'toCobol',
            'toDot',
            'toKebab',
            'toLower',
            'toMacro',
            'toPascal',
            'toSentence',
            'toSnake',
            'toTitle',
            'toTrain',
            'toUpper',
        ];

        $lines = file(__DIR__ . '/data1.txt');

        $data = [];
        $lastMethod = null;
        $c = 0;

        foreach ($lines as $l) {
            $case = explode('|', $l);
            $method = trim($case[1]);

            if ($method != $lastMethod) {
                $lastMethod = $method;
                $c = 0;
            } else {
                $c++;
            }

            if (!in_array($method, $allowed)) {
                continue;
            }

            $data[] = [
                trim($case[1]),
                trim($case[2]),
                trim($case[3]),
            ];
        }

        return $data;
    }
}
