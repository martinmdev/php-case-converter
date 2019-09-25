<?php

namespace Martinm\Test\DataProvider;

class Provider2
{
    public static function create()
    {
        return new static();
    }

    public function provide()
    {
        $lines = file(__DIR__ . '/data2.txt');

        $data = [];
        foreach ($lines as $l) {
            $case = explode('|', $l);

            $data[] = [
                trim($case[1]),
                trim($case[2]),
                trim($case[3]),
            ];
        }

        return $data;
    }
}
